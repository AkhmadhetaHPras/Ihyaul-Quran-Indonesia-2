$(document).ready(function () {
  (function ($) {
    "use strict";
    // validate contactForm form
    $(function () {
      $("#registrationform").validate({
        ignore: [],
        rules: {
          name: "required",
          job: "required",
          skill: {
            required: false,
          },
          gender: "required",
          city: "required",
          birth: "required",
          email: {
            required: true,
            email: true,
          },
          phone: "required",
          a1: "required",
          a2: "required",
          b1: "required",
          b2: {
            required: true,
            minlength: 1,
          },
          class: "required",
          c2: "required",
          c3: {
            required: true,
            minlength: 1,
          },
          infaqyn: "required",
          resources: {
            required: true,
            minlength: 1,
          },
          motivation: "required",
          infaq: "required",
        },
        messages: {
          name: {
            required: "Masukkan nama anda",
          },
          job: {
            required: "Masukkan pekerjaan anda",
          },
          city: {
            required: "Masukkan kota/kabupaten tempat tinggal",
          },
          gender: {
            required: "Pilih jenis kelamin yang sesuai",
          },
          birth: {
            required: "Masukkan tanggal lahir anda",
          },
          email: {
            required: "Masukkan alamat email anda",
            email: "Masukkan alamat email yang valid",
          },
          phone: {
            required: "Masukkan nomer WA aktif",
          },
          a1: {
            required: "Masukkan jawaban anda",
          },
          a2: {
            required: "Masukkan jawaban anda",
          },
          b1: {
            required: "Masukkan jawaban anda",
          },
          b2: {
            required: "Masukkan jawaban anda",
            minlength: "Pilih salah satu jawaban",
          },
          class: {
            required: "Masukkan jawaban anda",
          },
          c2: {
            required: "Pilih lokasi kelas offline",
            minlength: "Pilih lokasi kelas offline",
          },
          c3: {
            required: "Pilih jadwal kelas tambahan",
          },
          resources: {
            required: "Masukkan jawaban anda",
            minlength: "Pilih salah satu sumber informasi anda",
          },
          motivation: {
            required: "Masukkan jawaban anda",
          },
          infaqyn: {
            required: "Masukkan jawaban anda",
          },
          infaq: {
            required: "Masukkan nominal infaq yang ingin anda kirimkan",
          },
        },
        focusInvalid: false,
        invalidHandler: function (form, validator) {
          if (!validator.numberOfInvalids()) return;

          $("html, body").animate(
            {
              scrollTop: $(validator.errorList[0].element).offset().top - 400,
            },
            300
          );
          validator.errorList[0].element.focus();
        },
        errorPlacement: function (error, element) {
          if (element.is(":radio") || element.is(":checkbox")) {
            error.addClass("col-12");
            error.appendTo(element.parents(".row.input"));
          } else if (element.is("select")) {
            error.appendTo(element.parents(".mb-4.input"));
          } else {
            // This is the default behavior
            error.insertAfter(element);
          }
        },
        submitHandler: function (form) {
          let i = 0;
          $.ajaxSetup({
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
          });
          $(form).ajaxSubmit({
            type: "POST",
            data: $(form).serialize(),
            dataType: "json",
            url: "/program/amma",
            beforeSend: function () {
              $(".button.button-infaqForm.boxed-btn").prop("disabled", true);
              $("#amma-register-response").html("");
              $("#amma-register-response").append(
                `<div class="alert alert-warning" role="alert">Mohon menunggu, permintaan anda sedang diproses!</div>`
              );
              i++;
            },
            success: function (response) {
              if (response.status == 400) {
                $("#amma-register-response").html("");
                $("#amma-register-response").html(
                  `<div class="alert alert-danger" role="alert"></div>`
                );

                $("#amma-register-response .alert").text(response.message);
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                }, 4000);
              } else if (response.status == 200) {
                window.location = response.route;
                $("#amma-register-response").html("");
                $("#amma-register-response").html(
                  `<div class="alert alert-success" role="alert"></div>`
                );

                $("#amma-register-response .alert").text(response.message);
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                }, 4000);
                $("label.text-danger").remove();
                $(":input", "#registrationform")
                  .not(":button, :submit, :reset, :hidden")
                  .val("")
                  .prop("checked", false)
                  .prop("selected", "");
              }
            },
            error: function (xhr, status, error) {
              $("#amma-register-response").html("");
              $("#amma-register-response").html(
                `<div class="alert alert-danger" role="alert"></div>`
              );

              $("#amma-register-response .alert").text(error);
              // $("#amma-register-response .alert").text(xhr.responseText);
              window.setTimeout(function () {
                $(".alert")
                  .fadeTo(500, 0)
                  .slideUp(500, function () {
                    $(this).remove();
                  });
              }, 10000);
            },
            complete: function () {
              i--;
              if (i <= 0) {
                $(".button.button-infaqForm.boxed-btn").prop("disabled", false);
              }
            },
          });
          // $("#registrationform").unbind('submit');
          return false;
        },
      });
    });
  })(jQuery);

  // remove label error when value is not empty on select
  $("select").on("change", function () {
    if (this.value != "") {
      var p = $(this).parents(".input");
      p.children("label.text-danger").remove();
    }
  });

  // show a2 element if a1 answer is yes
  const a1s = document.querySelectorAll('input[name="a1"]');
  for (const a1 of a1s) {
    a1.addEventListener("change", a2show);
  }

  function a2show(e) {
    if (this.value == "true") {
      let $a2 = $(`<div class="mb-4 a2">
                <label class="form-label" for="">Bila belum benar dan lancar, apakah bersedia belajar tahsin dasar terlebih dahulu?</label>
                <div class="row input">
                    <div class="col-sm-6 col-12">
                        <div class="switch-wrap d-flex align-items-center justify-content-start mb-0">
                            <div class="primary-radio">
                                <input class="form-check-input" type="radio" name="a2" id="a2yes" value="true">
                                <label for="a2yes"></label>
                            </div>
                            <label for="a2yes" class="ml-3">Bersedia</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="switch-wrap d-flex align-items-center justify-content-start mb-0">
                            <div class="primary-radio">
                                <input class="form-check-input" type="radio" name="a2" id="a2no" value="false">
                                <label for="a2no"></label>
                            </div>
                            <label for="a2no" class="ml-3">Tidak</label>
                        </div>
                    </div>
                </div>
            </div>`);
      $a2.insertAfter($(".a1"));
    } else {
      if ($(".a2").length) {
        $(".a2").remove();
      }
    }
  }

  // show c2 element if c1 answer is offline
  const classes = document.querySelectorAll('input[name="class"]');
  for (const c of classes) {
    c.addEventListener("change", c2show);
  }

  function c2show(e) {
    if (this.value == "Offline") {
      $c2 = $(`<div class="mb-4 input location">
                <label class="form-label" for="c2">Pilih area lokasi yang diinginkan</label>
                <div class="input-group-icon mt-10">
                    <div class="icon"><i class="fa fa-building" aria-hidden="true"></i></div>
                    <div class="form-select" id="default-select">
                        <select id="c2" name="c2">
                            <option value="">Pilih lokasi</option>
                            <option value="Araya">Araya</option>
                            <option value="Bumi Palapa (Tunggul Wulung)">Bumi Palapa (Tunggul Wulung)</option>
                            <option value="Sawojajar">Sawojajar</option>
                            <option value="Kantor Agung Wisata (depan RS lavalet)">Kantor Agung Wisata (depan RS lavalet)</option>
                        </select>
                    </div>
                </div>
            </div>`);
      $c2.insertAfter($(".class"));
      $("#c2").niceSelect();
    } else {
      if ($(".location").length) {
        $(".location").remove();
      }
    }
  }

  // show infaq element if infaqyesorno answer is yes
  const infaqs = document.querySelectorAll('input[name="infaqyn"]');
  for (const infaq of infaqs) {
    infaq.addEventListener("change", infaqshow);
  }

  function infaqshow(e) {
    if (this.value == "Ya") {
      $infaq = $(`<div class="mb-4 infaq">
                <label class="form-label" for="infaq">Nominal Infaq</label>
                <input type="number" name="infaq" id="infaq" min="0" placeholder="10000" onfocus="this.placeholder = ''" onblur="this.placeholder = '10000'" required class="single-input-primary">
                <small id="infaqHelp" class="form-text text-muted">Transfer nominal yang anda masukkan ke rekening BSM/BSI 711 910 7207 an. INFAQ YAYASAN IHYAUL serta kirimkan bukti transfer kepada <a href="https://wa.me/6281335462833" class="text-primary">Admin (+6281335462833)</a></small>
            </div>`);
      $infaq.insertAfter($(".infaqyesorno"));
    } else {
      if ($(".infaq").length) {
        $(".infaq").remove();
      }
    }
  }
});
