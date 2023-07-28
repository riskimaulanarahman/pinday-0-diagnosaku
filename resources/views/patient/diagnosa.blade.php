@extends('pages.patient')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Diagnosa</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body pt-3">

                            @if (session('failed'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('failed') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="/patient/diagnosa" method="POST">
                                @csrf
                                @foreach ($diagnosaQuestions as $diagnosaQuestion)
                                <div class="col-12 mb-3">
                                    <label class="form-label">{{$diagnosaQuestion->question}}</label>
                                    <div class="row">
                                        <div class="col">
                                                <input class="form-check-input" type="radio" name="question_{{$diagnosaQuestion->diagnosa_question_id}}"
                                                    id="question_{{$diagnosaQuestion->diagnosa_question_id}}1" value="1" required>
                                                <label class="form-check-label me-4" for="question_{{$diagnosaQuestion->diagnosa_question_id}}1">
                                                    Ya
                                                </label>
                                                <input class="form-check-input" value="0" type="radio" name="question_{{$diagnosaQuestion->diagnosa_question_id}}"
                                                    id="question_{{$diagnosaQuestion->diagnosa_question_id}}2">
                                                <label class="form-check-label" for="question_{{$diagnosaQuestion->diagnosa_question_id}}2">
                                                    Tidak
                                                </label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <div class="col-12 mb-3">
                                    <button class="btn btn-primary w-100" type="submit">Diagnosa</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
