<div>
                       
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Reservation</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Reservation</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="semiboxshadow text-center">
        </div>
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-3 profile1" style="padding-bottom:40px;">
                        <div class="thinborder-ontop">
                            <h3>Reservation Info</h3>
        
                            @if (Session::has('message'))
                                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                                    @endif
                            <form  wire:submit.prevent="createReservation({{ auth()->user() ? auth()->user()->id : 'null' }})">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" wire:model="client_name">
                                        @error('client_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" wire:model="client_email">
                                        @error('client_email')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control" name="phone" wire:model="client_phone">
                                        @error('client_phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                                    <div class="col-md-6">
                                        <select id="city" class="form-control" name="city" wire:model="reservation_city">
                                            <option value="">Select City</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city }}" @if($reservation_city == $city) selected @endif>
                                                    {{ $city }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('reservation_city')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Adresse" class="col-md-4 col-form-label text-md-right">Adresse</label>
                                    <div class="col-md-6">
                                        <input id="adresse" type="text" class="form-control" name="adresse" wire:model="reservation_address">
                                        @error('client_address')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Day" class="col-md-4 col-form-label text-md-right">Day</label>
                                    <div class="col-md-6">
                                        <input id="day" type="date" class="form-control" name="day" value="" wire:model="day">
                                        @error('day')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="time" class="col-md-4 col-form-label text-md-right">Time</label>
                                    <div class="col-md-6">
                                        <select id="time" class="form-control" name="time" wire:model="time">
                                            <option value="">Select Time</option>
                                            @foreach ($timeSlots as $slot)
                                                <option value="{{ $slot }}">
                                                    {{ $slot }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('time')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary pull-right">Valider</button>
                                    </div>
                                </div>
                              
                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
       
    </section>
                            
</div>
