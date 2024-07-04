<div>
    <style>
        select[multiple] {
            /* background:none;
            height:auto;
            padding:0;
            margin:0;
            border-width: 2px;
            border-style: inset;
            -moz-appearance: menulist;
            -webkit-appearance: menulist;
            appearance: menulist; */
            
        }
    </style>
    <div>
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Admin
                    <span></span> Manage Home Categories
                </div>
            </div>
        </div>
    </div>
    <div>
        <section class="pt-50 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 m-auto">
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Manage Home Categories</h3>
                                        </div>
                                        @if (Session::has('message'))
                                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                        @endif
                                        <form class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                                            <div class="form-group">
                                                <label>Choose Categories</label>
                                                <div class="col-md-4" wire:ignore>
                                                    <select class="sel_categories form-control" name="categories[]" multiple="multiple" wire:model='selected_categories'>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>  
                                                        @endforeach                                       
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Nombre Of Products</label>
                                                <input type="text" placeholder="Nombre Of Products" wire:model='numberofproducts'>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-fill-out btn-block hover-up">Save</button>
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
        $(document).ready(function() {
            $(".sel_categories").select2({
                closeOnSelect: false
            });
            $('.sel_categories').on('change',function(e){
                var data = $('.sel_categories').select2("val");
                @this.set('selected_categories',data);
            });
        });
    </script>
@endpush