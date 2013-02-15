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
  <body class="messages">
    <div data-role="page">
      <div data-role="header" data-position="fixed">
        <h1>Messages</h1>
        <a href="<?php echo openvbx_mobile_path('/settings'); ?>" data-icon="gear" data-iconpos="notext">Settings</a>
      </div> 
      <div data-role="content">
        <ul data-role="listview">
<?php foreach($messages->folders as $folder): ?>
          <li>
            <a href="<?php echo openvbx_mobile_path('/messages/' . $folder->id); ?>">
              <img src="<?php echo openvbx_mobile_path('/img/' . ($folder->type == 'inbox' ? 'inbox' : 'folder') . '.png'); ?>" alt="<?php echo $folder->name; ?>" class="ui-li-icon">
              <?php echo $folder->name; ?>
<?php if($folder->new): ?>
              <span class="ui-li-count" ><?php echo $folder->new; ?></span>
<?php endif; ?>
            </a>
          </li>
<?php endforeach; ?>
        </ul>
      </div>
      <div data-role="footer" class="footer ui-bar" data-position="fixed">
        <div data-role="controlgroup" data-type="horizontal">
          <a href="<?php echo openvbx_mobile_path('/sms'); ?>" data-role="button">New Text</a>
          <a href="<?php echo openvbx_mobile_path('/dialer'); ?>" data-role="button">New Call</a>
        </div>
      </div>
    </div>
  </body>
</html>
