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
                                    @if (Session::has('order_message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                                    @endif
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
                                                <th scope="col" colspan="2" class="text-center">Action</th>
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
                                                        <a href="{{ route('admin.orderDetails',['order_id'=>$order->id]) }}" class="btn btn-secondary btn-sm">Details</a>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-pr btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Status<span class="caret"></span></button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                                <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">Delivered</a></li>
                                                                <li><a class="dropdown-item" href="#" wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled')">Canceled</a></li>
                                                            </ul>
                                                        </div>
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