<?php
require 'core.php';
if(empty($_SESSION['server'])) {
  header('Location: ' . openvbx_mobile_path());
  die;
}
elseif(empty($_SESSION['auth'])) {
  header('Location: ' . openvbx_mobile_path('/login'));
  die;
}
if(isset($_POST['device'])) {
  $_SESSION['device'] = preg_replace('/\D/', '', $_POST['device']);
  header('Location: ' . openvbx_mobile_path());
  die;
}
include 'views/settings.php';
