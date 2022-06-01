@section('seoTitle', $seoTitle)
<x-layout>
    <div class="row g-3 mb-3">
        <div class="col-xxl-10 col-lg-12">
            <div class="card h-100">
                <div class="bg-holder bg-card"
                    style="background-image:url(../public/assets/img/icons/spot-illustrations/corner-3.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-header z-index-1">
                    <div class="row flex-between-center">
                        <div class="col-sm-auto d-flex align-items-center">
                            <h5 class="text-primary">{{ $title }}</h5>
                            <p class="mb-0 fs--2 text-500"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-lg-8 col-xxl-7 ps-lg-2">
            <x-card>
                <div class="card-header d-flex flex-between-center bg-light py-2">
                    <h6 class="mb-0">Nyeste bedrifter</h6>
                </div>
                <div class="card-body py-2">
                    @forelse($companies as $company)
                        <div class="d-flex align-items-center position-relative mb-3">
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900"
                                        href="bedrifter/{{ $company->place->slug }}/{{ $company->org_id }}/{{ Str::of($company->title)->slug('-') }}">{{ $company->title }}</a></h6>
                            </div>
                        </div>
                    @empty
                        <p class="fs--2 text-600 text-end mb-0">Ingen bedrifter i denne kommune</p>
                    @endforelse
                    {{ $companies->links() }}
                </div>
            </x-card>
        </div>
    </div>
</x-layout>