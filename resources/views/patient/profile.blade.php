@extends('pages.patient')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profil Saya</h1>
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
                            
                            <form action="/patient/profil" method="POST">
                                @csrf
                                <div class="col-12 mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="name" value="{{$patient->name}}" class="form-control" id="name" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" id="email" required>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <div class="input-group has-validation">
                                        <select name="gender" id="gender" class="form-control">
                                            @if($patient->gender == 'L')
                                            <option value="L" selected>Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                            @else
                                            <option value="L" selected>Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Alamat</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="address" value="{{$patient->address}}" class="form-control" id="address" required>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    <span class="text-muted">Isi Jika hanya ingin mengubah password</span>
                                </div>

                                <div class="col-12 mb-3">
                                    <button class="btn btn-primary w-100" type="submit">Ubah Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
