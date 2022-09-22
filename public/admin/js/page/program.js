"use strict";
$(function () {
  var a,
    e = $(".invoice-list-table");
  e.length &&
    (a = e.DataTable({
      ajax: "/admin/program",
      columns: [
        {
          data: "id",
          name: "id",
        },
        {
          data: "title",
          name: "title",
        },
        {
          data: "status",
          name: "status",
        },
        {
          data: "batch",
          name: "batch",
        },
        {
          data: "response",
          name: "response",
        },
        {
          data: null,
        },
      ],
      columnDefs: [
        {
          type: "natural",
          targets: 0,
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
          targets: 1,
          class: "tdid",
          render: function (a, e, t, s) {
            return (
              '<a href="/admin/program/' +
              t.id +
              '" class="id" data-bs-id="' +
              t.id +
              '">' +
              t.title +
              "</a>"
            );
          },
        },
        {
          targets: 2,
          responsivePriority: 4,
          render: function (a, e, t, s) {
            var n = t.status;
            return "Dibuka" === n
              ? '<span class="badge bg-label-success">' + n + "</span>"
              : '<span class="badge bg-label-danger">' + n + "</span>";
          },
        },
        {
          type: "natural",
          targets: 3,
          render: function (a, e, t, s) {
            var d = JSON.parse(t.batch);
            t = d.batch;
            return "#" + t;
          },
        },
        {
          targets: 4,
          render: function (a, e, t, s) {
            return t.response;
          },
        },
        {
          targets: -1,
          title: "Aksi",
          searchable: !1,
          orderable: !1,
          render: function (a, e, t, s) {
            if (t.status == "Dibuka") {
              return (
                '<div class="d-flex align-items-center"><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="/admin/program/' +
                t.id +
                '" class="dropdown-item">Detail</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item close-program text-danger">Tutup</a></div></div></div>'
              );
            } else {
              return (
                '<div class="d-flex align-items-center"><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="/admin/program/' +
                t.id +
                '" class="dropdown-item">Detail</a><a href="javascript:;" class="dropdown-item open-program text-success">Buka 1 Minggu</a><div class="dropdown-divider"></div></div></div></div>'
              );
            }
          },
        },
      ],
      order: [[1, "desc"]],
      dom: '<"row ms-2 me-3"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-2"f<"invoice_status mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
                columns: [0, 1, 2, 3],
              },
            },
            {
              extend: "csv",
              text: '<i class="bx bx-file me-2" ></i>Csv',
              className: "dropdown-item",
              exportOptions: {
                columns: [0, 1, 2, 3],
              },
            },
            {
              extend: "excel",
              text: "Excel",
              className: "dropdown-item",
              exportOptions: {
                columns: [0, 1, 2, 3],
              },
            },
            {
              extend: "pdf",
              text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
              className: "dropdown-item",
              exportOptions: {
                columns: [0, 1, 2, 3],
              },
            },
            {
              extend: "copy",
              text: '<i class="bx bx-copy me-2" ></i>Copy',
              className: "dropdown-item",
              exportOptions: {
                columns: [0, 1, 2, 3],
              },
            },
          ],
        },
      ],
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (a) {
              return "Details of " + a.data().title;
            },
          }),
          renderer: function (a, e, t) {
            t = $.map(t, function (a, e) {
              return "" !== a.title
                ? '<tr data-dt-row="' +
                    a.rowIndex +
                    '" data-dt-column="' +
                    a.columnIndex +
                    '"><td>' +
                    a.title +
                    ":</td> <td>" +
                    a.data +
                    "</td></tr>"
                : "";
            }).join("");
            return !!t && $('<table class="table"/><tbody />').append(t);
          },
        },
      },
      initComplete: function () {
        this.api()
          .columns(2)
          .every(function () {
            var e = this,
              t = $(
                '<select id="UserRole" class="form-select"><option value=""> Pilih Status </option></select>'
              )
                .appendTo(".invoice_status")
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
    // $(".invoice-list-table tbody").on("click", ".delete-record", function() {
    //     // a.row($(this).parents("tr")).remove().draw()
    //     var dt = a.row($(this).parents("tr"));
    //     var id = $(this).parents('tr').children('.tdid').children('.id').attr('data-bs-id');
    //     deleteitem(id, dt);
    // }),
    $(".invoice-list-table tbody").on("click", ".open-program", function () {
      var id = $(this)
        .parents("tr")
        .children(".tdid")
        .children(".id")
        .attr("data-bs-id");
      openprogram(id, a);
    }),
    $(".invoice-list-table tbody").on("click", ".close-program", function () {
      var id = $(this)
        .parents("tr")
        .children(".tdid")
        .children(".id")
        .attr("data-bs-id");
      closeprogram(id, a);
    }),
    setTimeout(() => {
      $(".dataTables_filter .form-control").removeClass("form-control-sm"),
        $(".dataTables_length .form-select").removeClass("form-select-sm");
    }, 300);
});

// function deleteitem(id, e) {
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//         type: "delete",
//         url: "/program/" + id,
//         data: id,
//         dataType: "json",
//         success: function(response) {
//             // berhasil
//             e.remove().draw();
//         }
//     });
// }

function openprogram(id, e) {
  var i = 0;
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });
  $.ajax({
    type: "put",
    url: "/program/open/" + id,
    data: id,
    dataType: "json",
    beforeSend: function () {
      $(".open-program").prop("disabled", true);
      $(".program-response").html("");
      $(".program-response").append(
        `<div class="alert alert-warning" role="alert">Mohon menunggu, permintaan anda sedang diproses!</div>`
      );
      i++;
    },
    success: function (response) {
      if (response.status == 400) {
        $(".program-response").html("");
        $(".program-response").html(
          `<div class="alert alert-danger" role="alert"></div>`
        );

        $(".program-response .alert").text(response.message);
        window.setTimeout(function () {
          $(".alert")
            .fadeTo(500, 0)
            .slideUp(500, function () {
              $(this).remove();
            });
        }, 4000);
        e.ajax.reload();
      } else if (response.status == 200) {
        $(".program-response").html("");
        $(".program-response").html(
          `<div class="alert alert-success" role="alert"></div>`
        );

        $(".program-response .alert").text(response.message);
        window.setTimeout(function () {
          $(".alert")
            .fadeTo(500, 0)
            .slideUp(500, function () {
              $(this).remove();
            });
        }, 4000);
        e.ajax.reload();
      }
    },
    complete: function () {
      i--;
      if (i <= 0) {
        $(".open-program").prop("disabled", false);
      }
    },
  });
}

