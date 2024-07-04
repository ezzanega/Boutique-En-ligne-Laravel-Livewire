<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
    </style>
    <main>
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Admin
                    <span></span> All Products
                </div>
            </div>
        </div>
        {{-- <a href="{{ route('admin.addproduct') }}" class="btn btn-pr btn-sm" style="position:absolute; right: 7%;">Add New</a> --}}
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        All Products
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.addproduct') }}" class="btn btn-pr float-end">Add new</a>
                                        <div class="col-md-8 float-end" style="margin-right: 20px">
                                            <input type="text" class="form-control" placeholder="Search..." wire:model='searchTerm'>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                        @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                        @endif
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="main-heading">
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Stock</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Sale Price</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td>{{ $product->id }}</td>
                                                        <td><img src="{{ asset('assets/imgs/shop/') }}/{{ $product->image }}" width="60"></td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->stock_status }}</td>
                                                        <td>{{ $product->regular_price }}</td>
                                                        <td>{{ $product->sale_price }}</td>
                                                        <td>{{ $product->category->name }}</td>
                                                        <td>{{ $product->created_at }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.editproduct',['product_slug'=>$product->slug]) }}"><i class="mr-10 fi-rs-edit" style="font-size: 20px;"></i></a>
                                                            <a href="#" onclick="deleteConfirmation({{ $product->id }})"><i class="fi-rs-trash" style="font-size: 20px;"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>


<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="text-center col-md-12">
                        <h4 class="pb-3">Do you want to delete this Product?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteProduct()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id)
        {
            @this.set('product_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteProduct()
        {
            @this.call('deleteProduct');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush