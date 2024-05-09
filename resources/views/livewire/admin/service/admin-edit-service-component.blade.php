<div>

                <h1>Edit Service</h1>

                            <div class="panel panel-default" style="font-weight: 600;">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Edit Service
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.all_services') }}" class="btn btn-info pull-right">All Services</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                    <form class="form-horizontal" wire:submit.prevent="updateService">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name" class="control-label col-sm-2">Name: </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="name" wire:model="name" wire:keyup="generateSlug"/>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="slug" class="control-label col-sm-2">Slug: </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="slug" wire:model="slug"/>
                                                @error('slug')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tagline" class="control-label col-sm-2">Tagline: </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="tagline" wire:model="tagline"/>
                                                @error('tagline')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="service_category_id" class="control-label col-sm-2">Service Category: </label>
                                            <div class="col-sm-7">
                                                <select name="service_category_id" class="form-control" wire:model="service_category_id">
                                                    <option value="">Select Category</option>

                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('service_category_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="control-label col-sm-2">Price: </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="price" wire:model="price"/>
                                                @error('price')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="discount" class="control-label col-sm-2">Discount: </label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="discount" wire:model="discount"/>
                                                @error('discount')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="discount_type" class="control-label col-sm-2">Discount Type: </label>
                                            <div class="col-sm-7">
                                                <select name="discount_type" class="form-control" wire:model="discount_type">

                                                    <option value="">Select Category</option>
                                                    <option value="fixed">Fixed</option>
                                                    <option value="percent">Percent</option>

                                                </select>
                                                @error('discount_type')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
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
                                            <label for="description" class="control-label col-sm-2">Description: </label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" wire:model='description'></textarea>
                                                @error('description')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inclusion" class="control-label col-sm-2">Inclusion: </label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" wire:model='inclusion'></textarea>
                                                @error('inclusion')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tagline" class="control-label col-sm-2">Exclusion: </label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" wire:model="exclusion"></textarea>
                                                @error('tagline')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="newthumbnail" class="control-label col-sm-2">Thumbnail: </label>
                                            <div class="col-sm-7">
                                                <input type="file" class="form-control-file" name="newthumbnail" wire:model="newthumbnail"/>
                                                @error('newthumbnail')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                @if ($newthumbnail)
                                                    <img src="{{ $newthumbnail->temporaryUrl() }}" width="60" />
                                                @else
                                                    <img src="{{ asset('images/services/thumbnails') }}/{{ $thumbnail }}" width="60" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="newimage" class="control-label col-sm-2">Image: </label>
                                            <div class="col-sm-7">
                                                <input type="file" class="form-control-file" name="newimage" wire:model="newimage"/>
                                                @error('newimage')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                                @if ($newimage)
                                                    <img src="{{ $newimage->temporaryUrl() }}" width="60" />
                                                    @else
                                                    <img src="{{ asset('images/services') }}/{{ $image }}" width="60" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label col-sm-3"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-success pull-right">Update Service</button>
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
