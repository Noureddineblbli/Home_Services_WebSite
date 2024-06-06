<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>

    <h1>Catégories de Services</h1>

    <div class="panel panel-default" style="font-weight: 600;">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    Toutes les Catégories de Services
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.add_service_category') }}" class="btn btn-info pull-right">Ajouter Nouveau</a>
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
                        <th>Nom</th>
                        <th>Slug</th>
                        <th>Mis en avant</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($scategories->count() > 0)
                        @foreach ($scategories as $scategory)
                            <tr>
                                <td>{{ $scategory->id }}</td>
                                <td><img src="{{ asset('images/categories') }}/{{ $scategory->image }}" alt="{{ $scategory->name }}" width="60" /></td>
                                <td>{{ $scategory->name }}</td>
                                <td>{{ $scategory->slug }}</td>
                                <td>
                                    @if ($scategory->featured)
                                        Oui
                                    @else
                                        Non
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.services_by_category', ['category_slug' => $scategory->slug]) }}" style="margin-right: 10px"><i class="fa fa-list fa-2x text-info"></i></a>
                                    <a href="{{ route('admin.edit_service_category', ['category_id' => $scategory->id]) }}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                    <a href="#"  wire:click.prevent="deleteConfirmation({{$scategory->id}})" style="margin-left: 10px"><i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center" style="color:red;"><strong>Aucune catégorie de service disponible.</strong></td>
                        </tr>
                    @endif
                </tbody>
            </table>    
            {{ $scategories->links() }}
        </div>
    </div>
</div>
