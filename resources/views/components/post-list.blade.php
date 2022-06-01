@props(['posts'])
<ul class="list-group list-group-flush fs--1">
    @forelse ($posts as $post)
        <a href="/posts/{{ $post->id }}" class="list-group-item">{{ $post->title }}</a>
    @empty
        <li class="list-group-item">Ingen artikler</li>
    @endforelse
</ul>
