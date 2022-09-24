@extends('admin.layouts.app')

@section('spesificScript')
<link rel="stylesheet" href="{{asset('admin/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('admin/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('admin/vendor/libs/formvalidation/formValidation.min.css')}}" />
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Admin /</span> Daftar
</h4>

<!-- Invoice List Table -->
<div class="card">
    <div class="admin-response"></div>
    <div class="card-datatable table-responsive">
        <table class="datatables-users table border-top">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Admin</th>
                    <th>Email</th>
                    <th>NO HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Tambah Admin</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="{{asset('storage/img/1.png')}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Unggah Foto Baru</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input type="file" id="upload" name="photo" class="account-file-input" hidden="" accept="image/png, image/jpeg" required>
                    </label>
                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>

                    <p class="text-muted mb-0">Ubah foto profil default tersebut, sebelum menyimpan data</p><br>
                    <p class="text-muted mb-0">Diizinkan JPG, GIF atau PNG. Ukuran maksimal 800kb</p>
                </div>
            </div>
            <div class="image-response mt-2"></div>
            <div class="mb-3">
                <label class="form-label" for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" placeholder="John Doe" name="name" aria-label="John Doe" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="text" id="email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="phone">No HP</label>
                <input type="text" id="phone" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="phone" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input type="text" id="username" class="form-control" placeholder="Username" aria-label="jdoe1" name="username" />
            </div>
            <div class="mb-3">
                <p class="fw-semibold mt-2">Syarat Password:</p>
                <ul class="ps-3 mb-0">
                    <li class="mb-1">
                        Panjang minimal 8 karakter - semakin banyak, semakin baik
                    </li>
                </ul>
            </div>
            <div class="mb-3 form-password-toggle fv-plugins-icon-container">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge has-validation">
                    <input class="form-control" type="password" id="password" name="password" placeholder="············">
                    <span class=" input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>

            <div class="mb-3 form-password-toggle fv-plugins-icon-container">
                <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                <div class="input-group input-group-merge has-validation">
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="············">
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <div class="mb-3 new-admin-response"></div>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </form>
    </div>
</div>
@endsection

@section('scriptJS')
<!-- Vendors JS -->
<script src="{{ asset('admin/vendor/libs/select2/select2.js') }}"></script>
<script src="{{asset('admin/vendor/libs/formvalidation/formValidation.min.js')}}"></script>
<script src="{{asset('admin/vendor/libs/formvalidation/Bootstrap5.min.js')}}"></script>
<script src="{{asset('admin/vendor/libs/formvalidation/AutoFocus.min.js')}}"></script>
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
<script src="{{ asset('admin/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{ asset('admin/vendor/js/natural.js')}}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin/js/page/admin.js') }}"></script>
<script src="{{ asset('admin/js/page/add-new-admin.js') }}"></script>
@endsection