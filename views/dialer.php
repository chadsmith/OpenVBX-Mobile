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
  <body class="dialer">
    <div data-role="page">
      <div data-role="header">
        <h1>Dialer</h1>
        <a href="<?php echo openvbx_mobile_path('/'); ?>" data-icon="arrow-l" data-iconpos="notext" data-direction="reverse">Back</a>
      </div> 
      <div data-role="content">
        <form method="post" action="<?php echo openvbx_mobile_path('/dialer'); ?>">
          <div data-role="fieldcontain">
            <label for="callerid" class="select">From:</label>
            <select name="callerid" id="callerid">
<?php foreach($callerids as $callerid): ?>
              <option value="<?php echo $callerid->phone_number; ?>"<?php echo $from == $callerid->phone_number ? ' selected' : ''; ?>><?php echo $callerid->name; ?></option>
<?php endforeach; ?>
            </select>
          </div>
          <div data-role="fieldcontain">
            <label for="to">Recipient:</label>
            <input name="to" id="to" placeholder="Number to call" value="<?php echo $to; ?>">
          </div>
          <p>
            <button data-theme="a">Call</button>
          </p>
        </form>
<?php if(isset($status)): ?>
        <p><?php echo $status; ?></p>
<?php endif; ?>
      </div>
    </div>
  </body>
</html>
