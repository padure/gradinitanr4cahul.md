<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Grupele noastre</h1>
            <p>Descoperă diversitatea și adaptabilitatea grupei noastre, unde fiecare copil găsește un mediu sigur și stimulant pentru a crește și a învăța într-un ritm potrivit nevoilor și curiozităților sale.</p>
        </div>
        <div class="row g-4">
            @foreach ($groups as $group)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="classes-item">
                        <div class="bg-light rounded-circle w-75 mx-auto p-3">
                            <img class="img-fluid rounded-circle" src="{{ asset(env('UPLOADS_GROUP').$group->img) }}" alt="{{ $group->img }}">
                        </div>
                        <div class="bg-light rounded p-4 pt-5 mt-n5">
                            <a class="d-block text-center h3 mt-3 mb-4" href="">{{ $group->nume }}</a>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="d-flex align-items-center">
                                    @if ($group->avatar !== null)
                                        <img class="rounded-circle flex-shrink-0" src="{{ asset(env('UPLOADS_GROUP').$group->avatar) }}" alt="" style="width: 45px; height: 45px;">
                                    @endif
                                    <div class="ms-3">
                                        <h6 class="text-primary mb-1">{{ $group->educator }}</h6>
                                        <small>{{ $group->functie }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col-4">
                                    <div class="border-top border-3 border-primary pt-2">
                                        <h6 class="text-primary mb-1">Vârsta:</h6>
                                        <small>{{ $group->varsta }} Ani</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="border-top border-3 border-success pt-2">
                                        <h6 class="text-success mb-1">Ora:</h6>
                                        <small>{{ $group->ora }}</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="border-top border-3 border-warning pt-2">
                                        <h6 class="text-warning mb-1">Capacitate:</h6>
                                        <small>{{ $group->capacitate }} Copii</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>