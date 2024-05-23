<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>

                <h1>All Services</h1>

                            <div class="panel panel-default" style="font-weight: 600;">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-2">
                                            All Services
                                        </div>
                                        <div class="col-md-2">
                                            <select wire:model="categoryFilter" class="form-control" id="category_filter">
                                                <option value="">All Categories</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <a href="{{ route('admin.add_service') }}" class="btn btn-info pull-right">Add New</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Featured</th>
                                                <th>Category</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($services->count() > 0)
                                                @foreach ($services as $service)
                                                    <tr>
                                                        <td>{{ $service->id }}</td>
                                                        <td><img src="{{ asset('images/services/thumbnails') }}/{{ $service->thumbnail }}" alt="{{ $service->name }}" width="60" /></td>
                                                        <td>{{ $service->name }}</td>
                                                        <td>{{ $service->price }}</td>
                                                        <td>
                                                            @if($service->status)
                                                                Active
                                                            @else
                                                                Inactive
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($service->featured)
                                                                Yes
                                                            @else
                                                                No
                                                            @endif
                                                        </td>
                                                        <td>{{ $service->category->name }}</td>
                                                        <td>{{ $service->created_at }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.edit_service', ['service_slug' => $service->slug]) }}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                                            <a href="#" wire:click.prevent="deleteConfirmation({{$service->id}})" style="margin-left: 10px"><i class="fa fa-times fa-2x text-danger"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="9" class="text-center" style="color:red;"><strong>Aucun service disponible.</strong></td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    {{ $services->links() }}
                                </div>
                            </div>
                        
</div>
