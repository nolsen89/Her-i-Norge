@section('seoTitle', $seoTitle)
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
                    <h5 class="text-primary">{{ $post->title }}</h5>
                    <p class="mb-0 fs--2 text-500">Publishert: {{ $post->created_at->diffForHumans() }} | Forfatter: <a
                            href="/users/{{ $post->user->id }}">{{ $post->user->username }}</a> | Kategori: <a
                            href="/categories/{{ $post->category->id }}">{{ $post->category->title }}</a> | sett: 0 gange
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-0">
        <div class=" col-xxl-8">
            <div class="card mb-3">
                <div class="card-body fs--1">
                    @if ($post->image)
                        <div class="thumbnail float-start">
                            <img class="rounded" src="{{ asset('storage/app/public/' . $post->image) }}"
                                alt="Card image cap" />
                        </div>
                    @endif
                    <p class="card-text">{!! $post->body !!}</p>
                </div>
                <div class="card-footer bg-light pt-0">
                    <div class="border-bottom border-200 fs--1 py-3"><span class="text-700">0 Likes</span> • <span
                            class="text-700">{{ $post->comments->count() }} kommentarer</span></div>
                    @if (auth()->check())
                        <div class="row g-0 fw-semi-bold text-center py-2 fs--1">
                            <div class="col-auto"><a class="rounded-2 d-flex align-items-center me-3"
                                    href="#!"><img src="../public/assets/img/icons/spot-illustrations/like-active.png"
                                        width="20" alt=""><span class="ms-1">Liker</span></a></div>
                            <div class="col-auto d-flex align-items-center"><a
                                    class="rounded-2 text-700 d-flex align-items-center" href="#!"><img
                                        src="../public/assets/img/icons/spot-illustrations/share-inactive.png"
                                        width="20" alt=""><span class="ms-1">Del</span></a></div>
                        </div>
                        <form method="POST" action="{{ route('comment.add') }}"
                            class="d-flex align-items-center border-top border-200 pt-3">
                            @csrf
                            <input type="hidden" name="csrf_test_name" value="f4f1c48973ee4a7ebe74708508e76735">
                            <div class="avatar avatar-xl">
                                <img class="rounded-circle" src="../public/assets/img/team/3.jpg" alt="">
                            </div><input class="form-control rounded-pill ms-2 fs--1" type="text" name="body"
                                placeholder="Skriv en kommentar..." value="{{ old('body') }}">
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </form>
                    @endif
                    @include('partials._comment_replies', [
                        'comments' => $post->comments,
                        'post_id' => $post->id,
                    ])
                </div>
            </div>
        </div>
    </div>
</x-layout>
