<div>
    <main>
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Admin
                    <span></span> All Coupons
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
                                        All Coupons
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.addcoupon') }}" class="btn btn-pr btn-sm float-end">Add New</a>
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
                                                <th scope="col">Coupon Code</th>
                                                <th scope="col">Coupon Type</th>
                                                <th scope="col">Coupon Value</th>
                                                <th scope="col">Cart Value</th>
                                                <th scope="col">Expiry Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($coupons as $coupon)
                                                <tr>
                                                    <td>{{ $coupon->id }}</td>
                                                    <td>{{ $coupon->code }}</td>
                                                    <td>{{ $coupon->type }}</td>
                                                    @if($coupon->type == 'fixed')
                                                        <td>${{ $coupon->value }}</td>
                                                    @else
                                                        <td>{{ $coupon->value }} %</td>
                                                    @endif
                                                    <td>{{ $coupon->cart_value }}</td>
                                                    <td>{{ $coupon->expiry_date }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.editcoupon',['coupon_id'=>$coupon->id]) }}"><i class="mr-10 fi-rs-edit" style="font-size: 20px;"></i></a>
                                                        <a href="#" onclick="deleteConfirmation({{ $coupon->id }})"><i class="fi-rs-trash" style="font-size: 20px;"></i></a>
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
                        <h4 class="pb-3">Do you want to delete this Coupon?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteCoupon()">Delete</button>
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
            @this.set('coupon_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteCoupon()
        {
            @this.call('deleteCoupon');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush