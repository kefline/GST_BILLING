<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GST BILLING | {{!empty( $meta_title) ? $meta_title : "" }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/plugins/iCheck/square/blue.css">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>GST</b>BILLING</a>
  </div>

@yield('content')


</div>

<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%'
    });
  });
</script>
{{-- <script>
    document.getElementById('email').addEventListener( function(){
        const email  = document.getElementById('email');
        const phone = document.getElementById('phone');
    
        email.disable = phone.value.trim() !== "";
    
    });
    document.getElementById('phone').addEventListener(function(){
        const email = document.getElementById('email');
        const phone = document.getElementById('phone');
        phone .disable = email.value.trim() !== "";
    });
    </script> --}}
</body>

</html>