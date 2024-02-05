<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h1>Create Product</h1>
{{-- 
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="libPdt" class="form-label">Product Name:</label>
                <input type="text" name="libPdt" class="form-control" >
                @error('libPdt')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="RefPdt" class="form-label">Product Reference:</label>
                <input type="text" name="RefPdt" class="form-control" >
                @error('RefPdt')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" class="form-control" ></textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Price:</label>
                <input type="number" name="prix" class="form-control" step="0.01" >
                @error('prix')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Qte" class="form-label">Quantity:</label>
                <input type="number" name="Qte" class="form-control" >
                @error('Qte')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type:</label>
                <select name="type" class="form-control" >
                    <option value="Electronique">Electronique</option>
                    <option value="Electricite">Electricite</option>
                    <option value="Informatique">Informatique</option>
                </select>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image:</label>
                <input type="file" name="image" class="form-control" accept="image/*" >
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>

@endsection
