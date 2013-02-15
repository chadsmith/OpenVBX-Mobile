<?php
require 'core.php';
if(empty($_SESSION['server'])) {
  header('Location: ' . openvbx_mobile_path());
  die;
}
elseif(isset($_POST['email']) && isset($_POST['password'])) {
  $auth = base64_encode($_POST['email'] . ':' . $_POST['password']);
  $result = vbx_request($_SESSION['server'] . '/messages/inbox', array('Authorization' => 'Basic ' . $auth));
  if($result) {
    $_SESSION['auth'] = $auth;
    header('Location: ' . openvbx_mobile_path());
    die;
  }
}
include 'views/login.php';