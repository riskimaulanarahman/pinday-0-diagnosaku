@extends('pages.doctor')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Informasi Penyakit Hepatitis</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                @foreach ($diseases as $disease)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                {{ $disease->name }}
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{$disease->image}}" width="400" class="img-fluid">
                                    <br>
                                </div>
                                <hr>
                                {!! $disease->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </main><!-- End #main -->
@endsection
