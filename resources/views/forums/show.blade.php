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
                            <h5 class="text-primary">{{ $place->title }} forum {{ $forum->title }}</h5>
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
                <div class="card-header d-flex flex-between-center">
                    <h6 class="mb-0">{{ $forum->title }} tråde</h6>
                </div>
                <div class="card-body pt-0">
                    @forelse($threads as $thread)
                        <div class="d-flex flex-between-center rounded-3 bg-light p-3 mb-2">
                            <a href="/forums/{{ $place->slug }}/{{ $forum->id }}/{{ $thread->id }}">
                                <h6 class="mb-0"><svg
                                        class="svg-inline--fa fa-circle fa-w-16 fs--1 me-3 text-primary"
                                        aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle"
                                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                        </path>
                                    </svg>
                                    {{ $thread->title }}
                                </h6>
                            </a>
                            <p class="fs--2 text-600 text-end mb-0">Tråde: 0<br>Svar: 0</p>
                        </div>
                    @empty
                        <div class="d-flex flex-between-center rounded-3 bg-light p-3 mb-2">
                            <h6 class="mb-0">
                                Ingen tråde i dette forum, kom igjen på et annet tidspunkt.
                            </h6>
                        </div>
                    @endforelse
                    
                </div>
            </x-card>
        </div>
        <div class="col-lg-4 col-xxl-3 ps-lg-2">
            <x-card>
                
            </x-card>
        </div>
    </div>
</x-layout>
