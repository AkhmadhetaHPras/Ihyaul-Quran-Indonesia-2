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
    <span class="text-muted fw-light">Program / </span>Tambah
</h4>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="addProgramForm" class="row g-3" onsubmit="return false">
                    <div class="col-12">
                        <label class="form-label" for="program_title">Judul Program</label>
                        <input type="text" id="title" name="program_title" class="form-control" placeholder="Judul program" />
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="concept">Konsep/Definisi Program</label>
                        <textarea id="concept" name="concept" class="form-control" rows="2" placeholder="Penjelasan program"></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="superiority">Keunggulan Program</label>
                        <textarea id="superiority" name="superiority" class="form-control" rows="2" placeholder="Keunggulan mengikuti program"></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="requirement">Persyaratan Peserta</label>
                        <textarea id="requirement" name="requirement" class="form-control" rows="2" placeholder="Persyaratan peserta"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
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
@endsection