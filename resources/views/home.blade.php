@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-end">Product List</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        add product
                    </button>
                </div>
                <form action="{{ route('store') }}" method="POST" class="row g-3 mt-3" id="create-form">
                    @csrf
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Insert product</h1>
                            </div>
                            <div class="modal-body">
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="insert">insert</button>
                            </div>
                            </div>
                        </div>
                    </div>

                </form>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="cell-border" id="product-table" style="width:100%;">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    
    $(function() {
        $('#insert').on('click', function() {
            $('#create-form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '/store',
                    data: $('#create-form').serialize(),
                    headers: {
                        'X-CSRF-TOKEN': 'csrf-token'
                    },
                    success: function(response) {
                        Swal.fire(
                            'Good job!',
                            '',
                            'success'
                        )
                        $('.modal').hide();
                        $('#product-table').DataTable().ajax.reload();
                        
                        /*  console.log(response); */
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    });
</script>
@endsection