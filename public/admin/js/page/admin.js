$(function () {
  let a,
    e = $(".datatables-users").DataTable({
      ajax: "/admin/admin",
      columns: [
        {
          data: "id",
        },
        {
          data: "name",
        },
        {
          data: "username",
        },
        {
          data: "phone",
        },
        {
          data: "photo",
        },
      ],
      columnDefs: [
        {
          type: "natural",
          targets: 0,
          class: "tdid",
          render: function (a, e, t, s) {
            return (
              '<a href="javascript:void(0)" class="id" data-bs-id="' +
              t.id +
              '">#' +
              t.id +
              "</a>"
            );
          },
        },
        {
          targets: 1,
          render: function (a, e, t, s) {
            let n = t.name,
              l = t.username,
              r = t.photo;
            return (
              '<div class="d-flex justify-content-start align-items-center"><div class="avatar-wrapper"><div class="avatar avatar-sm me-2">' +
              '<img src="/storage/' +
              r +
              '" alt="Avatar" class="rounded-circle">' +
              '</div></div><div class="d-flex flex-column"><a href="javascript:void(0)" class="text-body text-truncate fw-semibold">' +
              n +
              '</a><small class="text-truncate text-muted">' +
              l +
              "</small></div></div>"
            );
          },
        },
        {
          targets: 2,
          render: function (a, e, t, s) {
            t = t.email;
            return (
              '<a href="mailto:' +
              t +
              '" target="_blank" class="text-body text-truncate fw-semibold">' +
              t +
              "</a>"
            );
          },
        },
        {
          targets: 3,
          render: function (a, e, t, s) {
            t = t.phone;
            return (
              '<a href="https://wa.me/62' +
              t.substring(1) +
              '" target="_blank" >' +
              t +
              "</a>"
            );
          },
        },
        {
          targets: 4,
          title: "Aksi",
          searchable: !1,
          orderable: !1,
          render: function (a, e, t, s) {
            if (t.id == 1) {
              return "Super Admin";
            } else {
              return '<div class="d-flex align-items-center"><button class="btn btn-outline-danger delete-record">Hapus</button></div>';
            }
          },
        },
      ],
      order: [[0, "asc"]],
      dom: '<"row mx-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
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
        {
          text: '<a href="#" class="text-white"><i class="bx bx-plus me-0 me-sm-2"></i><span class="d-none d-lg-inline-block">Tambah Admin</span></a>',
          className: "add-new btn btn-primary",
          attr: {
            "data-bs-toggle": "offcanvas",
            "data-bs-target": "#offcanvasAddUser",
          },
        },
      ],
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (e) {
              return "Detail dari " + e.data().name;
            },
          }),
          renderer: function (e, a, t) {
            t = $.map(t, function (e, a) {
              return "" !== e.title
                ? '<tr data-dt-row="' +
                    e.rowIndex +
                    '" data-dt-column="' +
                    e.columnIndex +
                    '"><td>' +
                    e.title +
                    ":</td> <td>" +
                    e.data +
                    "</td></tr>"
                : "";
            }).join("");
            return !!t && $('<table class="table"/><tbody />').append(t);
          },
        },
      },
    });
  $(".datatables-users tbody").on("click", ".delete-record", function () {
    // e.row($(this).parents("tr")).remove().draw();
    let dt = e.row($(this).parents("tr"));
    let id = $(this)
      .parents("tr")
      .children(".tdid")
      .children(".id")
      .attr("data-bs-id");
    Swal.fire({
      title: "Apakah anda yakin?",
      text: "Admin akan dihapus!",
      icon: "warning",
      showCancelButton: !0,
      confirmButtonText: "Hapus!",
      customClass: {
        confirmButton: "btn btn-primary me-2",
        cancelButton: "btn btn-label-secondary",
      },
      buttonsStyling: !1,
    }).then(function (n) {
      if (n.value) {
        deleteitem(id, dt);
        Swal.fire({
          icon: "success",
          title: "Terhapus!",
          text: "Admin berhasil dihapus",
          customClass: {
            confirmButton: "btn btn-success",
          },
        });
      } else {
        n.dismiss === Swal.DismissReason.cancel &&
          Swal.fire({
            title: "Dibatalkan",
            text: "Penghapusan dibatalkan :)",
            icon: "error",
            customClass: {
              confirmButton: "btn btn-success",
            },
          });
      }
    });
  }),
    setTimeout(() => {
      $(".dataTables_filter .form-control").removeClass("form-control-sm"),
        $(".dataTables_length .form-select").removeClass("form-select-sm");
    }, 300);
});

function deleteitem(id, e) {
  let i = 0;
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });
  $.ajax({
    type: "delete",
    url: "/admin/" + id,
    data: id,
    dataType: "json",
    beforeSend: function () {
      $(".delete-record").prop("disabled", true);
      $(".admin-response").html("");
      $(".admin-response").append(
        `<div class="alert alert-warning" role="alert">Mohon menunggu, permintaan anda sedang diproses!</div>`
      );
      i++;
    },
    success: function (response) {
      if (response.status == 400) {
        $(".admin-response").html("");
        $(".admin-response").html(
          `<div class="alert alert-danger" role="alert"></div>`
        );

        $(".admin-response .alert").text(response.message);
        window.setTimeout(function () {
          $(".alert")
            .fadeTo(500, 0)
            .slideUp(500, function () {
              $(this).remove();
            });
        }, 4000);
        e.ajax.reload();
      } else if (response.status == 200) {
        $(".admin-response").html("");
        $(".admin-response").html(
          `<div class="alert alert-success" role="alert"></div>`
        );

        $(".admin-response .alert").text(response.message);
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
        $(".delete-record").prop("disabled", false);
      }
    },
  });
}
