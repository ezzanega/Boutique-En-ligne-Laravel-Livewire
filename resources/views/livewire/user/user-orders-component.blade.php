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
                    <span></span> User
                    <span></span> All Orders
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        All Orders
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="main-heading">
                                                <th scope="col">OrderID</th>
                                                {{-- <th scope="col">Subtotal</th> --}}
                                                {{-- <th scope="col">Discount</th> --}}
                                                {{-- <th scope="col">Tax</th> --}}
                                                <th scope="col">First Name</th>
                                                <th scope="col">Last Name</th>
                                                <th scope="col">Mobile</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">ZipCode</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Order Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    {{-- <td>${{ $order->subtotal }}</td> --}}
                                                    {{-- <td>${{ $order->discount }}</td> --}}
                                                    {{-- <td>${{ $order->tax }}</td> --}}
                                                    <td>{{ $order->firstname }}</td>
                                                    <td>{{ $order->lastname }}</td>
                                                    <td>{{ $order->mobile }}</td>
                                                    <td>{{ $order->email }}</td>
                                                    <td>{{ $order->zipcode }}</td>
                                                    <td>${{ $order->total }}</td>
                                                    <td>{{ $order->status }}</td>
                                                    <td>{{ $order->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('user.orderdetails',['order_id'=>$order->id]) }}" class="btn btn-pr btn-sm">Details</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>