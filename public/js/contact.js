$(document).ready(function () {
  (function ($) {
    "use strict";
    // validate contactForm form
    $(function () {
      $("#contactForm").validate({
        rules: {
          name: {
            required: true,
            minlength: 2,
          },
          subject: {
            required: true,
            minlength: 4,
          },
          email: {
            required: true,
            email: true,
          },
          message: {
            required: true,
            minlength: 10,
          },
        },
        messages: {
          name: {
            required: "Masukkan nama anda",
            minlength: "Nama yang anda masukkan harus lebih dari 2 karakter",
          },
          subject: {
            required: "Masukkan subjek email",
            minlength: "Subjek yang anda masukkan harus lebih dari 4 karakter",
          },
          email: {
            required: "Masukkan alamat email anda",
            email: "Masukkan alamat email yang valid",
          },
          message: {
            required: "Masukkan pesan yang ingin anda kirim",
            minlength: "Pesan yang anda masukkan harus lebih dari 10 karakter",
          },
        },
        submitHandler: function (form) {
          var i = 0;
          $.ajaxSetup({
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
          });
          $(form).ajaxSubmit({
            type: "POST",
            data: $(form).serialize(),
            dataType: "json",
            url: "/contact-us",
            beforeSend: function () {
              $(".button.button-contactForm.boxed-btn").prop("disabled", true);
              $("#contact-us-response").html("");
              $("#contact-us-response").append(
                `<div class="alert alert-warning" role="alert">Mohon menunggu, permintaan anda sedang diproses!</div>`
              );
              i++;
            },
            success: function (response) {
              if (response.status == 400) {
                $("#contact-us-response").html("");
                $("#contact-us-response").html(
                  `<div class="alert alert-danger" role="alert"></div>`
                );

                $("#contact-us-response .alert").text(response.pesan);
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                }, 4000);
                $("label.text-danger").remove();
                $("#message").val("");
                $("#name").val("");
                $("#email").val("");
                $("#subject").val("");
              } else if (response.status == 200) {
                $("#contact-us-response").html("");
                $("#contact-us-response").html(
                  `<div class="alert alert-success" role="alert"></div>`
                );

                $("#contact-us-response .alert").text(response.pesan);
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                }, 4000);
                $("label.text-danger").remove();
                $("#message").val("");
                $("#name").val("");
                $("#email").val("");
                $("#subject").val("");
              }
            },
            error: function (xhr, status, error) {
              $("#contact-us-response").html("");
              $("#contact-us-response").html(
                `<div class="alert alert-danger" role="alert"></div>`
              );

              $("#contact-us-response .alert").text(error);
              window.setTimeout(function () {
                $(".alert")
                  .fadeTo(500, 0)
                  .slideUp(500, function () {
                    $(this).remove();
                  });
              }, 4000);
              $("label.text-danger").remove();
              $("#message").val("");
              $("#name").val("");
              $("#email").val("");
              $("#subject").val("");
            },
            complete: function () {
              i--;
              if (i <= 0) {
                $(".button.button-contactForm.boxed-btn").prop(
                  "disabled",
                  false
                );
              }
            },
          });

          return false;
        },
      });
    });
  })(jQuery);
});
