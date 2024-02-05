<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app') 

@section('content')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Se Connecter</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="login">login:</label>
                                <input type="login" name="login" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" class="form-control" >
                            </div>

                            <button type="submit" class="btn btn-primary">connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
