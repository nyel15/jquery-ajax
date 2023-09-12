@extends('layouts.app')
@section('content')
<form action="{{ route('store') }}" method="POST" class="row g-3 mt-3">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card pb-2">
                    <div class="card-header">Insert Product</div>
                    <div class="card-body">
                        <div class="col-12">
                            <label for="inputProduct" class="form-label">Product</label>
                            <input type="text" class="form-control" id="inputProduct" name="product_name">
                        </div>
                        <div class="col-12">
                            <label for="inputPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="inputPrice" name="price">
                        </div>
                        <div class="col-12">
                            <label for="inputQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="inputQuantity" name="quantity">
                        </div>

                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary me-md-2 mr-2">insert</button>
                        <a href="/home" class="btn btn-danger mr-5">Back</a>
                    </div>
                </div>
            </div>
        </div>
</form>
@endsection