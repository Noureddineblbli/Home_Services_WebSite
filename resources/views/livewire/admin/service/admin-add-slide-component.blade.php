<div>

                <h1>Ajouter une diapositive</h1>

                            <div class="panel panel-default" style="font-weight: 600;">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Ajouter une nouvelle diapositive
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.slider') }}" class="btn btn-info pull-right">Toutes les diapositives</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                    <form class="form-horizontal" wire:submit.prevent="addNewSlide">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title" class="control-label col-sm-2">Titre: </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="title" wire:model="title"/>
                                                @error('title')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="control-label col-sm-2">Image: </label>
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
                                            <label for="status" class="control-label col-sm-2">Status: </label>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="status" wire:model="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                @error('status')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label col-sm-3"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-success pull-right">Ajouter une diapositive</button>
                                            </div>
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
