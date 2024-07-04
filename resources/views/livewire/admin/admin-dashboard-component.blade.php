<div>
    <div>
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Admin
                    <span></span> Dashboard
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <style>
            .content {
                padding-top: 40px;
                padding-bottom: 40px;
            }

            .icon-stat {
                display: block;
                overflow: hidden;
                position: relative;
                padding: 15px;
                margin-bottom: 1em;
                background-color: #fff;
                border-radius: 4px;
                border: 1px solid #ddd;
            }

            .icon-stat-label {
                display: block;
                color: #999;
                font-size: 13px;
            }

            .icon-stat-value {
                display: block;
                font-size: 28px;
                font-weight: 600;
            }

            .icon-stat-visual {
                position: relative;
                top: 22px;
                display: inline-block;
                width: 32px;
                height: 32px;
                border-radius: 4px;
                text-align: center;
                font-size: 16px;
                line-height: 30px;
            }

            .bg-primary {
                color: #fff;
                background: #d74b4b;
            }

            .bg-secondary {
                color: #fff;
                background: #6685a4;
            }

            .icon-stat-footer {
                padding: 10px 0 0;
                margin-top: 10px;
                color: #aaa;
                font-size: 12px;
                border-top: 1px solid #eee;
            }
        </style>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="icon-stat">
                        <div class="row">
                            <div class="text-left col-xs-8">
                                <span class="icon-stat-label">Total Revenue</span>
                                <span class="icon-stat-value">${{ $totalRevenue }} <i class="mr-10 fi-rs-check"
                                        style="position:absolute; right: 7%;"></i></span>
                            </div>
                        </div>
                        <div class="icon-stat-footer">
                            <i class="fa fa-clock-o"></i> Updated Now
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="icon-stat">
                        <div class="row">
                            <div class="text-left col-xs-8">
                                <span class="icon-stat-label">Total Sales</span>
                                <span class="icon-stat-value">{{ $totalSales }} <i class="mr-10 fi-rs-check"
                                        style="position:absolute; right: 7%;"></i></span>
                            </div>
                        </div>
                        <div class="icon-stat-footer">
                            <i class="fa fa-clock-o"></i> Updated Now
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="icon-stat">
                        <div class="row">
                            <div class="text-left col-xs-8">
                                <span class="icon-stat-label">Today Revenue</span>
                                <span class="icon-stat-value">${{ $todayRevenue }} <i class="mr-10 fi-rs-check"
                                        style="position:absolute; right: 7%;"></i></span>
                            </div>
                        </div>
                        <div class="icon-stat-footer">
                            <i class="fa fa-clock-o"></i> Updated Now
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="icon-stat">
                        <div class="row">
                            <div class="text-left col-xs-8">
                                <span class="icon-stat-label">Today Sales</span>
                                <span class="icon-stat-value">{{ $todaySales }} <i class="mr-10 fi-rs-check"
                                        style="position:absolute; right: 7%;"></i></span>
                            </div>
                        </div>
                        <div class="icon-stat-footer">
                            <i class="fa fa-clock-o"></i> Updated Now
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-15">
                        <div class="order_review">
                            <div class="mb-25">
                                <h4>Latest Order</h4>
                            </div>
                            <div class="text-center table-responsive order_table">
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
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
