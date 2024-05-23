
<div>
    <div class="container" style="width: 500px;">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="font-weight: 600;">
                    <div class="card-header">Admin Dashboard</div>
                    <div class="card-body">
                        <a href="{{route('admin.service_providers.pending')}}">
                            <div class="alert alert-info" role="alert">
                                Les prestataires de service à vérifier ({{ $pendingServiceProvidersCount }})                            </div>
                            </div>
                        </a>
                        <a href="{{route('admin.contacts')}}">
                            <div class="alert alert-info" role="alert">
                                Les messages ({{ $contactsCount }})
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
