<div>
    <div>
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Admin
                </div>
            </div>
        </div>
    </div>
    <div>
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="m-auto col-lg-5">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="bg-white padding_eight_all">
                                        <a href="{{ route('admin.coupons') }}" class="btn btn-pr btn-sm float-end">All Coupons</a>
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Add Coupon</h3>
                                        </div>
                                        @if (Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                        @endif
                                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent='addCoupon'>
                                            <div class="form-group">
                                                <label>Coupon Code</label>
                                                <input type="text" placeholder="Coupon Code" wire:model='code'>
                                                @error('code') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Coupon Type</label>
                                                <div>
                                                    <select class="form-select" wire:model='type'>
                                                        <option class="fs-6" value="">Select</option>
                                                        <option class="fs-6" value="fixed">Fixed</option>
                                                        <option class="fs-6" value="percent">Percent</option>
                                                    </select>
                                                    @error('type') <p class="text-danger">{{ $message }}</p> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Coupon Value</label>
                                                <input type="text" placeholder="Coupon Value" wire:model='value'>
                                                @error('value') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Cart Value</label>
                                                <input type="text" placeholder="Cart Value" wire:model='cart_value'>
                                                @error('cart_value') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Expiry Date</label>
                                                <input type="text" id="expiry-date" placeholder="YYYY/MM/DD" wire:model='expiry_date'>
                                                @error('expiry_date') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>

                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-fill-out btn-block hover-up">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            $('#expiry-date').datetimepicker({
                format : 'Y-MM-DD',
            })
            .on('dp.change',function(ev){
                var data = $('#expiry-date').val();
                @this.set('expiry_date',data);
            });
        });
    </script>
@endpush