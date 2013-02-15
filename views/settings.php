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
  <body class="settings">
    <div data-role="page">
      <div data-role="header" data-position="fixed">
        <h1>Settings</h1>
<?php if(!empty($_SESSION['auth'])): ?>
        <a href="<?php echo openvbx_mobile_path('/'); ?>" data-rel="back" data-icon="arrow-l" data-iconpos="notext" data-direction="reverse">Back</a>
<?php endif; ?>
      </div> 
      <div data-role="content">
        <form method="post" action="<?php echo openvbx_mobile_path('/settings'); ?>">
          <div data-role="fieldcontain">
            <label for="device">Your Number</label>
            <input name="device" id="device" placeholder="555-555-5555" value="<?php echo $_SESSION['device']; ?>">
          </div>
          <p>When you place phone calls using OpenVBX, you'll be called at this number to complete the connection.</p>
          <p>
            <button data-theme="a">Save</button>
          </p>
        </form>
      </div>
    </div>
  </body>
</html>
