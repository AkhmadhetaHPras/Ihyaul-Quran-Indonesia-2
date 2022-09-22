"use strict";
$(function () {
  var a,
    e = $(".datatable-responden"),
    b = $(".datatable-batch"),
    t = $(".select2"),
    n = {
      0: {
        title: "Ya",
        class: "bg-label-success",
      },
      1: {
        title: "Tidak",
        class: "bg-label-warning",
      },
      null: {
        title: "-",
        class: "",
      },
    },
    c = {
      Online: {
        title: "Online",
        class: "bg-label-primary",
      },
      Offline: {
        title: "Offline",
        class: "bg-label-secondary",
      },
    };
  e.length &&
    (a = e.DataTable({
      ajax: "/admin/program/1",
      columns: [
        {
          data: "gender",
        },
        {
          data: "id",
        },
        {
          data: "name",
        },
        {
          data: "contact",
        },
        {
          data: "age",
        },
        {
          data: "infaq",
        },
        {
          data: "batch",
        },
        {
          data: "a1",
        },
        {
          data: "a2",
        },
        {
          data: "b1",
        },
        {
          data: "b2",
        },
        {
          data: "c1",
        },
        {
          data: "c2",
        },
        {
          data: "c3",
        },
      ],
      columnDefs: [
        {
          targets: 0,
          className: "d-none",
          render: function (a, e, t, s) {
            return t.gender;
          },
        },
        {
          type: "natural",
          targets: 1,
          render: function (a, e, t, s) {
            return "#" + t.id;
          },
        },
        {
          targets: 2,
          orderable: false,
          render: function (a, e, t, s) {
            var d = JSON.parse(t.participant);
            var n = t.name,
              l = d.city,
              r = d.gender,
              j = d.job;
            if (r == "Akhwat") {
              return (
                "<span data-bs-toggle='tooltip' data-bs-html='true' title='<span>" +
                j +
                "<br> Motivasi: " +
                t.motivation_target +
                "<br> Informasi: " +
                t.resources +
                "</span>'>" +
                '<div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-2">' +
                '<span class="avatar-initial rounded-circle bg-label-danger"><i class="bx bx-female"></i></span>' +
                '</div></div><div class="d-flex flex-column"><a href="javascript:void(0);" class="text-body text-truncate fw-semibold">' +
                n +
                '</a><small class="text-truncate text-muted">' +
                l +
                "</small></div></div></span>"
              );
            } else {
              return (
                "<span data-bs-toggle='tooltip' data-bs-html='true' title='<span>" +
                j +
                "<br> Motivasi: " +
                t.motivation_target +
                "<br> Informasi: " +
                t.resources +
                "</span>'>" +
                '<div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-2">' +
                '<span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-male"></i></span>' +
                '</div></div><div class="d-flex flex-column"><span class="text-body text-truncate fw-semibold">' +
                n +
                '</span><small class="text-truncate text-muted">' +
                l +
                "</small></div></div></span>"
              );
            }
          },
        },
        {
          targets: 3,
          render: function (a, e, t, s) {
            var d = JSON.parse(t.participant);
            var n = d.email,
              l = d.phone;
            return (
              '<div class="d-flex flex-column"><a href="mailto:' +
              n +
              '" target="_blank" class="text-body text-truncate fw-semibold">' +
              n +
              '</a><small class="text-truncate text-muted"><a href="https://wa.me/62' +
              l.substring(1) +
              '" target="_blank" >' +
              l +
              "</a></small></div>"
            );
          },
        },
        {
          targets: 4,
          render: function (a, e, t, s) {
            t = t.age;
            return t;
          },
        },
        {
          type: "formatted-num",
          targets: 5,
          render: function (a, e, t, s) {
            var d = JSON.parse(t.infaq);
            if (d != null) {
              t = d.infaq;
            } else {
              t = 0;
            }
            return Intl.NumberFormat("id-ID", {
              style: "currency",
              currency: "IDR",
            }).format(t);
          },
        },
        {
          targets: 6,
          render: function (a, e, t, s) {
            t = t.batch;
            return "#" + t;
          },
        },
        {
          targets: 7,
          render: function (a, e, t, s) {
            t = t.a1;
            return (
              '<span class="badge ' + n[t].class + '">' + n[t].title + "</span>"
            );
          },
        },
        {
          targets: 8,

          render: function (a, e, t, s) {
            t = t.a2;
            return (
              '<span class="badge ' + n[t].class + '">' + n[t].title + "</span>"
            );
          },
        },
        {
          targets: 9,
          render: function (a, e, t, s) {
            t = t.b1;
            return (
              '<span class="badge ' + n[t].class + '">' + n[t].title + "</span>"
            );
          },
        },
        {
          targets: 10,
          render: function (a, e, t, s) {
            return t.b2;
          },
        },
        {
          targets: 11,
          render: function (a, e, t, s) {
            t = t.c1;
            return (
              '<span class="badge ' + c[t].class + '">' + c[t].title + "</span>"
            );
          },
        },
        {
          targets: 12,

          render: function (a, e, t, s) {
            t = t.c2;
            if (t == null) {
              t = "-";
            }
            return t;
          },
        },
        {
          targets: 13,

          render: function (a, e, t, s) {
            return t.c3;
          },
        },
      ],
      order: [[1, "desc"]],
      scrollX: true,
      dom: '<"row ms-2 me-3"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-2"f<"response_batch mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      language: {
        sLengthMenu: "_MENU_",
        search: "",
        searchPlaceholder: "Kata Kunci",
      },
      buttons: [
        {
          extend: "collection",
          className: "btn btn-label-secondary dropdown-toggle mx-3",
          text: '<i class="bx bx-upload me-2"></i>Export',
          buttons: [
            {
              extend: "print",
              text: '<i class="bx bx-printer me-2" ></i>Print',
              className: "dropdown-item",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
              },
            },
            {
              extend: "csv",
              text: '<i class="bx bx-file me-2" ></i>Csv',
              className: "dropdown-item",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
              },
            },
            {
              extend: "excel",
              text: "Excel",
              className: "dropdown-item",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
              },
            },
            {
              extend: "pdf",
              text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
              className: "dropdown-item",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
              },
            },
            {
              extend: "copy",
              text: '<i class="bx bx-copy me-2" ></i>Copy',
              className: "dropdown-item",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
              },
            },
          ],
        },
      ],

      initComplete: function () {
        this.api()
          .columns(0)
          .every(function () {
            var e = this,
              t = $(
                '<select id="gender" class="form-select"><option value=""> Jenis Kelamin </option></select>'
              )
                .appendTo(".response_gender")
                .on("change", function () {
                  var a = $.fn.dataTable.util.escapeRegex($(this).val());
                  e.search(a ? "^" + a + "$" : "", !0, !1).draw();
                });
            e.data()
              .unique()
              .sort()
              .each(function (a, e) {
                t.append(
                  '<option value="' +
                    a +
                    '" class="text-capitalize">' +
                    a +
                    "</option>"
                );
              });
          });
        this.api()
          .columns(6)
          .every(function () {
            var e = this,
              t = $(
                '<select id="Batch" class="form-select text-white bg-primary"><option value=""> Pilih Batch </option></select>'
              )
                .appendTo(".response_batch")
                .on("change", function () {
                  var a = $.fn.dataTable.util.escapeRegex($(this).val());
                  e.search(a ? "^" + a + "$" : "", !0, !1).draw();
                });
            e.data()
              .unique()
              .sort()
              .each(function (a, e) {
                t.append(
                  '<option value="#' +
                    a +
                    '" class="text-capitalize">' +
                    a +
                    "</option>"
                );
              });
          });
        this.api()
          .columns(7)
          .every(function () {
            var e = this,
              t = $(
                '<select id="A1" class="form-select"><option value=""> A1 </option></select>'
              )
                .appendTo(".response_a1")
                .on("change", function () {
                  var a = $.fn.dataTable.util.escapeRegex($(this).val());
                  e.search(a ? "^" + a + "$" : "", !0, !1).draw();
                });
            e.data()
              .unique()
              .sort()
              .each(function (a, e) {
                t.append(
                  '<option value="' +
                    n[a].title +
                    '" class="text-capitalize">' +
                    n[a].title +
                    "</option>"
                );
              });
          });
        this.api()
          .columns(8)
          .every(function () {
            var e = this,
              t = $(
                '<select id="A2" class="form-select"><option value=""> A2 </option></select>'
              )
                .appendTo(".response_a2")
                .on("change", function () {
                  var a = $.fn.dataTable.util.escapeRegex($(this).val());
                  e.search(a ? "^" + a + "$" : "", !0, !1).draw();
                });
            e.data()
              .unique()
              .sort()
              .each(function (a, e) {
                t.append(
                  '<option value="' +
                    n[a].title +
                    '" class="text-capitalize">' +
                    n[a].title +
                    "</option>"
                );
              });
          });
        this.api()
          .columns(9)
          .every(function () {
            var e = this,
              t = $(
                '<select id="B1" class="form-select"><option value=""> B1 </option></select>'
              )
                .appendTo(".response_b1")
                .on("change", function () {
                  var a = $.fn.dataTable.util.escapeRegex($(this).val());
                  e.search(a ? "^" + a + "$" : "", !0, !1).draw();
                });
            e.data()
              .unique()
              .sort()
              .each(function (a, e) {
                t.append(
                  '<option value="' +
                    n[a].title +
                    '" class="text-capitalize">' +
                    n[a].title +
                    "</option>"
                );
              });
          });
        this.api()
          .columns(10)
          .every(function () {
            var e = this,
              t = $(
                '<select id="B2" class="form-select"><option value=""> B2 </option></select>'
              )
                .appendTo(".response_b2")
                .on("change", function () {
                  var a = $.fn.dataTable.util.escapeRegex($(this).val());
                  e.search(a ? "^" + a + "$" : "", !0, !1).draw();
                });
            e.data()
              .unique()
              .sort()
              .each(function (a, e) {
                t.append(
                  '<option value="' +
                    a +
                    '" class="text-capitalize">' +
                    a +
                    "</option>"
                );
              });
          });
        this.api()
          .columns(11)
          .every(function () {
            var e = this,
              t = $(
                '<select id="C1" class="form-select"><option value=""> Kelas </option></select>'
              )
                .appendTo(".response_c1")
                .on("change", function () {
                  var a = $.fn.dataTable.util.escapeRegex($(this).val());
                  e.search(a ? "^" + a + "$" : "", !0, !1).draw();
                });
            e.data()
              .unique()
              .sort()
              .each(function (a, e) {
                t.append(
                  '<option value="' +
                    c[a].title +
                    '" class="text-capitalize">' +
                    c[a].title +
                    "</option>"
                );
              });
          });
        this.api()
          .columns(12)
          .every(function () {
            var e = this,
              t = $(
                '<select id="C2" class="form-select"><option value=""> Lokasi </option></select>'
              )
                .appendTo(".response_c2")
                .on("change", function () {
                  var a = $.fn.dataTable.util.escapeRegex($(this).val());
                  e.search(a ? "^" + a + "$" : "", !0, !1).draw();
                });
            e.data()
              .unique()
              .sort()
              .each(function (a, e) {
                if (a == null) {
                  t.append(
                    '<option value="-" class="text-capitalize">-</option>'
                  );
                } else {
                  t.append(
                    '<option value="' +
                      a +
                      '" class="text-capitalize">' +
                      a +
                      "</option>"
                  );
                }
              });
          });
        this.api()
          .columns(13)
          .every(function () {
            var e = this,
              t = $(
                '<select id="C3" class="form-select"><option value=""> Jadwal Kelas </option></select>'
              )
                .appendTo(".response_c3")
                .on("change", function () {
                  var a = $.fn.dataTable.util.escapeRegex($(this).val());
                  e.search(a ? "^" + a + "$" : "", !0, !1).draw();
                });
            e.data()
              .unique()
              .sort()
              .each(function (a, e) {
                t.append(
                  '<option value="' +
                    a +
                    '" class="text-capitalize">' +
                    a +
                    "</option>"
                );
              });
          });
      },
    })),
    // Batch datatable
    b.length &&
      b.DataTable({
        ajax: "/program/batch/1",
        columns: [
          {
            data: "batch",
          },
          {
            data: "closed_date",
          },
        ],
        columnDefs: [
          {
            type: "natural",
            targets: 0,
            render: function (a, e, t, s) {
              t = t.batch;
              return "#" + t;
            },
          },
          {
            targets: 1,
            render: function (a, e, t, s) {
              t = t.closed_date;
              return t;
            },
          },
        ],
        order: [[0, "desc"]],
        displayLength: 5,
        lengthMenu: [5, 10],
        dom: '<"row mx-4"<"col-sm-6 col-12 d-flex align-items-center justify-content-center justify-content-sm-start mb-3 mb-md-0"l><"col-sm-6 col-12 d-flex align-items-center justify-content-center justify-content-sm-end"B>>t<"row mx-4"<"col-md-12 col-lg-6 text-center text-lg-start pb-md-2 pb-lg-0"i><"col-md-12 col-lg-6 d-flex justify-content-center justify-content-lg-end"p>>',
        buttons: [
          {
            text: '<i class="bx bx-plus me-0 me-sm-2"></i><span class="d-none d-lg-inline-block">Batch Baru</span>',
            className: "add-new btn btn-primary",
            attr: {
              "data-bs-toggle": "offcanvas",
              "data-bs-target": "#offcanvasAddUser",
            },
          },
        ],
      }),
    e.on("draw.dt", function () {
      [].slice
        .call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        .map(function (a) {
          return new bootstrap.Tooltip(a, {
            boundary: document.body,
          });
        });
    }),
    setTimeout(() => {
      $(".dataTables_filter .form-control").removeClass("form-control-sm"),
        $(".dataTables_length .form-select").removeClass("form-select-sm");
    }, 300);
});

