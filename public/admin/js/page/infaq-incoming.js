$(function () {
  var a,
    e = $(".datatables-infaq-incoming").DataTable({
      ajax: "/admin/infaq/masuk",
      columns: [
        {
          data: "id",
        },
        {
          data: "name",
        },
        {
          data: "email",
        },
        {
          data: "infaq",
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
          render: function (a, e, t, s) {
            var n = t.name,
              l = t.phone;
            return (
              '<div class="d-flex flex-column"><a href="javascript:void(0);" class="text-body text-truncate fw-semibold">' +
              n +
              '</a><small class="text-truncate text-muted"><a href="https://wa.me/62' +
              l.substring(1) +
              '" target="_blank">' +
              l +
              "</a></small></div></div>"
            );
          },
        },
        {
          targets: 2,
          render: function (a, e, t, s) {
            t = t.email;
            return '<a href="mailto:' + t + '">' + t + "</a>";
          },
        },
        {
          type: "formatted-num",
          targets: 3,
          render: function (a, e, t, s) {
            t = t.infaq;
            return Intl.NumberFormat("id-ID", {
              style: "currency",
              currency: "IDR",
            }).format(t);
          },
        },
        {
          targets: 4,
          orderable: false,
          render: function (a, e, t, s) {
            return '<input type="submit" class="btn btn-outline-success me-2 infaq-confirmation-btn" value="Konfirmasi">';
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
      ],
      responsive: {
        details: {
          display: $.fn.dataTable.Responsive.display.modal({
            header: function (e) {
              return "Detail infaq dari " + e.data().name;
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
  $(".datatables-infaq-incoming tbody").on(
    "click",
    ".infaq-confirmation-btn",
    function () {
      var id = $(this)
        .parents("tr")
        .children(".tdid")
        .children(".id")
        .attr("data-bs-id");
      var a = $(".datatables-infaq-incoming").DataTable();
      confirminfaq(id, a);
    }
  ),
    setTimeout(() => {
      $(".dataTables_filter .form-control").removeClass("form-control-sm"),
        $(".dataTables_length .form-select").removeClass("form-select-sm");
    }, 300);
});

function confirminfaq(id, e) {
  var i = 0;
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });
  $.ajax({
    type: "put",
    url: "/infaq/confirm/" + id,
    data: id,
    dataType: "json",
    beforeSend: function () {
      $(".infaq-confirmation-btn").prop("disabled", true);
      $(".infaq-incoming-response").html("");
      $(".infaq-incoming-response").append(
        `<div class="alert alert-warning" role="alert">Mohon menunggu, permintaan anda sedang diproses!</div>`
      );
      i++;
    },
    success: function (response) {
      if (response.status == 400) {
        $(".infaq-incoming-response").html("");
        $(".infaq-incoming-response").html(
          `<div class="alert alert-danger" role="alert"></div>`
        );

        $(".infaq-incoming-response .alert").text(response.pesan);
        window.setTimeout(function () {
          $(".alert")
            .fadeTo(500, 0)
            .slideUp(500, function () {
              $(this).remove();
            });
        }, 4000);
        e.ajax.reload();
      } else if (response.status == 200) {
        $(".infaq-incoming-response").html("");
        $(".infaq-incoming-response").html(
          `<div class="alert alert-success" role="alert"></div>`
        );

        $(".infaq-incoming-response .alert").text(response.pesan);
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
        $(".infaq-confirmation-btn").prop("disabled", false);
      }
    },
  });
}
