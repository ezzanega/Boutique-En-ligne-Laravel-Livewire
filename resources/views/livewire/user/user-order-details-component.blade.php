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
                    <span></span> Order Details
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
                                        Order Details
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('user.orders') }}" class="btn btn-pr btn-sm float-end">My Orders</a>
                                        @if ($order->status == 'ordered')
                                            <a href="#" onclick="cancelConfirmation({{ $order->id }})" class="btn btn-warning btn-sm float-end" style="margin-right: 10px">Cancel Order</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (Session::has('order_message'))
                                    <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                                @endif
                                <div class="order_review">
                                    <div class="mb-25">
                                        <h4>Order Details</h4>
                                    </div>
                                    <div class="text-center table-responsive order_table">
                                        <table class="table">
                                            <tr>
                                                <th>Order ID</th>
                                                <td>{{ $order->id }}</td>
                                                <th>Order Date</th>
                                                <td>{{ $order->created_at }}</td>
                                                <th>Status</th>
                                                <td>{{ $order->status }}</td>
                                                @if($order->status == "delivered")
                                                <th>Delivery Date</th>
                                                <td>{{ $order->delivered_date }}</td>
                                                @elseif($order->status == "canceled")
                                                <th>Cancellation Date</th>
                                                <td>{{ $order->canceled_date }}</td>
                                                @endif
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="order_review">
                                    <div class="mb-25">
                                        <h4>Ordered Items</h4>
                                    </div>
                                    <div class="text-center table-responsive order_table">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Product</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->orderItems as $item)
                                                <tr>
                                                    <td class="image product-thumbnail"><img src="{{ asset('assets/imgs/shop') }}/{{ $item->product->image }}" alt="{{ $item->product->name  }}"></td>
                                                    <td>
                                                        <h5><a href="{{ route('product.details',['slug'=>$item->product->slug]) }}">{{ $item->product->name }}</a></h5> <span class="product-qty">x {{ $item->quantity }}</span>
                                                        {{-- @if ($order->status == 'delivered' && $item->rstatus == false)
                                                            <h4><a href="{{ route('user.review',['order_item_id'=>$item->id]) }}" style="color: #6A5ACD">Write Review</a></h4>
                                                        @endif --}}
                                                    </td>
                                                    <td>${{ $item->price }}</td>
                                                </tr>
                                                @endforeach
                                                    <tr>
                                                        <th>SubTotal</th>
                                                        <td class="product-subtotal" colspan="2">${{ $order->subtotal }}</td>
                                                    </tr>
                                                    @if ($order->discount > 0)
                                                        <tr>
                                                            <th>Discount</th>
                                                            <td class="product-subtotal" colspan="2">${{ $order->discount }}</td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <th>Tax</th>
                                                        <td class="product-subtotal" colspan="2">${{ $order->tax }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Shipping</th>
                                                        <td colspan="2"><em>Free Shipping</em></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">${{ $order->total }}</span></td>                                                 
                                                    </tr>
                                                    <tr>
                                                        
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="order_review">
                                    <div class="mb-20">
                                        <h4>Transaction</h4>
                                    </div>
                                    <table class="table">
                                        <tr>
                                            <th>Transaction Mode</th>
                                            <td>{{ $order->transaction->mode }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{{ $order->transaction->status }}</td>
                                        </tr>
                                        <tr>
                                            <th>Transaction Date</th>
                                            <td>{{ $order->transaction->created_at }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="order_review">
                                    <div class="mb-25">
                                        <h4>Billing Details</h4>
                                    </div>
                                    <div class="text-center table-responsive order_table">
                                        <table class="table">
                                            <thead>
                                                <tr class="main-heading">
                                                    <th scope="col">First Name</th>
                                                    <th scope="col">Last Name</th>
                                                    <th scope="col">Mobile</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Line1</th>
                                                    <th scope="col">Line2</th>
                                                    <th scope="col">City</th>
                                                    <th scope="col">Province</th>
                                                    <th scope="col">Country</th>
                                                    <th scope="col">ZipCode</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>{{ $order->firstname }}</td>
                                                        <td>{{ $order->lastname }}</td>
                                                        <td>{{ $order->mobile }}</td>
                                                        <td>{{ $order->email }}</td>
                                                        <td>{{ $order->line1 }}</td>
                                                        <td>{{ $order->line2 }}</td>
                                                        <td>{{ $order->city }}</td>
                                                        <td>{{ $order->province }}</td>
                                                        <td>{{ $order->country }}</td>
                                                        <td>{{ $order->zipcode }}</td>
                                                    </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="cancelConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="text-center col-md-12">
                        <h4 class="pb-3">Do you want to cancel this order?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cancelConfirmation">Exit</button>
                        <button type="button" class="btn btn-danger" onclick="cancelOrder()">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function cancelConfirmation(id)
        {
            @this.set('order_id',id);
            $('#cancelConfirmation').modal('show');
        }

        function cancelOrder()
        {
            @this.call('cancelOrder');
            $('#cancelConfirmation').modal('hide');
        }
    </script>
@endpush