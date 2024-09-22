@extends('admin.layouts.app')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 100vh">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
            <div class="float-end">
                <a href="{{ route('admin.users.index') }}" style="text-decoration: none">
                    <b>Users</b>
                </a>
                > Edit
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @if ($errors->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mt-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <form method="POST" action="{{ route('admin.users.update', $row) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">
                            <b class="float-end">
                                Name
                            </b>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input required name="name" id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $row->name) }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">
                            <b class="float-end">
                                Email
                            </b>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input required name="email" id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $row->email) }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">
                            <b class="float-end">
                                Password
                            </b>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input name="password" id="password" type="password"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('password') }}">
                            <div id="passwordHelo" class="form-text">
                                <b>
                                    Biarkan kosong jika Anda tidak ingin mengubahnya
                                </b>
                                <br>
                                Minimal 8 karakter. Harus berisi huruf besar, huruf
                                kecil, angka, dan karakter khusus
                            </div>

                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-5">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
