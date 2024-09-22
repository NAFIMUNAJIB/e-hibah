@extends('admin.layouts.app')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 100vh">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Proposal</h1>
            <div class="float-end">
                <a href="{{ route('admin.proposal.index') }}" style="text-decoration: none">
                    <b>Proposal</b>
                </a>
                > Create
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

                <form method="POST" action="{{ route('admin.proposal.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">
                            <b>
                                Nama Badan / Lembaga / Organisasi Kemasyarakatan
                            </b>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input required name="nama_organisasi" id="nama_organisasi" type="text"
                                class="form-control @error('nama_organisasi') is-invalid @enderror"
                                value="{{ old('nama_organisasi') }}">
                            @error('nama_organisasi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">
                            <b>
                                No Telp Organisasi
                            </b>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input required name="no_telp_organisasi" id="no_telp_organisasi" type="number"
                                class="form-control @error('no_telp_organisasi') is-invalid @enderror"
                                value="{{ old('no_telp_organisasi') }}">
                            @error('no_telp_organisasi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">
                            <b>
                                Email
                            </b>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input required name="email_organisasi" id="email_organisasi" type="email"
                                class="form-control @error('email_organisasi') is-invalid @enderror"
                                value="{{ old('email_organisasi') }}">
                            @error('email_organisasi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">
                            <b>
                                Alamat
                            </b>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input required name="alamat_organisasi" id="alamat_organisasi" type="text"
                                class="form-control @error('alamat_organisasi') is-invalid @enderror"
                                value="{{ old('alamat_organisasi') }}">
                            @error('alamat_organisasi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">
                            <b>
                                Usulan Peruntukan
                            </b>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input required name="peruntukan" id="peruntukan" type="text"
                                class="form-control @error('peruntukan') is-invalid @enderror"
                                value="{{ old('peruntukan') }}">
                            @error('peruntukan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">
                            <b>
                                Tanggal Pengajuan
                            </b>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input required name="tanggal_pengajuan" id="tanggal_pengajuan" type="date"
                                class="form-control @error('tanggal_pengajuan') is-invalid @enderror"
                                value="{{ old('tanggal_pengajuan') }}">
                            @error('tanggal_pengajuan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">
                            <b>
                                Nilai Proposal
                            </b>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input required name="nilai" id="nilai" type="text"
                                class="form-control maskmoney @error('nilai') is-invalid @enderror"
                                value="{{ old('nilai') }}">
                            @error('nilai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">
                            <b>
                                Tahapan
                            </b>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <select name="tahapan" id="tahapan" class="form-control">
                                <option value="daftar">Daftar</option>
                                <option value="pengecekan proposal">
                                    Pengecekan Proposal</option>
                                <option value="verifikasi proposal">
                                    Verifikasi Proposal</option>
                                <option value="ditolak">Ditolak</option>
                            </select>
                            @error('tahapan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-12 col-md-3 col-lg-3">
                            <b>
                                Lampiran
                            </b>
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <input name="lampiran" id="lampiran" type="file"
                                class="form-control mt-3 @error('lampiran') is-invalid @enderror"
                                value="{{ old('lampiran') }}" accept=".pdf">
                            @error('lampiran')
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
