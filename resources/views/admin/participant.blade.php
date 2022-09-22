@extends('admin.layouts.app')

@section('spesificScript')
<link rel="stylesheet" href="{{asset('admin/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('admin/vendor/libs/datatables-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('admin/vendor/libs/datatables-bs5/buttons.bootstrap5.css')}}" />
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Pendaftar /</span> Daftar
</h4>

<div class="card">
    <div class="table-responsive mb-3">
        <table class="table datatable-participant border-top">
            <thead>
                <tr>
                    <th style="display: none;"></th>
                    <th>#ID</th>
                    <th>Peserta</th>
                    <th>Kontak</th>
                    <th>Umur</th>
                    <th>Pekerjaan</th>
                    <th>Kemampuan</th>
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
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('admin/vendor/js/natural.js')}}"></script>
<script src="{{ asset('admin/js/page/participant.js') }}"></script>
@endsection