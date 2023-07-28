@extends('pages.doctor')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Hasil Diagnosa {{ $result->patient->name }}</h1>
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

        <div class="modal fade" id="suggestionModal" tabindex="-1" aria-labelledby="suggestionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="suggestionModalLabel">Saran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/doctor/suggest" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="col-12 mb-3">
                                <label class="form-label">Saran</label>
                                <div class="input-group has-validation">
                                    <input type="hidden" name="id" value="{{$result->diagnosa_result_id}}">
                                    <textarea type="text" name="suggest_doctor" rows="5" class="form-control" id="suggest_doctor" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Beri Saran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main><!-- End #main -->
@endsection
