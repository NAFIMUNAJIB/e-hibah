@extends('admin.layouts.app')
@push('style')
    <link href="{{ asset('assets/css/sign-in.css') }}" rel="stylesheet">
@endpush
@section('content')

    <div class="d-flex align-items-center py-4">
        <main class="form-signin w-100 m-auto">
            <h1 class="h3 fw-normal">Please sign in</h1>
            @if ($errors->any())
                <div class="alert alert-danger mt-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" {{ route('proposal.store') }}>
                @csrf

                <div class="form-floating mt-5">
                    <input name="email" id="email" type="email" class="form-control" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mt-2">
                    <input name="password" id="password" type="password" class="form-control" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <button class="btn btn-primary w-100 py-2 mt-5" type="submit">Sign in</button>
            </form>
        </main>
    </div>
@endsection
