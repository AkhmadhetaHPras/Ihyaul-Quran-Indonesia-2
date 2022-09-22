"use strict";
$(function () {
  var a,
    e = $(".datatable-participant");
  e.length &&
    (a = e.DataTable({
      ajax: "/admin/pendaftar",
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
          data: "job",
        },
        {
          data: "skill",
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
          class: "tdid",
          render: function (a, e, t, s) {
            return (
              '<a href="javascript:void(0);" class="id" data-bs-id="' +
              t.id +
              '">#' +
              t.id +
              "</a>"
            );
          },
        },
        {
          targets: 2,
          orderable: true,
          render: function (a, e, t, s) {
            var n = t.name,
              l = t.city,
              r = t.gender;
            if (r == "Akhwat") {
              return (
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
            var n = t.email,
              l = t.phone;
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
          targets: 5,
          render: function (a, e, t, s) {
            return t.job;
          },
        },
        {
          targets: 6,
          render: function (a, e, t, s) {
            return t.skill;
          },
        },
      ],
      order: [[1, "desc"]],
      scrollX: true,
      dom: '<"row ms-2 me-3"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-2"f<"participant_gender mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
                columns: [0, 1, 2, 3, 4, 5],
              },
            },
            {
              extend: "csv",
              text: '<i class="bx bx-file me-2" ></i>Csv',
              className: "dropdown-item",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5],
              },
            },
            {
              extend: "excel",
              text: "Excel",
              className: "dropdown-item",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5],
              },
            },
            {
              extend: "pdf",
              text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
              className: "dropdown-item",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5],
              },
            },
            {
              extend: "copy",
              text: '<i class="bx bx-copy me-2" ></i>Copy',
              className: "dropdown-item",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5],
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
                '<select id="Batch" class="form-select text-white bg-primary"><option value=""> Filter Jenis Kelamin </option></select>'
              )
                .appendTo(".participant_gender")
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
