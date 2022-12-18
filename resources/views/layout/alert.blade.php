@if (Session::has('success'))
    <div class="position-fixed tw-z-[10000] alert alert-success alert-dismissible fade show tw-top-2 tw-right-2" role="alert">
        <strong>{{ session('success')}} </strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('error'))
    <div class="position-fixed tw-z-[10000] alert alert-danger alert-dismissible fade show tw-top-2 tw-right-2" role="alert">
        <strong> {{ session('error')}} </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
