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
  <body class="setup">
    <div data-role="page">
      <div data-role="content">
        <form method="post" action="<?php echo openvbx_mobile_path('/setup'); ?>">
          <img src="img/logo.png" alt="OpenVBX">
          <h1>Connect to your OpenVBX</h1>
          <p>
            <label>
              <input name="server" placeholder="https://"><br>
              URL to your OpenVBX installation
            </label>
          </p>
          <p>
            <button data-theme="a">Next</button>
          </p>
        </form>
      </div>
    </div>
  </body>
</html>
