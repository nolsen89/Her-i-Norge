@section('title', $title)
<x-layout>
    <div class="row g-3 mb-3">
        <div class="col-xxl-10 col-lg-12">
            <div class="card h-100">
                <div class="bg-holder bg-card"
                    style="background-image:url(../public/assets/img/icons/spot-illustrations/corner-3.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-header z-index-1 d-flex flex-between-center">
                    <div>
                        <h5 class="text-primary">{{ $title }} </h5>
                        <h6 class="text-600">Trykk på en artikkel for at endre den </h6>
                    </div>
                    <a href="/posts/create" class="btn btn-primary btn-sm">Ny artikkel</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-lg-8 col-xxl-6 ps-lg-2">

            <x-card>
                <div class="card-header bg-light d-flex justify-content-between">
                    <h5 class="mb-0">Nyeste</h5>
                </div>
                <div class="card-body fs--1 p-0">
                    @forelse ($posts as $post)
                        <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300"
                            href="/posts/{{ $post->id }}/edit">
                            <div class="notification-avatar">
                                <div class="avatar avatar-xl me-3">
                                    <div class="avatar-emoji rounded-circle ">
                                    </div>
                                </div>
                            </div>
                            <div class="notification-body">
                                <p class="mb-1">

                                    <strong>{{ $post->title }}</strong>
                                </p>
                                <span class="notification-time">
                                    <span class="me-2" role="img"
                                        aria-label="Emoji">{{ $post->icon }}</span>
                                    {{ $post->created_at }}

                                </span>
                            </div>
                        </a>
                    @empty

                        <p>Ingen artikler funnet</p>
                    @endforelse
                </div>
            </x-card>
        </div>
        <div class="col-lg-4 col-xxl-3 ps-lg-2">
            <x-card>
                <div class="card-header bg-light d-flex justify-content-between">
                    <h5 class="mb-0">Kategorier</h5>
                </div>
                <x-category-list :categories="$categories" />
            </x-card>
        </div>
    </div>
</x-layout>
