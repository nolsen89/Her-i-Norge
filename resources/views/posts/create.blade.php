@section('title', $title)
<x-layout>
    <x-card>
        <div class="card-body">
            <h5 class="card-title">Ny artikkel</h5>
            <form method="POST" action="/posts" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="category_id">
                        Kategori</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option selected="">Velg kategori</option>
                        <option value="0">Off topic</option>
                        @forelse($categories as $category)
                        <option value="{{$category->id}}" @selected(old('category_id') == $category->id)>{{$category->title}}</option>
                        @empty
                        <option value="0">Off topic</option>
                        @endforelse
                    </select>
                    @error('category_id')
                        <p class="text-warning fs--1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="title">
                        Tittel</label>
                    <input class="form-control" id="title" name="title" type="text" placeholder="Artikkel overskrift"
                        value="{{ old('title') }}" />
                    @error('title')
                        <p class="text-warning fs--1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Kort beskrivelse</label>
                    <textarea class="form-control" id="description" name="description" rows="2">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-warning fs--1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="body">Innhold</label>
                    <textarea class="form-control" id="body" name="body" rows="6">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="text-warning fs--1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="image">Bilde</label>
                    <input class="form-control" id="image" name="image" type="file" />
                    @error('image')
                        <p class="text-warning fs--1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tags">
                        Emne tags</label>
                    <input class="form-control" id="tags" name="tags" type="text"
                        placeholder="Emne tags, komma separert" value="{{ old('tags') }}" />
                    @error('tags')
                        <p class="text-warning fs--1">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-falcon-success me-1 mb-1" type="submit">Send</button>
            </form>
        </div>
    </x-card>
</x-layout>
