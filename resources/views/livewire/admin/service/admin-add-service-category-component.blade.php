<div>

                <h1>Ajouter une catégorie de service</h1>

                            <div class="panel panel-default" style="font-weight: 600;">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Ajouter une nouvelle catégorie de service
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.service_categories') }}" class="btn btn-info pull-right">Toutes les catégories de services</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                    <form class="form-horizontal" wire:submit.prevent="createNewCategory">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-2">Nom de catégorie: </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="name" wire:model="name" wire:keyup="generateSlug"/>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group" style="display: none;">
                                            <label for="slug" class="control-label col-sm-2">Category Slug: </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="slug" wire:model="slug"/>
                                                @error('slug')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="control-label col-sm-2">Image de la catégorie: </label>
                                            <div class="col-sm-7">
                                                <input type="file" class="form-control-file" name="image" wire:model="image"/>
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                @if ($image)
                                                    <img src="{{ $image->temporaryUrl() }}" width="60" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label col-sm-3"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-success pull-right">Ajouter catégorie</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        
</div>
