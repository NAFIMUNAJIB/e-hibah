@extends('admin.layouts.app')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="min-height: 100vh">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
            <div class="float-end">
                <a href="{{ route('admin.users.index') }}" style="text-decoration: none">
                    <b>Users</b>
                </a>
                > Detail
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-form-label col-12 col-md-3 col-lg-3">
                        <b>
                            Nama
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <label class="col-form-label">: {{ $row->name }}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-12 col-md-3 col-lg-3">
                        <b>
                            Email
                        </b>
                    </label>
                    <div class="col-sm-12 col-md-7">
                        <label class="col-form-label">: {{ $row->email }}</label>
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
            </div>
        </div>
    </main>
@endsection
