<?php
require 'core.php';
require_login();
if(isset($_POST['callerid']) && isset($_POST['to'])) {
  $result = vbx_request($_SESSION['server'] . '/messages/call', array('Authorization' => 'Basic ' . $_SESSION['auth']), array(
    'callerid' => $_POST['callerid'],
    'from' => $_SESSION['device'],
    'to' => $_POST['to']
  ));
  if($result && !$result->error)
    $status = 'Calling...';
}
$callerids = vbx_request($_SESSION['server'] . '/numbers/outgoingcallerid', array('Authorization' => 'Basic ' . $_SESSION['auth']));
$from = isset($_GET['from']) ? str_replace('+', '', $_GET['from']) : '';
$to = isset($_GET['to']) ? str_replace('+', '', $_GET['to']) : '';
include 'views/dialer.php';
