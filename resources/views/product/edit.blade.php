<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <h1>Edit Product</h1>

        {{-- Display validation errors if any --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="libPdt" class="form-label">Product Name:</label>
                <input type="text" name="libPdt" class="form-control" value="{{ old('libPdt', $product->libPdt) }}">
                @error('libPdt')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Price:</label>
                <input type="number" name="prix" class="form-control" step="0.01" value="{{ old('prix', $product->prix) }}">
                @error('prix')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Qte" class="form-label">Quantity:</label>
                <input type="number" name="Qte" class="form-control" value="{{ old('Qte', $product->Qte) }}">
                @error('Qte')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type:</label>
                <select name="type" class="form-control">
                    <option value="Electricite" {{ old('type', $product->type) == 'Electricite' ? 'selected' : '' }}>Electricite</option>
                    <option value="Electronique" {{ old('type', $product->type) == 'Electronique' ? 'selected' : '' }}>Electronique</option>
                    <option value="Informatique" {{ old('type', $product->type) == 'Informatique' ? 'selected' : '' }}>Informatique</option>
                </select>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Product Image:</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

@endsection
