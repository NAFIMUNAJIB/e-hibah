@extends('public.layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="card h-100">
            <div class="card-body">
                <table class="table table-striped table-borderless">
                    <thead class="th-dark">
                        <tr>
                            <th>Nama Badan / Lembaga / Organisasi Kemasyarakatan</th>
                            <th>Alamat</th>
                            <th>Usulan Peruntukan</th>
                            <th>Tanggal Proposal</th>
                            <th>Tahapan</th>
                            <th>Nilai Proposal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $val)
                            <tr>
                                <td>{{ $val->nama_organisasi }}</td>
                                <td>{{ $val->alamat_organisasi }}</td>
                                <td>{{ $val->peruntukan }}</td>
                                <td>{{ $val->tanggal_pengajuan }}</td>
                                <td>{{ $val->tahapan }}</td>
                                <td style="text-align: right">{{ idrFormat($val->nilai) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    No Data Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="float-end">
                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </div><!-- /.container -->
@endsection
