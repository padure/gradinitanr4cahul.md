<div class="container-xxl py-5 page-header bg-header position-relative mb-5">
    <div class="container py-5">
        <h1 class="display-2 text-white animated slideInDown mb-4">{{$data}}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Acasa</a></li>
                @if ($event??false)
                    <li class="breadcrumb-item text-white active" aria-current="page">
                        <a href="{{ route('event.index') }}">Evenimente</a>
                    </li>
                @endif
                <li class="breadcrumb-item text-white active" aria-current="page">
                    {{ $data }}
                </li>
            </ol>
        </nav>
    </div>
</div>