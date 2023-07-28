@extends('pages.doctor')

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Kelola Autentikasi</h1>
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

                            <div class="table-responsive">
                                <table class="table table-striped" id="table">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->patient->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $user->user_id }}"><i
                                                            class="bi bi-pencil"></i></button>
                                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $user->user_id }}"><i
                                                            class="bi bi-trash3"></i></button>
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


    @foreach ($users as $user)
        <div class="modal fade" id="editModal{{ $user->user_id }}" tabindex="-1" aria-labelledby="suggestionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="suggestionModalLabel">Ubah Data Login {{ $user->patient->name }}
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/doctor/autentikasi/update" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="col-12 mb-3">
                                <label class="form-label">Email</label>
                                <input type="hidden" name="id" value="{{ $user->user_id }}">
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                    id="email" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <span class="text-muted">Isi Jika hanya ingin mengubah password</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-warning">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteModal{{ $user->user_id }}" tabindex="-1" aria-labelledby="suggestionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="suggestionModalLabel">Hapus Data Login {{ $user->patient->name }}
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        anda yakin ingin menghapus pasien <b>{{ $user->patient->name }}</b>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a href="/doctor/autentikasi/delete/{{$user->user_id}}" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
