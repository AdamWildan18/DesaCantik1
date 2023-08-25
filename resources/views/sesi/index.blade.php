<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <title>Desa Cantik</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/product/">
    @include('layouts.link')
</head>
<body style="background-color: #1E1E2D">

    <main >
        <button class="btn" onclick="back()"><h2><i class="bi bi-arrow-left-circle-fill" style="color: blueviolet"></i></h2></button>
        <div class="text-center">
            <div class="col-md-6 p-lg-5 mx-auto my-3">
                <img src="../img/DesaCintaStatistik.png" style="width: 300px">
            </div>
            <div class="container" style="width: 500px">
                <div class="card">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('loginpost') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    

    
                            <div class="row mb-0 mt-2">
                                <div class="col">
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
    </main>


</body>
</html>

@include('layouts.script')
<script>
    function back(){
        window.location.href = '/';
    }
</script>
