$(document).ready(function () {
  (function ($) {
    "use strict";
    // validate contactForm form
    $(function () {
      $("#infaqForm").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          phone: {
            required: true,
          },
          infaq: {
            required: true,
            min: 10000,
          },
        },
        messages: {
          name: {
            required: "Masukkan nama anda",
          },
          email: {
            required: "Masukkan alamat email anda",
            email: "Masukkan alamat email yang valid",
          },
          phone: {
            required: "Masukkan nomer WA aktif",
          },
          infaq: {
            required: "Masukkan nominal infaq yang ingin anda kirimkan",
            min: "Infaq minimal yang bisa dilakukan adalah Rp. 10.000",
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
            url: "/infaq",
            beforeSend: function () {
              $(".button.button-infaqForm.boxed-btn").prop("disabled", true);
              $("#infaq-form-response").html("");
              $("#infaq-form-response").append(
                `<div class="alert alert-warning" role="alert">Mohon menunggu, permintaan anda sedang diproses!</div>`
              );
              i++;
            },
            success: function (response) {
              if (response.status == 400) {
                $("#infaq-form-response").html("");
                $("#infaq-form-response").html(
                  `<div class="alert alert-danger" role="alert"></div>`
                );

                $("#infaq-form-response .alert").text(response.pesan);
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                }, 6000);
                $("label.text-danger").remove();
                $("#name").val("");
                $("#email").val("");
                $("#phone").val("");
                $("#infaq").val("");
              } else if (response.status == 200) {
                $("#infaq-form-response").html("");
                $("#infaq-form-response").html(
                  `<div class="alert alert-success" role="alert"></div>`
                );

                $("#infaq-form-response .alert").text(response.pesan);
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                }, 6000);
                $("label.text-danger").remove();
                $("#name").val("");
                $("#email").val("");
                $("#phone").val("");
                $("#infaq").val("");
              }
            },
            error: function (xhr, status, error) {
              $("#infaq-form-response").html("");
              $("#infaq-form-response").html(
                `<div class="alert alert-danger" role="alert"></div>`
              );

              $("#infaq-form-response .alert").text(error);
              window.setTimeout(function () {
                $(".alert")
                  .fadeTo(500, 0)
                  .slideUp(500, function () {
                    $(this).remove();
                  });
              }, 4000);
              $("label.text-danger").remove();
              $("#name").val("");
              $("#email").val("");
              $("#phone").val("");
              $("#infaq").val("");
            },
            complete: function () {
              i--;
              if (i <= 0) {
                $(".button.button-infaqForm.boxed-btn").prop("disabled", false);
              }
            },
          });

          return false;
        },
      });
    });
  })(jQuery);
});
