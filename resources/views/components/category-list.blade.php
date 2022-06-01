@props(['categories'])
<ul class="list-group list-group-flush fs--1">
    @forelse ($categories as $category)
        <a href="/categories/{{ $category->id }}" class="list-group-item">{{ $category->title }}</a>
    @empty
        <li class="list-group-item">Ingen kategorier</li>
    @endforelse
</ul>
