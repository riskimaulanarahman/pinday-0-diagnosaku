@extends('pages.doctor')

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Daftar Pasien</h1>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $patient)
                                            <tr>
                                                <td>{{ $patient->name }}</td>
                                                <td>{{ $patient->user->email }}</td>
                                                @if ($patient->gender == 'L')
                                                    <td>Laki - Laki</td>
                                                @else
                                                    <td>Perempuan</td>
                                                @endif
                                                <td>{{ $patient->address }}</td>
                                                <td>
                                                    <a href="/doctor/pasien/{{ $patient->patient_id }}/daftar-diagnosa">
                                                        <button class="btn btn-info">
                                                            <i class="bi bi-eye text-white"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
