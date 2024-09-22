@extends('public.layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="card h-100">
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

                <form method="POST" action="{{ route('proposal.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_organisasi" class="form-label">Nama Badan / Lembaga / Organisasi
                            Kemasyarakatan</label>
                        <input name="nama_organisasi" id="nama_organisasi" type="text"
                            class="form-control @error('nama_organisasi') is-invalid @enderror"
                            value="{{ old('nama_organisasi') }}">
                        @error('nama_organisasi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat_organisasi" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat_organisasi') is-invalid @enderror"
                            value="{{ old('alamat_organisasi') }}" name="alamat_organisasi" id="alamat_organisasi">
                        @error('alamat_organisasi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="no_telp_organisasi" class="form-label">No Telp</label>
                        <input type="text" class="form-control @error('no_telp_organisasi') is-invalid @enderror"
                            value="{{ old('no_telp_organisasi') }}" name="no_telp_organisasi" id="no_telp_organisasi">
                        @error('no_telp_organisasi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email_organisasi" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email_organisasi') is-invalid @enderror"
                            value="{{ old('email_organisasi') }}" name="email_organisasi" id="email_organisasi">
                        @error('email_organisasi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="peruntukan" class="form-label">Peruntukan</label>
                        <input type="text" class="form-control @error('peruntukan') is-invalid @enderror"
                            value="{{ old('peruntukan') }}" name="peruntukan" id="peruntukan">
                        @error('peruntukan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="peruntukan" class="form-label">Nilai Proposal</label>
                        <input type="text" class="form-control maskmoney @error('nilai') is-invalid @enderror"
                            value="{{ old('nilai') }}" name="nilai" id="nilai">
                        @error('nilai')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="lampiran" class="form-label">Lampiran</label>
                        <input type="file" class="form-control @error('lampiran') is-invalid @enderror"
                            value="{{ old('lampiran') }}" name="lampiran" id="lampiran" accept=".pdf">
                        @error('lampiran')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div><!-- /.container -->
@endsection
