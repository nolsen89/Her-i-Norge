@section('seoTitle', $seoTitle . ' kommune')
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
                            <h5 class="text-primary">{{ $title }} kommune</h5>
                            <p class="mb-0 fs--2 text-500"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-lg-8 col-xxl-7 ps-lg-2">
            @if (!is_null($place->lat) && !is_null($place->lon))
                <x-weather :place="$place" />
            @endif
            <x-card>
                <div class="card-header d-flex flex-between-center">
                    <h6 class="mb-0">{{ $place->title }} Forum</h6>
                </div>
                <div class="card-body pt-0">
                    @forelse($forums as $forum)
                        <div class="d-flex flex-between-center rounded-3 bg-light p-3 mb-2">
                            <a href="/forums/{{ $place->slug }}/{{ $forum->id }}">
                                <h6 class="mb-0"><svg
                                        class="svg-inline--fa fa-circle fa-w-16 fs--1 me-3 text-primary"
                                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                        </path>
                                    </svg>
                                    {{ $forum->title }}
                                </h6>
                            </a>
                            <p class="fs--2 text-600 text-end mb-0">Tråde: 0<br>Svar: 0</p>
                        </div>
                        @forelse($forum->threads as $thread)
                            {{ $thread->title }}
                        @empty
                            <p class="fs--2 text-600 text-end mb-0">Ingen tråde</p>
                        @endforelse
                    @empty
                        <div class="d-flex flex-between-center rounded-3 bg-light p-3 mb-2">
                            <h6 class="mb-0">
                                Ingen kategorier i dette forum, kom igjen på et annet tidspunkt.
                            </h6>
                        </div>
                    @endforelse
                    @if (auth()->user()->can('create forum'))
                        <form method="POST" action="/categories">
                            @csrf
                            <input type="hidden" name="place_id" value="{{ $place->id }}" />
                            <input type="hidden" name="type" value="2" />
                            <div class="mb-2">
                                <label class="form-label" for="title">Foreslå ny forum kategori</label>
                                <input class="form-control form-control-sm" type="text" placeholder="Forum kategori"
                                    id="title" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <p class="text-warning fs--1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="description">beskrivelse</label>
                                <textarea class="form-control" id="description" name="description" rows="2"
                                    placeholder="Kort beskrivelse av forum kategori">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-warning fs--1">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="btn btn-success btn-sm" type="submit">Send inn</button>
                        </form>
                    @endif
                </div>
            </x-card>
        </div>
        <div class="col-lg-4 col-xxl-3 ps-lg-2">
            <x-card>
                <div class="card-header bg-light d-flex justify-content-between">
                    <h5 class="mb-0">Byer i {{ $place->title }}</h5>
                </div>
                <ul class="list-group list-group-flush fs--1">
                    @forelse ($places as $place)
                        <a href="#" class="list-group-item">{{ $place->title }}</a>
                    @empty
                        <li class="list-group-item">Ingen byer lagt til ennå</li>
                    @endforelse
                </ul>
            </x-card>
            <x-card>
                <div class="card-header d-flex flex-between-center bg-light py-2">
                    <h6 class="mb-0">Bedrifter i {{ $place->title }}</h6>
                </div>
                <div class="card-body py-2">
                    @forelse($companies as $company)
                        <div class="d-flex align-items-center position-relative mb-3">
                            <div class="flex-1 ms-3">
                                <h6 class="mb-0 fw-semi-bold"><a class="stretched-link text-900"
                                        href="/bedrifter/{{ $company->place->slug }}/{{ $company->org_id }}/{{ $company->slug }}">{{ $company->title }}</a></h6>
                            </div>
                        </div>
                    @empty
                        <p class="fs--2 text-600 text-end mb-0">Ingen bedrifter i denne kommune</p>
                    @endforelse
                </div>
            </x-card>
        </div>
    </div>
</x-layout>
