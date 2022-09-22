@extends('admin.layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-9">
          <div class="card-body">
            <h5 class="card-title text-primary">Hi {{ Auth::user()->name }}! 🎉</h5>
            <p class="mb-4">
              Selamat datang di dashboard admin
            </p>
          </div>
        </div>
        <div class="col-sm-3 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('admin/img/illustrations/man-with-laptop-light.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="col-lg-12 mb-4 order-0">
    <div class="row">
      <div class="col-3 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('admin/img/icons/unicons/product.png')}}" alt="chart success" class="rounded" />
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>

              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Products</span>
            <h3 class="card-title mb-2">12</h3>
            <small class="text-success fw-semibold">total items</small>
          </div>
        </div>
      </div>
      <div class="col-3 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('admin/img/icons/unicons/user.png')}}" alt="Credit Card" class="rounded" />
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
              </div>
            </div>
            <span class="d-block mb-1">Users</span>
            <h3 class="card-title text-nowrap mb-2">12</h3>
            <small class="text-danger fw-semibold"></i>total customers</small>
          </div>
        </div>
      </div>
      <div class="col-3 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('admin/img/icons/unicons/rating.png')}}" alt="Credit Card" class="rounded" />
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
              </div>
            </div>
            <span class="fw-semibold d-block mb-1">Ratings</span>
            <h3 class="card-title mb-2">5</h3>
            <small class="text-warning fw-semibold"></i> average stars</small>
          </div>
        </div>
      </div>
      <div class="col-3 mb-4">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">
              <div class="avatar flex-shrink-0">
                <img src="{{asset('admin/img/icons/unicons/briefcase.png')}}" alt="Credit Card" class="rounded">
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
              </div>
            </div>
            <span class="d-block">Cart</span>
            <h3 class="card-title mb-2">12</h3>
            <small class="text-primary fw-semibold"></i> items in customer cart</small>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between pb-0">
            <div class="card-title mb-0">
              <h5 class="m-0 me-2">Order Statistics</h5>
              <small class="text-muted">Rp. 120.000 Total Sales</small>
            </div>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="d-flex flex-column align-items-center gap-1">
                <h2 class="mb-0 mt-1">12</h2>
                <span>Total Orders</span>
              </div>
            </div>
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-check-square'></i></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Completed</h6>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">12</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-info"><i class='bx bx-send'></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Sent</h6>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">21</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-warning"><i class='bx bx-loader-circle'></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Processed</h6>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">11</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-secondary"><i class='bx bx-time-five'></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Waiting Confirmations</h6>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">22</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-danger"><i class='bx bx-error-alt'></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Cancelled</h6>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">23</small>
                  </div>
                </div>
              </li>
              <li class="d-flex">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-dark"><i class='bx bx-block'></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Rejected</h6>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">112</small>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-8 order-2 mb-4">
        <div class="card h-100">
          <div style="padding-bottom: 1px;" class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">
              <img src="{{asset('admin/img/icons/unicons/winner.png')}}" alt="Oneplus" height="32" width="32">
              Best Products
            </h5>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</div>
@endsection