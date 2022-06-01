@section('seoTitle', $seoTitle . ' fylke')
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
                            <h5 class="text-primary">{{ $title }} fylke</h5>
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
            </x-card>
        </div>
        <div class="col-lg-4 col-xxl-3 ps-lg-2">
            <x-card>
                <div class="card-header bg-light d-flex justify-content-between">
                    <h5 class="mb-0">Kommuner i {{ $place->title }}</h5>
                </div>
                <ul class="list-group list-group-flush fs--1">
                    @forelse ($places as $place)
                        <a href="/kommune/{{ $place->slug }}" class="list-group-item">{{ $place->title }}</a>
                    @empty
                        <li class="list-group-item">Ingen områder</li>
                    @endforelse
                </ul>
            </x-card>
        </div>
    </div>
</x-layout>
