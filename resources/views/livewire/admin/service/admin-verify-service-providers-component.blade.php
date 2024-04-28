<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Pending Service Providers</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Service Providers</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row portfolioContainer">
                        <div class="col-md-12 profile1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-6">
                                            Pending Service Providers
                                        </div>
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>City</th>
                                                <th>Service Category</th>
                                                <th>Service Locations</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($PendingSProviders as $PendingSProvider)
                                                <tr>
                                                    <td>{{ $PendingSProvider->id }}</td>
                                                    <td><img src="{{ asset('images/sproviders') }}/{{ $PendingSProvider->image }}" alt="{{ $PendingSProvider->name }}" width="60" /></td>
                                                    <td>{{ $PendingSProvider->user->name }}</td>
                                                    <td>{{ $PendingSProvider->user->email }}</td>
                                                    <td>{{ $PendingSProvider->user->phone }}</td>
                                                    <td>{{ $PendingSProvider->city }}</td>
                                                    <td>{{ $PendingSProvider->service_category_id }}</td>
                                                    <td>{{ $PendingSProvider->service_location }}</td>
                                                    <td>
                                                        <button wire:click="verifyServiceProvider({{ $PendingSProvider->id }})">Verify</button>
                                                        <button href="#" onclick="confirm('Are you sure, You want to delete this service?') || event.stopImmediatePropagation();" wire:click.prevent="rejectServiceProvider({{ $PendingSProvider->id }})" style="margin-left: 10px"><i class="fa fa-times fa-2x text-danger"></i></button>
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
        </div>
    </section>
</div>
