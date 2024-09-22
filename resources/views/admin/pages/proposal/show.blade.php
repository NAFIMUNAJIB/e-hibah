@extends('admin.layouts.app')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 100vh">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Proposal</h1>
            <div class="float-end">
                <a href="{{ route('admin.proposal.index') }}" style="text-decoration: none">
                    <b>Proposal</b>
                </a>
                > Detail
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-form-label col-12 col-md-3 col-lg-3">
                        <b>
                            Nama Badan / Lembaga / Organisasi
                            Kemasyarakatan
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <label class="col-form-label">: {{ $row->nama_organisasi }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-12 col-md-3 col-lg-3">
                        <b>
                            Usulan Peruntukan
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <label class="col-form-label">: {{ $row->peruntukan }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <b>
                            Alamat
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <label class="col-form-label">: {{ $row->alamat_organisasi }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <b>
                            No Telp
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <label class="col-form-label">: {{ $row->no_telp_organisasi }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <b>
                            Email
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <label class="col-form-label">: {{ $row->email_organisasi }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <b>
                            Tanggal Proposal
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <label class="col-form-label">: {{ $row->tanggal_pengajuan }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <b>
                            Tahapan
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <label class="col-form-label">: {{ $row->tahapan }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <b>
                            Lampiran
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <label class="col-form-label">
                            : <a href="{{ url('storage') . '/' . $row->lampiran }}" target="_BLANK"
                                data-title="{{ basename($row->lampiran) }}">{{ basename($row->lampiran) }}
                            </a>
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <b>
                            Nilai
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <label class="col-form-label">: {{ idrFormat($row->nilai) }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <b>
                            Dibuat Pada
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <label class="col-form-label">: {{ $row->created_at }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <b>
                            Diperbarui Pada
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <label class="col-form-label">: {{ $row->updated_at }}</label>
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        <b>
                            History
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Status oleh</th>
                                    <th>Status pada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($row->proposalMilestone as $proposalMilestone)
                                    <tr>
                                        <td>{{ $proposalMilestone->status }}</td>
                                        <td>{{ $proposalMilestone->status_by }}</td>
                                        <td>{{ $proposalMilestone->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3"></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
