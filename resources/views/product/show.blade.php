<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Product Details</h1>

        <div class="row">
            <div class="col-md-6" style="width: 150px">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->libPdt }}" class="img-thumbnail">
                @else
                    No Image
                @endif
            </div>

            <div class="col-md-6">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Product Name</th>
                            <td>{{ $product->libPdt }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Product Reference</th>
                            <td>{{ $product->RefPdt }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Description</th>
                            <td>{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Price</th>
                            <td>{{ $product->prix }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Quantity</th>
                            <td>{{ $product->Qte }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Type</th>
                            <td>{{ $product->type }}</td>
                        </tr>
                    </tbody>
                </table>

                <a href="{{ route('product.index') }}" class="btn btn-primary">Back to Products</a>
            </div>
        </div>
    </div>
    
@endsection
