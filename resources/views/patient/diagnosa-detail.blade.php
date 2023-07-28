@extends('pages.patient')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Hasil Diagnosa {{$patient->name}}</h1>
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

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        @foreach ($diagnosaQuestions as $diagnosaQuestion)
                                            <th>{{ $diagnosaQuestion->name }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="height: 40px;">
                                        @if ($result->answer_1 == '1')
                                            <td class="table-success"></td>
                                        @else
                                            <td class="table-danger"></td>
                                        @endif
                                        @if ($result->answer_2 == '1')
                                            <td class="table-success"></td>
                                        @else
                                            <td class="table-danger"></td>
                                        @endif
                                        @if ($result->answer_3 == '1')
                                            <td class="table-success"></td>
                                        @else
                                            <td class="table-danger"></td>
                                        @endif
                                        @if ($result->answer_4 == '1')
                                            <td class="table-success"></td>
                                        @else
                                            <td class="table-danger"></td>
                                        @endif
                                        @if ($result->answer_5 == '1')
                                            <td class="table-success"></td>
                                        @else
                                            <td class="table-danger"></td>
                                        @endif
                                        @if ($result->answer_6 == '1')
                                            <td class="table-success"></td>
                                        @else
                                            <td class="table-danger"></td>
                                        @endif
                                        @if ($result->answer_7 == '1')
                                            <td class="table-success"></td>
                                        @else
                                            <td class="table-danger"></td>
                                        @endif
                                        @if ($result->answer_8 == '1')
                                            <td class="table-success"></td>
                                        @else
                                            <td class="table-danger"></td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                            <hr class="mt-1 mb-2">
                            <span class="badge bg-success"> </span> : <span class="me-3">Iya</span>
                            <span class="badge bg-danger"> </span> : Tidak
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body pt-3">
                            <h4>Hasil Diagnosa anda: {{$disease->name}}</h4>
                            <p>{!!$disease->description!!}</p>

                            <hr class="mt-2 mb-2">

                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">
                                    Saran
                                </h4>
                                <p>
                                    {!!$disease->suggestion !!}
                                </p>
                                <hr class="mt-3 mb-3">
                                <h4 class="alert-heading">
                                    Saran dari Dokter
                                </h4>
                                <p>
                                    {{ $result->suggestion_doctor }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
