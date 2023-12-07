{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;ampdisplay=swap" rel="stylesheet">

<link rel="stylesheet" href="assets/vendor/fonts/materialdesigniconsf861.css?id=9a16ed1a5c9f397c4fb730e76fd36384">
<link rel="stylesheet" href="assets/vendor/libs/node-waves/node-wavesd178.css?id=aa72fb97dfa8e932ba88c8a3c04641bc">
<!-- Core CSS -->
<link rel="stylesheet" href="assets/vendor/css/core39e0.css?id=fdb5cd3f802d37d094730acf8fdcb33a">
<link rel="stylesheet" href="assets/vendor/css/theme-default5761.css?id=da9b9645b9e4f480d38ea81168db36b7">
<link rel="stylesheet" href="assets/css/demo2b5e.css?id=0f3ae65b84f44dbd4971231c5d97ac3b">
<!-- Vendors CSS -->
<link rel="stylesheet"
    href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbarda97.css?id=e542d5fe23051cba0a5aedb27dadd732">

<!-- Vendor Styles -->
<link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css">

<body class="body" style="display: flex; align-items:center">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

{{-- @endsection --}}
