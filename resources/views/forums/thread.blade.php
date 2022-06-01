@section('title', $thread->title ? $thread->title : 'Mangler tittel')
<x-layout>
    @section('style')
        <style>
            .display-comment .display-comment {
                margin-left: 40px
            }

        </style>
    @endsection
    <div class="row g-3 mb-3">
        <div class="col-xxl-10 col-lg-12">
            <div class="card h-100">
                <div class="bg-holder bg-card"
                    style="background-image:url(../public/assets/img/icons/spot-illustrations/corner-3.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-header z-index-1">
                    <h5 class="text-primary">{{ $thread->title }}</h5>
                    <p class="mb-0 fs--2 text-500">Publishert: {{ $thread->created_at->diffForHumans() }} | Forfatter: <a
                            href="/users/{{ $thread->user->id }}">{{ $thread->user->username }}</a> | Kategori: <a
                            href="/forums/{{ $place->slug }}/{{ $thread->category->id }}">{{ $thread->category->title }}</a> | sett: 0 gange
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class=" col-xxl-8">
            <div class="card mb-3">
                <div class="card-body fs--1">
                    <p class="card-text">{!! $thread->description !!}</p>
                </div>
                
            </div>
        </div>
    </div>
</x-layout>
