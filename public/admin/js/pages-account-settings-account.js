/**
 * Account Settings - Account
 */

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
      $("#changepassword").validate({
        rules: {
          currentPassword: {
            required: true,
          },
          newpassword: {
            required: true,
            minlength: 8,
          },
          newpassword_confirmation: {
            required: true,
            minlength: 8,
          },
        },
        messages: {
          currentPassword: {
            required: "Masukkan password lama anda",
          },
          newpassword: {
            required: "Masukkan password baru",
            minlength: "Masukkan minimal 8 karakter",
          },
          newpassword_confirmation: {
            required: "Ulangi password baru",
            minlength: "Masukkan minimal 8 karakter",
          },
        },
        errorPlacement: function (error, element) {
          error.appendTo(element.parents(".mb-3"));
        },
        submitHandler: function (form) {
          var i = 0;
          var id = $("#currentPassword").attr("data-bs-id");
          $.ajaxSetup({
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
          });
          $(form).ajaxSubmit({
            type: "PUT",
            data: $(form).serialize(),
            dataType: "json",
            url: "/admin/changepassword/" + id,
            beforeSend: function () {
              $(".save-changes-password").prop("disabled", true);
              $(".change-password-response").html("");
              $(".change-password-response").append(
                `<div class="alert alert-warning" role="alert">Mohon menunggu, permintaan anda sedang diproses!</div>`
              );
              i++;
            },
            success: function (response) {
              if (response.status == 400) {
                $(".change-password-response").html("");
                $(".change-password-response").html(
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
                $("#currentPassword").val("");
                $("#newpassword").val("");
                $("#newpassword_confirmation").val("");
              } else if (response.status == 200) {
                $(".change-password-response").html("");
                $(".change-password-response").html(
                  `<div class="alert alert-success" role="alert"></div>`
                );

                $(".change-password-response .alert").text(response.message);
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                }, 6000);
                $("label.text-danger").remove();
                $("#currentPassword").val("");
                $("#newpassword").val("");
                $("#newpassword_confirmation").val("");
              }
            },
            error: function (xhr, status, error) {
              $(".change-password-response").html("");
              $(".change-password-response").html(
                `<div class="alert alert-danger" role="alert"></div>`
              );

              $(".change-password-response .alert").text(error);
              window.setTimeout(function () {
                $(".alert")
                  .fadeTo(500, 0)
                  .slideUp(500, function () {
                    $(this).remove();
                  });
              }, 4000);
              $("label.text-danger").remove();
              $("#currentPassword").val("");
              $("#newpassword").val("");
              $("#newpassword_confirmation").val("");
            },
            complete: function () {
              i--;
              if (i <= 0) {
                $(".save-changes-password").prop("disabled", false);
              }
            },
          });

          return false;
        },
      });

      $("#formAccountSettings").validate({
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
        },
        errorPlacement: function (error, element) {
          error.appendTo(element.parents(".mb-3"));
        },
        submitHandler: function (form) {
          var formData = new FormData(form);
          formData.append("username", $("input#username").val());
          formData.append("name", $("input#name").val());
          formData.append("email", $("input#email").val());
          formData.append("phone", $("input#phone").val());
          var i = 0;
          var id = $("#username").attr("data-bs-id");
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
            url: "/admin/profile/" + id,
            beforeSend: function () {
              $(".save-changes-edit-profile").prop("disabled", true);
              $(".edit-profile-response").html("");
              $(".edit-profile-response").append(
                `<div class="alert alert-warning" role="alert">Mohon menunggu, permintaan anda sedang diproses!</div>`
              );
              i++;
            },
            success: function (response) {
              if (response.status == 400) {
                $(".edit-profile-response").html("");
                $(".edit-profile-response").html(
                  `<div class="alert alert-danger" role="alert"></div>`
                );
                $.each(response.errors, function (key, err_value) {
                  $(".alert-danger").append("<li>" + err_value + "</li>");
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
                $(".edit-profile-response").html("");
                $(".edit-profile-response").html(
                  `<div class="alert alert-success" role="alert"></div>`
                );

                $(".edit-profile-response .alert").text(response.message);
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                }, 6000);
                $("label.text-danger").remove();
                var content =
                  `<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="/storage/` +
                  response.content.photo +
                  `" alt class="w-px-40 h-auto rounded-circle" />
                </div>
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="#">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="/storage/` +
                  response.content.photo +
                  `" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">` +
                  response.content.name +
                  `</span>
                                <small class="text-muted">` +
                  response.content.username +
                  `</small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="/admin/profil/` +
                  response.content.id +
                  `">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Profil</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item" href="javascript:void(0);" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                    </a>
                    <form id="logout-form" action="/admin/logout" method="POST" class="d-none">
                    <input type="hidden" name="_token" value="` +
                  $('meta[name="csrf-token"]').attr("content") +
                  `"></form>
                </li>
            </ul>`;
                $(".nav-item.navbar-dropdown.dropdown-user.dropdown").html(
                  content
                );
              }
            },
            error: function (xhr, status, error) {
              $(".edit-profile-response").html("");
              $(".edit-profile-response").html(
                `<div class="alert alert-danger" role="alert"></div>`
              );

              $(".edit-profile-response .alert").text(error);
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
