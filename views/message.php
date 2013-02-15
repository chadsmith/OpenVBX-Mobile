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
  <body class="message">
    <div data-role="page">
      <div data-role="header" data-position="fixed">
        <h1>Details</h1>
        <a href="<?php echo openvbx_mobile_path('/'); ?>" data-rel="back" data-icon="arrow-l" data-iconpos="notext" data-direction="reverse">Back</a>
      </div> 
      <div data-role="content">
        <h2><?php echo $message->caller; ?></h2>
        <h3><?php echo date('n/j/y g:i A', strtotime($message->received_time)); ?></h3>
<?php if($message->folder): ?>
        <h4><?php echo $message->folder; ?></h4>
<?php endif; ?>
        <br>
        <div class="ui-body ui-body-c">
<?php if($message->type == 'voice'): ?>
          <audio src="<?php echo $message->recording_url; ?>" controls></audio>
<?php endif; ?>
          <p><?php echo $message->summary; ?></p>
        </div>
        <br>
        <div class="ui-body ui-body-c">
          <form method="post" action="<?php echo openvbx_mobile_path('/messages/details/' . $message->id); ?>">
            <div data-role="fieldcontain">
              <label for="status" class="select">Status</label>
              <select name="status" id="status">
<?php foreach($statuses as $key => $status): ?>
                <option value="<?php echo $key; ?>"<?php echo $message->ticket_status == $key ? ' selected' : ''; ?>><?php echo $status; ?></option>
<?php endforeach; ?>
              </select>
            </div>
          </form>
          <form method="post" action="<?php echo openvbx_mobile_path('/messages/details/' . $message->id); ?>">
            <div data-role="fieldcontain">
              <label for="assigned" class="select">Assigned to</label>
              <select name="assigned" id="assigned">
                <option value=""></option>
<?php foreach($message->active_users as $user): ?>
                <option value="<?php echo $user->id; ?>"<?php echo $message->assigned == $user->id ? ' selected' : ''; ?>><?php echo $user->first_name; ?> <?php echo $user->last_name; ?></option>
<?php endforeach; ?>
              </select>
            </div>
          </form>
        </div>
        <br>
        <div class="ui-body ui-body-c">
          <ul data-role="listview">
<?php foreach($message->annotations->items as $annotation): ?>
            <li>
              <h5><?php echo $annotation->first_name . ' ' . $annotation->last_name; ?></h5>
              <p><?php echo $annotation->description; ?></p>
            </li>
<?php endforeach; ?>
          </ul>
          <br>
          <form method="post" action="<?php echo openvbx_mobile_path('/messages/details/' . $message->id); ?>">
            <p>
              <textarea name="description" rows="8" cols="40"></textarea>
            </p>
            <p>
              <button data-theme="a">Add Note</button>
            </p>
          </form>
        </div>
      </div>
      <div data-role="footer" class="footer ui-bar" data-position="fixed">
        <div data-role="controlgroup" data-type="horizontal">
          <a href="<?php echo openvbx_mobile_path('/'. ($message->type == 'voice' ? 'dialer' : 'sms') . '?from=' . $message->original_called . '&to=' . $message->original_caller); ?>" data-role="button" data-icon="back">Reply</a>
          <a href="<?php echo openvbx_mobile_path('/messages/details/' . $message->id .'/archive'); ?>" data-role="button" data-icon="delete">Delete</a>
        </div>
      </div>
    </div>
  </body>
</html>
