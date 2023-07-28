@extends('pages.doctor')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Daftar Diagnosa {{$diagnosaResults[0]->patient->name}}</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            @foreach ($diagnosaResults as $diagnosaResult)
                <div class="row">
                    <div class="col">
                        <a href="/doctor/pasien/{{$diagnosaResult->diagnosa_result_id}}/detail-diagnosa">
                        <div class="card">
                            <div class="card-body" style="padding: 0px 20px 0px 20px">
                                <div class="row pt-3 my-auto">
                                    <div class="col">
                                        <p class="fw-bold">{{$diagnosaResult->disease->name}}</p>
                                    </div>
                                    <div class="col">
                                        <span class="fw-light fst-italic float-end">{{$diagnosaResult->date}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </section>

    </main><!-- End #main -->
@endsection
