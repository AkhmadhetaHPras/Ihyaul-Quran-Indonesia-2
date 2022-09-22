$(document).ready(function () {
  $(document).on("click", "#login", function (e) {
    e.preventDefault();

    var data = {
      username: $("#username").val(),
      password: $("#password").val(),
    };

    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
    });

    $.ajax({
      type: "POST",
      url: "/admin/login",
      data: data,
      dataType: "json",
      success: function (response) {
        if (response.status == 400) {
          // gagal
          $("#login-alert").html("");
          $("#login").removeClass("disabled");
          $("#login-alert").html(
            `<div class="alert alert-danger" role="alert"></div>`
          );
          $(".alert").text(response.message);
          window.setTimeout(function () {
            $(".alert")
              .fadeTo(500, 0)
              .slideUp(500, function () {
                $(this).remove();
              });
          }, 4000);
          $("#username").focus();
          $("#password").val("");
        } else {
          // berhasil
          $("#login-alert").html("");
          $("#login").addClass("disabled");
          $("#login")
            .html(`<div class="spinner-border text-white" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                    </div>`);
          window.location.replace("/admin/dashboard");
        }
      },
    });
  });
});
