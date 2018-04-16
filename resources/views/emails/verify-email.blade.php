<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Demystifying Email Design</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0; padding-top:30px;">
  <center><img src="{{ asset('img/logo_brand.png') }}" /></center>
  <div style="margin-top:30px; margin-bottom:20px; border-bottom:1px solid #cecece;"></div>
  <div style="text-align: center;">
    <div style="display: inline-block; text-align:left;">
      <h4 style="padding-top: 20px;">Welcome {{$user->f_name.' '.$user->l_name}}! Thank you for joining us!</h4>
      <h4 style="padding: 20px 0;">Please verify your account by clicking the following link:</h4>
      <p>
        <a href="{{route('verify/account').'?verify_token='.$user->verify_token}}">{{route('verify/account').'?verify_token='.$user->verify_token}}</a>
      </p>
    </div>
  </div>
</body>
</html>