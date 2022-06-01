<x-layout>
    <x-card>
        <div class="card-body">
            <h5 class="card-title">Endre artikkel</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $post->title }}</h6>
            <form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="title">
                        Tittel</label>
                    <input class="form-control" id="title" name="title" type="text" placeholder="Artikkel overskrift"
                        value="{{ $post->title }}" />
                    @error('title')
                        <p class="text-warning fs--1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Kort beskrivelse</label>
                    <textarea class="form-control" id="description" name="description" rows="2">{{ $post->description }}</textarea>
                    @error('description')
                        <p class="text-warning fs--1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="body">Innhold</label>
                    <textarea class="tinymce d-none" id="body" name="body" rows="6">{{ $post->body }}</textarea>
                    @error('body')
                        <p class="text-warning fs--1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 row">
                    <div class="col-lg-8">
                        <label class="form-label" for="image">Bilde</label>
                        <input class="form-control" id="image" name="image" type="file" />
                        @error('image')
                            <p class="text-warning fs--1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-lg-4 thumbnail float-end">
                        <img class="rounded" src="{{ asset('storage/app/public/' . $post->image) }}"
                            alt="Card image cap" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tags">
                        Emne tags</label>
                    <input class="form-control" id="tags" name="tags" type="text"
                        placeholder="Emne tags, komma separert" value="{{ $post->tags }}" />
                    @error('tags')
                        <p class="text-warning fs--1">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-falcon-success me-1 mb-1" type="submit">Oppdater</button>
            </form>
            <form method="POST" action="/posts/{{ $post->id }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger float-end" type="submit">Delete</button>
            </form>
        </div>
    </x-card>
    <script src="{{ asset('/public/vendors/tinymce/tinymce.min.js') }}"></script>
</x-layout>
