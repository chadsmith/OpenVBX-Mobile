<?php
require 'core.php';
require_login();
if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['content'])) {
  $result = vbx_request($_SESSION['server'] . '/messages/sms', array('Authorization' => 'Basic ' . $_SESSION['auth']), array(
    'from' => $_POST['from'],
    'to' => $_POST['to'],
    'content' => $_POST['content']
  ));
  if($result && !$result->error)
    $status = 'Message sent.';
}
$callerids = vbx_request($_SESSION['server'] . '/numbers/outgoingcallerid', array('Authorization' => 'Basic ' . $_SESSION['auth']));
foreach($callerids as $id => $callerid)
  if(!$callerid->capabilities->sms)
    unset($callerids[$id]);
$from = isset($_GET['from']) ? str_replace('+', '', $_GET['from']) : '';
$to = isset($_GET['to']) ? str_replace('+', '', $_GET['to']) : '';
include 'views/sms.php';
