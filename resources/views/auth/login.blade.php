<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Biofarmaka</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
  body {
        background: linear-gradient(to bottom right, #1EDAE8 ,#1a84b8);         
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
      }
  .loginForm{
    margin-top:40px;
  }
</style>
<body>
    <div class="container" id="app">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default loginForm " style="padding: 10px;">
              <p>Petunjuk penggunaan modul pemantauan Sistem Informasi Manajemen Peneliti Pusat Studi Biofarmaka Tropika (Trop BRC)</p>
              <a class="btn btn-success" href="{{ route('download') }}">Download</a>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                      <img src="{{asset('images/logoipb.png')}}" class="img-circle" style="width: 60px; height: 60px;" alt="User Image">
                      &nbsp; Login manajemen puncak <b>Pusat Studi Biofarmaka Tropika(TropBRC)</b>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            @if (\Session::has('error'))
                                <div class="alert alert-danger">
                                  <div>{!! \Session::get('error') !!}</div>
                                </div>
                            @endif
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Email address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="exampleInputPassword1">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>