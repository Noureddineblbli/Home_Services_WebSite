<x-base-layout>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Registeration</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Registeration</li>
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
                            <h3>User Info</h3>
                            <form id="userregisterationform" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  required="" autofocus="">
                                        @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  required="">
                                        @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required="">
                                        @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required="">
                                        @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="registeras" class="col-md-4 col-form-label text-md-right">Registered As</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="registeras" id="registeras">
                                        <option value="CST" {{ old('registeras') == 'CST' ? 'selected' : '' }}>Customer</option>
                                        <option value="SVP" {{ old('registeras') == 'SVP' ? 'selected' : '' }}>Service Provider</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row additional-fields" style="display: none;">
                                    <label for="cv" class="col-md-4 col-form-label text-md-right">CV</label>
                                    <div class="col-md-6">
                                        <input id="cv" type="file" class="form-control" name="cv">
                                        @error('cv')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row additional-fields" style="display: none;">
                                    <label for="diploma" class="col-md-4 col-form-label text-md-right">Diploma</label>
                                    <div class="col-md-6">
                                        <input id="diploma" type="file" class="form-control" name="diploma">
                                        @error('diploma')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                @php
                                    $serviceCategories = App\Models\ServiceCategory::all();
                                @endphp

                                <div class="form-group row additional-fields" style="display: none;">
                                    <label for="service_category" class="col-md-4 col-form-label text-md-right">Service Category</label>
                                    <div class="col-md-6">
                                        <select id="service_category" name="service_category" class="form-control" required>
                                            <option value="">Select Service Category</option>
                                            @foreach($serviceCategories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('service_category')
                                                    <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-10">
                                        <span style="font-size: 14px;">If you have already registered <a
                                                href="{{ route('login') }}" title="Login">click here</a> to login</span>
                                        <button type="submit" class="btn btn-primary pull-right">Register</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-twitter">
            <i class="fa fa-twitter icon-big"></i>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var registerAs = document.getElementById('registeras');
            var additionalFields = document.querySelectorAll('.additional-fields');

            registerAs.addEventListener('change', function () {
                var selectedOption = registerAs.value;

                if (selectedOption === 'SVP') {
                    additionalFields.forEach(function (field) {
                        field.style.display = 'block';
                    });
                } else {
                    additionalFields.forEach(function (field) {
                        field.style.display = 'none';
                    });
                }
            });

            // Initialize the display based on the initial value of the dropdown
            if (registerAs.value === 'SVP') {
                additionalFields.forEach(function (field) {
                    field.style.display = 'block';
                });
            } else {
                additionalFields.forEach(function (field) {
                    field.style.display = 'none';
                });
            }
        });
    </script>


</x-base-layout>
