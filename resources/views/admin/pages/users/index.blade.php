@extends('admin.layouts.app')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 100vh">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
            <a href="{{ route('admin.users.create') }}">
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Dibuat Pada</th>
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
                    url: '{{ route('admin.users.datatable') }}',
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
                    data: 'name',
                    name: 'name',
                }, {
                    data: 'email',
                    name: 'email',
                }, {
                    data: 'created_at',
                    name: 'created_at',
                }],
            });

            // Handle clicking on the "Delete" button
            $('#table tbody').on('click', '.delete', function() {
                var row = dataTable.row($(this).closest('tr'));
                var id = row.data().id;

                swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this data!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f36c21',
                    // cancelButtonColor: '#efefef',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: '{{ route('admin.users.destroy', '__id') }}'
                                .replace('__id', id),
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            method: 'DELETE',
                            success: function(response) {
                                dataTable.row(row).remove().draw(false);
                                swal.fire('Deleted!', 'The Data has been deleted.',
                                    'success');
                            },
                            error: function() {
                                swal.fire('Oops!', 'Something went wrong.', 'error');
                            }
                        });
                    }
                });
            });
        }
    </script>
@endpush
