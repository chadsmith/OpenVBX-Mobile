<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>OpenVBX Mobile</title>
    <link href="//code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" rel="stylesheet">
    <link href="<?php echo openvbx_mobile_path('/css/style.css'); ?>" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="<?php echo openvbx_mobile_path('/js/script.js'); ?>"></script>
    <script src="//code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
  </head>
  <body class="folder">
    <div data-role="page">
      <div data-role="header" data-position="fixed">
        <h1><?php echo $folder->name; ?></h1>
        <a href="<?php echo openvbx_mobile_path('/'); ?>" data-rel="back" data-icon="arrow-l" data-iconpos="notext" data-direction="reverse">Back</a>
      </div> 
      <div data-role="content">
        <ul data-role="listview">
<?php foreach($folder->messages->items as $message):
  $timestamp = strtotime($message->received_time);
  if($timestamp > $today)
    $time = date('g:i A', $timestamp);
  elseif($timestamp > $yesterday)
    $time = 'Yesterday';
  else
    $time = date('n/j/y', $timestamp);
?>
          <li<?php echo $message->unread ? ' data-theme="b"' : ''; ?>>
            <a href="<?php echo openvbx_mobile_path('/messages/details/' . $message->id); ?>">
              <img src="<?php echo openvbx_mobile_path('/img/' . $message->type . '.png'); ?>" alt="<?php echo $message->type; ?>" class="ui-li-icon">
              <h3><?php echo $message->caller; ?></h3>
<?php if($message->folder): ?>
              <p><strong><?php echo $message->folder; ?></strong></p>
<?php endif; ?>
              <p class="ui-li-aside"><strong><?php echo $time; ?></strong></p>
              <p><?php echo $message->short_summary; ?></p>
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
