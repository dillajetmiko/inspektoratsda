<!DOCTYPE html>
<html>
<head>
<style>
.body {
  background-color: #007bff;
  background-image: url("img_tree.gif");
}
#wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inspektorat | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('asset/css/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('asset/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('asset/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url({{ asset('asset/dist/bg.jpeg') }})">
<div class="login-box">
  <div class="login-logo">
    <!-- <a href="../../index2.html"> </a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="background-color: #7f728a " >
    
      <h2 style="text-align: center; color: white;">Login</h2><br>

                @if ($name != '')
                <div class="alert alert-danger" role="alert">
                {{$name}}
                </div>
                @endif

      <form action="/loginSubmit" method="post">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token()?>">
        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: #eaeaea">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text" style="background-color: #eaeaea">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div><br>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div id="wrapper" style="width:100%;">
            <!-- <button type="submit" class="btn btn-primary btn-block" style="width:30%;">Login</button> -->
            <button type="submit" class="button" 
              style="color: grey; background-color: #e1dce6; padding: 7px 45px; border-radius: 8px; border: none; font-weight:bold;">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div class="social-auth-links text-center mb-3">
        <!-- <p>-  -</p>
        <a href="/login1" class="btn btn-block btn-primary">
          Login Admin
        </a> -->
      </div>
      <!-- /.social-auth-links -->
      <!-- <p class="mb-0">
        <a href="/register" class="text-center">Register a new membership</a>
      </p> -->

<!-- /.login-box -->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('asset/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('asset/dist/js/adminlte.min.js') }}"></script>

</body>
</html>