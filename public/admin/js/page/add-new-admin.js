"use strict";

document.addEventListener("DOMContentLoaded", function (e) {
  (function () {
    // Update/reset user image of account page
    let accountUserImage = document.getElementById("uploadedAvatar");
    const fileInput = document.querySelector(".account-file-input"),
      resetFileInput = document.querySelector(".account-image-reset");

    if (accountUserImage) {
      const resetImage = accountUserImage.src;
      fileInput.onchange = () => {
        if (fileInput.files[0]) {
          if (fileInput.files[0].size <= 800000) {
            accountUserImage.src = window.URL.createObjectURL(
              fileInput.files[0]
            );
          } else {
            $(".image-response").append(
              `<div class="alert alert-danger" role="alert">File yang anda upload melebihi 800kb!</div>`
            );
            window.setTimeout(function () {
              $(".alert")
                .fadeTo(500, 0)
                .slideUp(500, function () {
                  $(this).remove();
                });
            }, 6000);
          }
        }
      };
      resetFileInput.onclick = () => {
        fileInput.value = "";
        accountUserImage.src = resetImage;
      };
    }
  })();
});

$(document).ready(function () {
  (function ($) {
    "use strict";
    // validate contactForm form
    $(function () {
      $("#addNewUserForm").validate({
        rules: {
          photo: {
            required: true,
          },
          username: {
            required: true,
          },
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
          password: {
            required: true,
            minlength: 8,
          },
          password_confirmation: {
            required: true,
            minlength: 8,
          },
        },
        messages: {
          photo: {
            required: "Upload foto profile anda!",
          },
          username: {
            required: "Masukkan username anda!",
          },
          name: {
            required: "Masukkan nama anda!",
          },
          email: {
            required: "Masukkan alamat email anda!",
            email: "Masukkan alamat email yang valid!",
          },
          phone: {
            required: "Masukkan nomor telepon anda!",
          },
          password: {
            required: "Masukkan password",
            minlength: "Masukkan minimal 8 karakter",
          },
          password_confirmation: {
            required: "Ulangi password",
            minlength: "Masukkan minimal 8 karakter",
          },
        },
        errorPlacement: function (error, element) {
          error.appendTo(element.parents(".mb-3"));
        },
        submitHandler: function (form) {
          let formData = new FormData(form);
          formData.append("username", $("input#username").val());
          formData.append("name", $("input#name").val());
          formData.append("email", $("input#email").val());
          formData.append("phone", $("input#phone").val());
          formData.append("password", $("input#password").val());
          formData.append(
            "password_confirmation",
            $("input#password_confirmation").val()
          );
          var i = 0;
          $.ajaxSetup({
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
          });
          $.ajax({
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            url: "/admin/admin",
            beforeSend: function () {
              $(".save-new-admin").prop("disabled", true);
              $(".new-admin-response").html("");
              $(".new-admin-response").append(
                `<div class="alert alert-warning" role="alert">Mohon menunggu, permintaan anda sedang diproses!</div>`
              );
              i++;
            },
            success: function (response) {
              if (response.status == 400) {
                $(".new-admin-response").html("");
                $(".new-admin-response").html(
                  `<div class="alert alert-danger" role="alert"></div>`
                );
                $.each(response.errors, function (key, err_value) {
                  if (err_value == "validation.confirmed") {
                    $(".alert-danger").append(
                      "<li>Konfirmasi password salah.</li>"
                    );
                  } else {
                    $(".alert-danger").append("<li>" + err_value + "</li>");
                  }
                });
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                }, 6000);
                $("label.text-danger").remove();
              } else if (response.status == 200) {
                $(".new-admin-response").html("");
                $(".new-admin-response").html(
                  `<div class="alert alert-success" role="alert"></div>`
                );

                $(".new-admin-response .alert").text(response.message);
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                }, 6000);
                $("label.text-danger").remove();
                $(".datatables-users").DataTable().ajax.reload();
              }
            },
            error: function (xhr, status, error) {
              $(".new-admin-response").html("");
              $(".new-admin-response").html(
                `<div class="alert alert-danger" role="alert"></div>`
              );

              $(".new-admin-response .alert").text(error);
              window.setTimeout(function () {
                $(".alert")
                  .fadeTo(500, 0)
                  .slideUp(500, function () {
                    $(this).remove();
                  });
              }, 4000);
              $("label.text-danger").remove();
            },
            complete: function () {
              i--;
              if (i <= 0) {
                $(".save-changes-edit-profile").prop("disabled", false);
              }
            },
          });

          return false;
        },
      });
    });
  })(jQuery);
});