function closeprogram(id, e) {
  var i = 0;
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });
  $.ajax({
    type: "put",
    url: "/program/close/" + id,
    data: id,
    dataType: "json",
    beforeSend: function () {
      $(".close-program").prop("disabled", true);
      $(".program-response").html("");
      $(".program-response").append(
        `<div class="alert alert-warning" role="alert">Mohon menunggu, permintaan anda sedang diproses!</div>`
      );
      i++;
    },
    success: function (response) {
      if (response.status == 400) {
        $(".program-response").html("");
        $(".program-response").html(
          `<div class="alert alert-danger" role="alert"></div>`
        );

        $(".program-response .alert").text(response.message);
        window.setTimeout(function () {
          $(".alert")
            .fadeTo(500, 0)
            .slideUp(500, function () {
              $(this).remove();
            });
        }, 4000);
        e.ajax.reload();
      } else if (response.status == 200) {
        $(".program-response").html("");
        $(".program-response").html(
          `<div class="alert alert-success" role="alert"></div>`
        );

        $(".program-response .alert").text(response.message);
        window.setTimeout(function () {
          $(".alert")
            .fadeTo(500, 0)
            .slideUp(500, function () {
              $(this).remove();
            });
        }, 4000);
        e.ajax.reload();
      }
    },
    complete: function () {
      i--;
      if (i <= 0) {
        $(".close-program").prop("disabled", false);
      }
    },
  });
}
