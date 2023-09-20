<div class="bg-light rounded-circle d-flex justify-content-center align-items-center border " style="width: 125px; height: 125px;">
    <svg data-src="/assets/img/dashboard-profile/user.svg" width="50px" height="50px"></svg>
</div>
<div class="mt-3">
    <h6 class="fw-bold">{{ Auth::user()->nama }}</h6>
    <p>{{ Auth::user()->email }}</p>
</div>
 
<div class="mb-4 mt-5 p-1"><a href="#" class="text-secondary"><svg data-src="/assets/img/dashboard-profile/dashboard.svg" class="me-2" width="20" height="20" fill="#828282"></svg>Dashboard</a></div>
<div class="mb-4 active p-1"><a href="{{ route('dashboard.profile.index') }}" class="text-secondary"><svg data-src="/assets/img/dashboard-profile/user.svg" class="me-2" width="20" height="20"></svg>Profile</a></div>
<div class="mb-4 p-1"><a href="#" class="text-secondary"><img src="/assets/img/dashboard-profile/voucher.svg" width="20" height="20" class="me-2">Voucher</a></div>
{{-- <div class="mb-4 p-1"><a href="#" class="text-secondary"><svg data-src="/assets/img/dashboard-profile/courses.svg" width="20" height="20" fill="#828282" class="me-2"></svg>My Courses</a></div> --}}
<div class="mb-4 p-1"><a href="#" class="text-secondary"><svg data-src="/assets/img/dashboard-profile/e-book.svg" width="20" height="20" fill="#828282" class="me-2"></svg>My E-Book</a></div>
<div class="mb-4 p-1"><a href="#" class="text-secondary"><img src="/assets/img/dashboard-profile/transaction.svg" alt="" width="20" height="20" fill="#828282" class="me-2">Rekap Transaksi</a></div>