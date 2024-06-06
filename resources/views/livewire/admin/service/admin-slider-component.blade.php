<div>
    <style>
        nav svg {
            height: 20px;
        }
        nav .hidden {
            display: block !important;
        }
    </style>

    <h1>Toutes les diapositives</h1>

    <div class="panel panel-default" style="font-weight: 600;">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    Toutes les diapositives
                </div>
                <div class="col-md-6">
                    <a href="{{ route('admin.add_slide') }}" class="btn btn-info pull-right">Ajouter Nouveau</a>
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
                        <th>Titre</th>
                        <th>Statut</th>
                        <th>Créé à</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($slides->count() > 0)
                        @foreach ($slides as $slide)
                            <tr>
                                <td>{{ $slide->id }}</td>
                                <td><img src="{{ asset('images/slider') }}/{{ $slide->image }}" alt="{{ $slide->title }}" width="60" /></td>
                                <td>{{ $slide->title }}</td>
                                <td>
                                    @if($slide->status)
                                        Actif
                                    @else
                                        Inactif
                                    @endif
                                </td>
                                <td>{{ $slide->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.edit_slide', ['slide_id' => $slide->id]) }}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                    <a href="#"  wire:click.prevent="deleteConfirmation({{$slide->id}})" style="margin-left: 10px"><i class="fa fa-times fa-2x text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center" style="color:red;"><strong>Aucune diapositive disponible.</strong></td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $slides->links() }}
        </div>
    </div>
</div>
