<div>

                <h1>Edit Service Category</h1>

                            <div class="panel panel-default" style="font-weight: 600;">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Edit Service Category
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.service_categories') }}" class="btn btn-info pull-right">All Service Categories</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                    <form class="form-horizontal" wire:submit.prevent="updateServiceCategory">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-2">Category Name: </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="name" wire:model="name" wire:keyup="generateSlug"/>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-2">Category Slug: </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="slug" wire:model="slug"/>
                                                @error('slug')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="control-label col-sm-2">Category Image: </label>
                                            <div class="col-sm-7">
                                                <input type="file" class="form-control-file" name="image" wire:model="newimage"/>
                                                @error('newimage')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                @if ($newimage)
                                                    <img src="{{ $newimage->temporaryUrl() }}" width="60" />
                                                @else
                                                    <img src="{{ asset('images/categories') }}/{{ $image }}" width="60" />
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="featured" class="control-label col-sm-2">Featured: </label>
                                            <div class="col-sm-7">
                                                <select name="featured" class="form-control" wire:model="featured">

                                                    <option value="">Select Featured</option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="control-label col-sm-3"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-success pull-right">Update Category</button>
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
