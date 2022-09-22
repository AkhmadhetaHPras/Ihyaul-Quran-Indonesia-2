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
    <span class="text-muted fw-light">Program / Daftar/ </span>Detail
</h4>
<div class="row">
    <!-- User Sidebar -->
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
        <!-- User Card -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="user-avatar-section">
                    <div class=" d-flex align-items-center flex-column">
                        <img class="img-fluid rounded my-4" src="{{ asset('img/logo/customlogo.png') }}" height="110" width="110" alt="User avatar" />
                        <div class="user-info text-center program-detail">
                            <h4 class="mb-2">{{ $program->title }}</h4>
                            @if($program->status == 'Dibuka')
                            <span class="badge bg-label-success">{{ $program->status }}</span>
                            @else
                            <span class="badge bg-label-danger">{{ $program->status }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-around flex-wrap my-4 py-3">
                    <div class="d-flex align-items-start me-4 mt-3 gap-3">
                        <span class="badge bg-label-primary p-2 rounded"><i class='bx bx-check bx-sm'></i></span>
                        <div>
                            <h5 class="mb-0">{{ $program->response->count() }}</h5>
                            <span>Responden</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mt-3 gap-3">
                        <span class="badge bg-label-primary p-2 rounded"><i class='bx bx-customize bx-sm'></i></span>
                        <div>
                            <h5 class="batch-total mb-0">{{ $program->batch->last()->batch }}</h5>
                            <span>Batch</span>
                        </div>
                    </div>
                </div>
                <div class="info-container">
                    <div class="d-flex justify-content-center pt-3">
                        <a href="javascript:void(0);" class="btn btn-primary" data-bs-target="#editProgram" data-bs-toggle="modal">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Batch table -->
        <div class="card mb-4">
            <div class="table-responsive mb-3">
                <table class="table datatable-batch border-top">
                    <thead>
                        <tr>
                            <th>Batch</th>
                            <th>Tanggal Tutup</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- /Batch table -->
        <!-- /User Card -->
    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
        <!-- Program Detail Timeline -->
        <div class="card mb-4 detail-program">
            <div class="card-header align-items-center">
                <h5 class="card-action-title mb-0">Detail Program</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <dl class="row mb-0">
                            <dt class="col-sm-3 fw-semibold mb-3">Konsep:</dt>
                            <dd class="col-sm-9 mb-3">{{ $program->concept }}</dd>

                            <div class="border-bottom mb-2"></div>

                            <dt class="col-sm-3 fw-semibold mb-3">Persyaratan:</dt>
                            <dd class="col-sm-9">{!! $program->requirement !!}</dd>

                            <div class="border-bottom mb-2"></div>

                            <dt class="col-sm-3 fw-semibold mb-3">Keunggulan:</dt>
                            <dd class="col-sm-9">{!! $program->superiority !!}</dd>

                            <div class="border-bottom mb-2"></div>

                            <dt class="col-sm-3 fw-semibold mb-3">Pelaksanaan:</dt>
                            <dd class="col-sm-9">{!! $program->program_implementation !!}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Program Detail Timeline -->
    </div>
    <!--/ User Content -->


    <div class="col-sm-12 col-xl-4 order-1 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Bacaan Al-Quran</span>
                        <div class="d-flex align-items-end mt-2">
                            <small class="text-dark">A1</small>
                        </div>
                        <small>Bisa membaca Al Quran dengan benar dan lancar (Makhorijul Huruf, Panjang Pendek, Tajwid)?</small>
                        <div class="d-flex align-items-end mt-2">
                            <small class="text-dark">A2</small>
                        </div>
                        <small>Bila belum benar dan lancar, apakah bersedia belajar tahsin dasar terlebih dahulu?</small>
                    </div>
                    <span class="badge bg-label-primary rounded p-2">
                        <span class="bx-sm">A</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-xl-4 order-1 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Hafalan Al-Quran</span>
                        <div class="d-flex align-items-end mt-2">
                            <small class="text-dark">B1</small>
                        </div>
                        <small>Sudah pernah menghafal Juz 30 dengan mutqin?</small>
                        <div class="d-flex align-items-end mt-2">
                            <small class="text-dark">B2</small>
                        </div>
                        <small>Maukah mengivestasikan ilmu dan waktunya untuk mengajarkan kepada orang yang belum hafal juz 30 melalui program AMMA?</small>
                    </div>
                    <span class="badge bg-label-danger rounded p-2">
                        <span class="bx-sm">B</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-xl-4 order-1 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Komitmen</span>
                        <div class="d-flex align-items-end mt-2">
                            <small class="text-dark">C1</small>
                        </div>
                        <small>Berkomitmen mengikuti kelas AMMA secara?</small>
                        <div class="d-flex align-items-end mt-2">
                            <small class="text-dark">C2</small>
                        </div>
                        <small>Jika offline, mana lokasi yang diingkan?</small>
                        <div class="d-flex align-items-end mt-2">
                            <small class="text-dark">C3</small>
                        </div>
                        <small>Jadwal kelas AMMA online intensif senin-kamis</small>
                    </div>
                    <span class="badge bg-label-success rounded p-2">
                        <span class="bx-sm">C</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 order-1">
        <div class="card mb-4">
            <div class="card-header align-items-center bg-primary ">
                <h5 class="card-action-title mb-0 text-white">Filter Responden</h5>
                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                    <div class="col-md-3 response_a1"></div>
                    <div class="col-md-3 response_a2"></div>
                    <div class="col-md-3 response_b1"></div>
                    <div class="col-md-3 response_b2"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center row gap-3 gap-md-0">
                    <div class="col-md-3 response_gender"></div>
                    <div class="col-md-3 response_c1"></div>
                    <div class="col-md-3 response_c2"></div>
                    <div class="col-md-3 response_c3"></div>
                </div>
            </div>
            <div class="table-responsive mb-3">
                <table class="table datatable-responden border-top">
                    <thead>
                        <tr>
                            <th style="display: none;"></th>
                            <th>#ID</th>
                            <th>Peserta</th>
                            <th>Kontak</th>
                            <th>Umur</th>
                            <th>Infaq</th>
                            <th>Batch</th>
                            <th><span data-bs-toggle="tooltip" data-bs-html="true" title="" data-bs-original-title="<span>Bisa membaca Al Quran dengan benar dan lancar (Makhorijul Huruf, Panjang Pendek, Tajwid)?</span>">A1</span></th>
                            <th><span data-bs-toggle="tooltip" data-bs-html="true" title="" data-bs-original-title="<span>Bila belum benar dan lancar, apakah bersedia belajar tahsin dasar terlebih dahulu?</span>">A2</span></th>
                            <th><span data-bs-toggle="tooltip" data-bs-html="true" title="" data-bs-original-title="<span>Sudah pernah menghafal Juz 30 dengan mutqin?</span>">B1</span></th>
                            <th><span data-bs-toggle="tooltip" data-bs-html="true" title="" data-bs-original-title="<span>Maukah mengivestasikan ilmu dan waktunya untuk mengajarkan kepada orang yang belum hafal juz 30 melalui program AMMA??</span>">B2</span></th>
                            <th><span data-bs-toggle="tooltip" data-bs-html="true" title="" data-bs-original-title="<span>Berkomitmen mengikuti kelas AMMA secara?</span>">C1</span></th>
                            <th><span data-bs-toggle="tooltip" data-bs-html="true" title="" data-bs-original-title="<span>Jika offline, mana lokasi yang diingkan?</span>">C2</span></th>
                            <th><span data-bs-toggle="tooltip" data-bs-html="true" title="" data-bs-original-title="<span>Jadwal kelas AMMA online intensif senin-kamis</span>">C3</span></th>
                        </tr>
                    </thead>
                </table>

                <!-- offcanvas new batch -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Batch Baru</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body mx-0 flex-grow-0">
                        <form class="add-new-user pt-0" id="addNewBatch" onsubmit="return false">
                            <div class="mb-3">
                                <label class="form-label" for="closed_date">Tanggal Tutup</label>
                                <input type="date" class="form-control" id="closed_date" data-bs-program="{{ $program->id }}" name="closed_date" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" />
                            </div>
                            <div class="mb-3 new-batch-response" id="new-batch-response">

                            </div>
                            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit submit-new-batch">Simpan</button>
                            <button type="reset" class="btn btn-label-secondary btn-cancel-new-batch" data-bs-dismiss="offcanvas">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Edit User Modal -->
<div class="modal fade" id="editProgram" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3>Edit Deskripsi Program</h3>
                    <p>Mengubah data program akan mengubah data pada landing page</p>
                </div>
                <form id="editProgramForm" class="row g-3" onsubmit="return false">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="title">Judul Program</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ $program->title }}" />
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="status">Status</label>
                        <select id="status" name="status" class="form-select" aria-label="Default select example">
                            <option value="">Status</option>
                            <option value="Dibuka" {{ $program->status == 'Dibuka' ? 'selected' : ''  }}>Dibuka</option>
                            <option value="Ditutup" {{ $program->status == 'Ditutup' ? 'selected' : ''  }}>Ditutup</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="concept">Konsep/Definisi Program</label>
                        <textarea id="concept" name="concept" class="form-control" rows="2" placeholder="Penjelasan program">{{ $program->concept }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="superiority">Keunggulan Program</label>
                        <textarea id="superiority" name="superiority" class="form-control" rows="2" placeholder="Keunggulan mengikuti program">{{ $program->superiority }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="requirement">Persyaratan Peserta</label>
                        <textarea id="requirement" name="requirement" class="form-control" rows="2" placeholder="Persyaratan peserta">{{ $program->requirement }}</textarea>
                    </div>
                    <div class="col-12 edit-program-response"></div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 submit-edit-program" data-bs-idprogram="{{ $program->id }}">Submit</button>
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
<script src="{{ asset('admin/vendor/js/formatted-numbers.js')}}"></script>
<script src="{{ asset('admin/vendor/js/natural.js')}}"></script>
<script src="{{ asset('admin/js/page/program-detail.js') }}"></script>
@endsection