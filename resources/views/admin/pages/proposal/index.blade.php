@extends('admin.layouts.app')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 100vh">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Proposal</h1>
            <a href="{{ route('admin.proposal.create') }}">
                <button class="btn btn-sm btn-primary float-end">Create</button>
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table table-striped table-md">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Diajukan Pada</th>
                                <th>Nama Badan / Lembaga / Organisasi Kemasyarakatan</th>
                                <th>Usulan Peruntukan</th>
                                <th>Tanggal Proposal</th>
                                <th>Tahapan</th>
                                <th>Nilai Proposal</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            loadData();
        });

        const loadData = () => {
            var dataTable = $('#table').DataTable({
                processing: true,
                autoWidth: true, // Automatically adjust column widths
                serverSide: true,
                ajax: {
                    url: '{{ route('admin.proposal.datatable') }}',
                    type: 'GET',
                    data: {},
                },
                pagingType: $(window).width() < 768 ? 'simple' : 'simple_numbers',
                initComplete: function() {
                    // Check the screen width and hide dataTables_length on mobile
                    if ($(window).width() < 768) {
                        $('.dataTables_length').hide();
                    }
                },
                columns: [{
                    data: 'action',
                    name: 'action',
                    orderable: false, // Disable sorting for this column
                    searchable: false, // Disable searching for this column
                }, {
                    data: 'created_at',
                    name: 'created_at',
                }, {
                    data: 'nama_organisasi',
                    name: 'nama_organisasi',
                }, {
                    data: 'peruntukan',
                    name: 'peruntukan',
                }, {
                    data: 'tanggal_pengajuan',
                    name: 'tanggal_pengajuan',
                }, {
                    data: 'tahapan',
                    name: 'tahapan',
                }, {
                    data: 'nilai',
                    name: 'nilai',
                    render: idrFormat, // Memanggil fungsi idrFormat() untuk memformat nilai
                    className: 'text-end', // Mengatur text-align ke right
                }],
            });
        }
    </script>
@endpush
