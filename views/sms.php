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
  <body class="sms">
    <div data-role="page">
      <div data-role="header">
        <h1>New Text</h1>
        <a href="<?php echo openvbx_mobile_path('/'); ?>" data-icon="arrow-l" data-iconpos="notext" data-direction="reverse">Bank</a>
      </div> 
      <div data-role="content">
        <form method="post" action="<?php echo openvbx_mobile_path('/sms'); ?>">
          <div data-role="fieldcontain">
            <label for="from" class="select">From:</label>
            <select name="from" id="from">
<?php foreach($callerids as $callerid): ?>
              <option value="<?php echo $callerid->phone_number; ?>"<?php echo $from == $callerid->phone_number ? ' selected' : ''; ?>><?php echo $callerid->name; ?></option>
<?php endforeach; ?>
            </select>
          </div>
          <div data-role="fieldcontain">
            <label for="to">To:</label>
            <input name="to" id="to" value="<?php echo $to; ?>">
          </div>
          <p>
            <textarea name="content" rows="8" cols="40"></textarea>
          </p>
          <p>
            <button data-theme="a">Send</button>
          </p>
        </form>
<?php if(isset($status)): ?>
        <p><?php echo $status; ?></p>
<?php endif; ?>
      </div>
    </div>
  </body>
</html>
