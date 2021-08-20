
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>NEPTUNE | @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('layouts.css')
    <style>
        body {
         background: url('./../img/bg.jpg') no-repeat center center fixed;
         -webkit-background-size: cover;
         -moz-background-size: cover;
         -o-background-size: cover;
         background-size: cover;
        }

        .card-default {
         opacity: 0.8;
         margin-top:30px;
        }
        .form-group.last {
         margin-bottom:0px;
        }
    </style>


</head>

<body>
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong class="">Login</strong>

                    </div>
                    <div class="panel-body">


<div class="form-group">

</div>
<form action="/auth" class="form-horizontal" method="post" role="form"><input name="__RequestVerificationToken" type="hidden" value="_BZi9KavbUIYnek1GgHT1T6BVKmpsEUsB3qIrj8OTh6IwFzqr-hNIr0sC5GN2TkWe6ETwJ7ErVmiNp_MbSp60sAVnU6uz_0E1QPaaPhpCqQ1" />    <div class="form-group">
        <label for="Email" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" required="" autofocus="" id="Email" name="Email" placeholder="Email address" value="jdoe@email.com" />
            <span class="field-validation-valid text-danger" data-valmsg-for="Email" data-valmsg-replace="true"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="Password" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="Password"  name="Password" placeholder="Password" required="" value="password" >
        </div>
    </div>
    <div class="form-group last">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-success btn-sm btn-block">Sign in</button>
        </div>
    </div>
</form>
                    </div>
                    <div class="panel-footer">
                        <a href="#" class="">Forgot password</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @yield('content')
</body>
@include('layouts.scripts')
</html>

