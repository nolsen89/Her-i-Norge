<!-- _comment_replies.blade.php -->

@foreach ($comments as $comment)
<div class="d-flex mt-3">
  <div class="avatar avatar-xl">
      <img class="rounded-circle" src="../public/assets/img/team/4.jpg" alt="">
  </div>
  <div class="flex-1 ms-2 fs--1">
      <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold"
              href="/bruker/profil/{{ $comment->user->id }}">{{ $comment->user->username }}</a>: {{ $comment->body }}</p>
      <div class="px-2"><a href="#!">Like</a> • <a href="#!">Reply</a> • {{ $comment->created_at }}
      </div>


        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control form-control-sm rounded-pill ms-2 fs--1" placeholder="Tilføj kommentar" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
        </form>
        @include('partials._comment_replies', ['comments' => $comment->replies])
</div>  </div>
@endforeach
