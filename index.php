<?php
require 'core.php';
if(isset($_POST['server'])) {
  $server = $_POST['server'];
  $result = vbx_request($server . '/client');
  if($result && !$result->error) {
    $_SESSION['server'] = $server;
    header('Location: ' . openvbx_mobile_path('/login'));
  }
  else
    header('Location: ' . openvbx_mobile_path());
  die;
}
elseif(isset($_GET['logout'])) {
  session_destroy();
  header('Location: ' . openvbx_mobile_path());
  die;
}
if(empty($_SESSION['server']))
  include 'views/setup.php';
else {
  require_login();
  $messages = vbx_request($_SESSION['server'] . '/messages/inbox', array('Authorization' => 'Basic ' . $_SESSION['auth']));
  include 'views/messages.php';
}