// form batch
$(document).ready(function () {
  (function ($) {
    "use strict";
    jQuery.validator.addMethod(
      "minDate",
      function (value, element) {
        var curDate = new Date();
        var inputDate = new Date(value);
        if (inputDate > curDate) return true;
        return false;
      },
      "Invalid Date!"
    );
    // validate contactForm form
    $(function () {
      $("#addNewBatch").validate({
        rules: {
          closed_date: {
            date: true,
            required: true,
            minDate: true,
          },
        },
        messages: {
          closed_date: {
            required: "Masukkan tanggal penutupan batch",
            date: "Masukkan tanggal yang valid",
            minDate: "Pilih tanggal setelah hari ini",
          },
        },
        submitHandler: function (form) {
          var i = 0;
          var id = $("#closed_date").attr("data-bs-program");
          $.ajaxSetup({
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
          });
          $(form).ajaxSubmit({
            type: "POST",
            data: $(form).serialize(),
            dataType: "json",
            url: "/program/newbatch/" + id,
            beforeSend: function () {
              $(
                ".btn.btn-primary.me-sm-3.me-1.data-submit.submit-new-batch"
              ).prop("disabled", true);
              $(".btn-cancel-new-batch").prop("disabeld", true);
              $("#new-batch-response").html("");
              $("#new-batch-response").append(
                `<div class="alert alert-warning" role="alert">Mohon menunggu, permintaan anda sedang diproses!</div>`
              );
              i++;
            },
            success: function (response) {
              if (response.status == 400) {
                $("#new-batch-response").html("");
                $("#new-batch-response").html(
                  `<div class="alert alert-danger" role="alert"></div>`
                );

                $("#new-batch-response .alert").text(response.message);
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                }, 4000);
                $("label.text-danger").remove();
                $("#closed_date").val("");
              } else if (response.status == 200) {
                $("#new-batch-response").html("");
                $("#new-batch-response").html(
                  `<div class="alert alert-success" role="alert"></div>`
                );

                $("#new-batch-response .alert").text(response.message);
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                }, 4000);
                $("label.text-danger").remove();
                $("#closed_date").val("");
                $(".datatable-batch").DataTable().ajax.reload();
                var tot = parseInt($(".batch-total").text()) + 1;
                $(".batch-total").text(tot);
              }
            },
            error: function (xhr, status, error) {
              $("#new-batch-response").html("");
              $("#new-batch-response").html(
                `<div class="alert alert-danger" role="alert"></div>`
              );

              $("#new-batch-response .alert").text(error);
              window.setTimeout(function () {
                $(".alert")
                  .fadeTo(500, 0)
                  .slideUp(500, function () {
                    $(this).remove();
                  });
              }, 4000);
              $("label.text-danger").remove();
              $("#closed_date").val("");
            },
            complete: function () {
              i--;
              if (i <= 0) {
                $(
                  ".btn.btn-primary.me-sm-3.me-1.data-submit.submit-new-batch"
                ).prop("disabled", false);
                $(".btn-cancel-new-batch").prop("disabeld", false);
              }
            },
          });

          return false;
        },
      });
    });

    $(function () {
      $("#editProgramForm").validate({
        rules: {
          title: {
            required: true,
          },
          status: {
            required: true,
            minlength: 1,
          },
          concept: {
            required: true,
          },
          requirement: {
            required: true,
          },
          superiority: {
            required: true,
          },
        },
        messages: {
          title: {
            required: "Masukkan judul program!",
          },
          status: {
            required: "Pilih status program!",
            minlength: "Pilih status program!",
          },
          concept: {
            required: "Masukkan penjelasan singkat tentang program",
          },
          requirement: {
            required: "Masukkan penjelasan syarat peserta",
          },
          superiority: {
            required:
              "Masukkan penjelasan keunggulan yang di dapat peserta ketika mengikuti program",
          },
        },
        submitHandler: function (form) {
          var i = 0;
          var id = $(".submit-edit-program").attr("data-bs-idprogram");
          $.ajaxSetup({
            headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
          });
          $(form).ajaxSubmit({
            type: "PUT",
            data: {
              title: $("input#title").val(),
              status: $("#status:selected").val(),
              concept: $("input#concept").val(),
              requirement: $("input#requirement").val(),
              superiority: $("input#requirement").val(),
            },
            dataType: "json",
            url: "/program/" + id,
            beforeSend: function () {
              $(".btn.btn-primary.me-sm-3.me-1.submit-edit-program").prop(
                "disabled",
                true
              );
              $(".edit-program-response").html("");
              $(".edit-program-response").append(
                `<div class="alert alert-warning" role="alert">Mohon menunggu, permintaan anda sedang diproses!</div>`
              );
              i++;
            },
            success: function (response) {
              if (response.status == 400) {
                $(".edit-program-response").html("");
                $(".edit-program-response").html(
                  `<div class="alert alert-danger" role="alert"></div>`
                );

                $(".edit-program-response .alert").text(response.message);
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                }, 4000);
                $("label.text-danger").remove();
              } else if (response.status == 200) {
                $(".edit-program-response").html("");
                $(".edit-program-response").html(
                  `<div class="alert alert-success" role="alert"></div>`
                );

                $(".edit-program-response .alert").text(response.message);
                window.setTimeout(function () {
                  $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function () {
                      $(this).remove();
                    });
                  location.reload();
                }, 4000);
                $("label.text-danger").remove();
              }
            },
            error: function (xhr, status, error) {
              $(".edit-program-response").html("");
              $(".edit-program-response").html(
                `<div class="alert alert-danger" role="alert"></div>`
              );

              $(".edit-program-response .alert").text(error);
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
                $(".btn.btn-primary.me-sm-3.me-1.submit-edit-program").prop(
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
