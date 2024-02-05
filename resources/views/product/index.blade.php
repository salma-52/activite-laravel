<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="container mt-5">
        <h1>Products List</h1>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Reference</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Type</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td scope="row">{{ $product->RefPdt }}</td>
                        <td>{{ $product->libPdt }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ $product->prix }}</td>
                        <td>{{ $product->Qte }}</td>
                        <td>{{ $product->type }}</td>
                        <td><img src="storage/{{ $product->image }}" alt="image"  width="40"/></td>
                        
                        <td>
                            @if (Auth::id() == $product->user_id || Auth::user()->type==="administrateur" )
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-info btn-sm">Details</a>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
