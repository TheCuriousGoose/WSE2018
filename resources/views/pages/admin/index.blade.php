@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="{{ route('auth.login') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="mb-2">
                            <label for="name">Username</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <small class="invalid-feedback d-block">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-end  mb-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
