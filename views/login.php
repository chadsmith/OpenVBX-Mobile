<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>OpenVBX Mobile</title>
    <link href="//code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="js/script.js"></script>
    <script src="//code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
  </head>
  <body class="login">
    <div data-role="page">
      <div data-role="content">
        <form method="post" action="<?php echo openvbx_mobile_path('/login'); ?>">
          <img src="img/logo.png" alt="OpenVBX">
          <p>
            <input name="email" placeholder="Email">
          </p>
          <p>
            <input type="password" name="password" placeholder="Password">
          </p>
          <p>
            <button data-theme="a">Login</button>
          </p>
        </form>
      </div>
    </div>
  </body>
</html>
