@section('title', $user->username . ' profil')
<x-layout>
  <div class="card mb-3">
    <div class="card-header position-relative min-vh-25 mb-7">
      <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url({{ asset('assets/img/generic/4.jpg')}})"></div>
      <!--/.bg-holder-->
      <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="{{ asset('assets/img/team/2.jpg') }}" width="200" alt=""></div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h4 class="mb-1"> {{ $user->username }}<span data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Verified" aria-label="Verified"><svg class="svg-inline--fa fa-check-circle fa-w-16 text-primary" data-fa-transform="shrink-4 down-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.75, 0.75)  rotate(0 0 0)"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" transform="translate(-256 -256)"></path></g></g></svg><!-- <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small> Font Awesome fontawesome.com --></span></h4>
          <h5 class="fs-0 fw-normal">Senior Software Engineer at Technext Limited</h5>
          <p class="text-500">New York, USA</p><button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button><button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>
          <div class="border-dashed-bottom my-4 d-lg-none"></div>
        </div>
        <div class="col ps-2 ps-lg-3"><a class="d-flex align-items-center mb-2" href="#"><svg class="svg-inline--fa fa-user-circle fa-w-16 fs-3 me-2 text-700" data-fa-transform="grow-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" data-fa-i2svg="" style="transform-origin: 0.484375em 0.5em;"><g transform="translate(248 256)"><g transform="translate(0, 0)  scale(1.125, 1.125)  rotate(0 0 0)"><path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z" transform="translate(-248 -256)"></path></g></g></svg><!-- <span class="fas fa-user-circle fs-3 me-2 text-700" data-fa-transform="grow-2"></span> Font Awesome fontawesome.com -->
            <div class="flex-1">
              <h6 class="mb-0">See followers (330)</h6>
            </div>
          </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="{{ asset('assets/img/logos/g.png') }}" alt="Generic placeholder image" width="30">
            <div class="flex-1">
              <h6 class="mb-0">Google</h6>
            </div>
          </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="{{ asset('assets/img/logos/apple.png') }}" alt="Generic placeholder image" width="30">
            <div class="flex-1">
              <h6 class="mb-0">Apple</h6>
            </div>
          </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="{{ asset('assets/img/logos/hp.png') }}" alt="Generic placeholder image" width="30">
            <div class="flex-1">
              <h6 class="mb-0">Hewlett Packard</h6>
            </div>
          </a></div>
      </div>
    </div>
  </div>
    <div class="row g-3 mb-3">
        <div class="col-xxl-10 col-lg-12">
        </div>
    </div>
    <div class="row g-3">
        <div class="col-lg-8 col-xxl-6 ps-lg-2">
        </div>
        <div class="col-lg-4 ps-lg-2">
        </div>
    </div>
</x-layout>
