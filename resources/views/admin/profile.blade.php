@extends('admin.layouts.app')

@section('spesificScript')
<link rel="stylesheet" href="{{ asset('admin/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/vendor/libs/formvalidation/formValidation.min.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('admin/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Profil</span>
</h4>
<div class="card mb-4">
    <h5 class="card-header">Detail Profil</h5>
    <form id="formAccountSettings" method="POST" onsubmit="return false" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" data-select2-id="formAccountSettings" enctype="multipart/form-data">
        <!-- Account -->
        <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="{{asset('storage/'.$profile->photo)}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Unggah Foto Baru</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input type="file" id="upload" name="photo" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                    </label>
                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>

                    <p class="text-muted mb-0">Diizinkan JPG, GIF atau PNG. Ukuran maksimal 800kb</p>
                </div>
            </div>
            <div class="image-response mt-2"></div>
        </div>
        <hr class="my-0">
        <div class="card-body" data-select2-id="13">
            <div class="row" data-select2-id="12">
                <div class="mb-3 col-md-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                    <label for="username" class="form-label">Username</label>
                    <input class="form-control" type="text" id="username" name="username" data-bs-id="{{ $profile->id }}" value="{{ $profile->username }}" autofocus="">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="mb-3 col-md-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $profile->name }}">
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" value="{{ $profile->email }}" placeholder="name@example.com">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="phone">Nomer HP</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $profile->phone }}" placeholder="081234567890">
                </div>
            </div>
            <div class="edit-profile-response"></div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2 save-changes-edit-profile">Simpan Perubahan</button>
                <button type="reset" class="btn btn-label-secondary">Batalkan</button>
            </div>
            <div></div><input type="hidden">

        </div>
        <!-- /Account -->
    </form>
</div>

<div class="card mb-4">
    <h5 class="card-header">Ubah Password</h5>
    <div class="card-body">
        <form id="changepassword" method="POST" onsubmit="return false" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
            <div class="row">
                <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                    <label class="form-label" for="currentPassword">Password Sekarang</label>
                    <div class="input-group input-group-merge has-validation">
                        <input class="form-control" type="password" name="currentPassword" id="currentPassword" data-bs-id="{{ $profile->id }}" placeholder="············">
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                    <label class="form-label" for="newpassword">Password Baru</label>
                    <div class="input-group input-group-merge has-validation">
                        <input class="form-control" type="password" id="newpassword" name="newpassword" placeholder="············">
                        <span class=" input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>

                <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                    <label class="form-label" for="newpassword_confirmation">Konfirmasi Password Baru</label>
                    <div class="input-group input-group-merge has-validation">
                        <input class="form-control" type="password" name="newpassword_confirmation" id="newpassword_confirmation" placeholder="············">
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="col-12 mb-4">
                    <p class="fw-semibold mt-2">Syarat Password:</p>
                    <ul class="ps-3 mb-0">
                        <li class="mb-1">
                            Panjang minimal 8 karakter - semakin banyak, semakin baik
                        </li>
                    </ul>
                </div>
                <div class="col-12 change-password-response"></div>
                <div class="col-12 mt-1">
                    <button type="submit" class="btn btn-primary me-2 save-changes-password">Simpan perubahan</button>
                    <button type="reset" class="btn btn-label-secondary">Batalkan</button>
                </div>
            </div>
            <div></div><input type="hidden">
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
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<!-- Page JS -->
<script src="{{ asset('admin/js/pages-account-settings-account.js') }}"></script>
@endsection