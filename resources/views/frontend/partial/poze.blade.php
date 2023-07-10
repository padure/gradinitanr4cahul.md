@if ($lastPhotos->count() > 0)
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="mb-4">Poze recente</h1>
            <div class="bg-light rounded galerie">
                @foreach ($lastPhotos as $foto)
                    <img src="{{ env('UPLOADS_GALLERY') . $foto->image }}" alt="Lipseste">
                @endforeach
            </div>
        </div>
    </div>
@endif