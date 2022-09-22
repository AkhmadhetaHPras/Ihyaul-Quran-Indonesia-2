@extends('admin.layouts.app')

@section('spesificScript')
<link rel="stylesheet" href="{{asset('admin/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('admin/vendor/libs/formvalidation/formValidation.min.css')}}" />
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Infaq /</span> Masuk
</h4>

<!-- Invoice List Table -->
<div class="card">
    <div class="infaq-incoming-response"></div>
    <div class="card-datatable table-responsive">
        <table class="datatables-infaq-incoming table border-top" aria-describedby="datatables-infaq">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Infaq</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('scriptJS')
<!-- Vendors JS -->
<script src="{{ asset('admin/vendor/libs/moment/moment.js')}}"></script>
<script src="{{ asset('admin/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('admin/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{ asset('admin/vendor/libs/datatables-responsive/datatables.responsive.js')}}"></script>
<script src="{{ asset('admin/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')}}"></script>
<script src="{{ asset('admin/vendor/libs/datatables-buttons/datatables-buttons.js')}}"></script>
<script src="{{ asset('admin/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js')}}"></script>
<script src="{{ asset('admin/vendor/libs/jszip/jszip.js')}}"></script>
<script src="{{ asset('admin/vendor/libs/pdfmake/pdfmake.js')}}"></script>
<script src="{{ asset('admin/vendor/libs/datatables-buttons/buttons.html5.js')}}"></script>
<script src="{{ asset('admin/vendor/libs/datatables-buttons/buttons.print.js')}}"></script>
<script src="{{ asset('admin/vendor/libs/select2/select2.js')}}"></script>
<script src="{{ asset('admin/vendor/js/formatted-numbers.js')}}"></script>
<script src="{{ asset('admin/vendor/js/natural.js')}}"></script>
<script src="{{ asset('admin/js/page/infaq-incoming.js') }}"></script>
@endsection