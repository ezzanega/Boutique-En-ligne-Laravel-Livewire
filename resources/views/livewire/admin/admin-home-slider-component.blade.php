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
                    <span></span> All Slides
                    
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
                                        All Slides
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.addhomeslider') }}" class="btn btn-pr btn-sm float-end">Add New</a>
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
                                                <th scope="col">Title</th>
                                                <th scope="col">Subtitle</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Link</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sliders as $slider)
                                                <tr>
                                                    <td>{{ $slider->id }}</td>
                                                    <td><img src="{{ asset('assets/imgs/slider') }}/{{ $slider->image }}" width="120"></td>
                                                    <td>{{ $slider->title }}</td>
                                                    <td>{{ $slider->subtitle }}</td>
                                                    <td>{{ $slider->price }}</td>
                                                    <td>{{ $slider->link }}</td>
                                                    <td>{{ $slider->status == 1 ? 'Active':'Inactive' }}</td>
                                                    <td>{{ $slider->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edithomeslider',['slide_id'=>$slider->id]) }}"><i class="mr-10 fi-rs-edit" style="font-size: 20px;"></i></a>
                                                        <a href="#" onclick="deleteConfirmation({{ $slider->id }})"><i class="fi-rs-trash" style="font-size: 20px;"></i></a>
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
                        <h4 class="pb-3">Do you want to delete this slider?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteSlide()">Delete</button>
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
            @this.set('slide_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteSlide()
        {
            @this.call('deleteSlide');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush