<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-4">Aflați mai multe despre munca noastră și activitățile noastre culturale.</h1>
                <p>Descoperiți bogăția și diversitatea activităților noastre culturale și aveți ocazia să explorați și să învățați mai multe despre diferitele culturi și tradiții din întreaga lume. De la festivaluri tematice și expoziții interactive, până la ateliere de dans și muzică, oferim copiilor noștri o experiență captivantă și educativă într-un mediu plin de diversitate culturală.</p>
                <p class="mb-4">Vă invităm să vă alăturați nouă și să vă bucurați de o călătorie fascinantă prin artă, muzică, dans și obiceiuri tradiționale</p>
                <div class="row g-4 align-items-center">
                    <div class="col-sm-6">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('event.index') }}">Citește mai mult</a>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <h6 class="text-primary mb-1">{{ $settings->director??"Popescu Ion" }}</h6>
                                <small>Director</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-12 text-center">
                        <img class="img-fluid w-75 rounded-circle bg-light p-3" src="img/about-1.jpg" alt="">
                    </div>
                    <div class="col-6 text-start" style="margin-top: -150px;">
                        <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/about-2.jpg" alt="">
                    </div>
                    <div class="col-6 text-end" style="margin-top: -150px;">
                        <img class="img-fluid w-100 rounded-circle bg-light p-3" src="img/about-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>