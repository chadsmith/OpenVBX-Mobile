<?php
require 'core.php';
require_login();
$id = intval($_GET['id']);
if(isset($_POST['status'])) {
  $result = vbx_request($_SESSION['server'] . '/messages/details/' . $id, array('Authorization' => 'Basic ' . $_SESSION['auth']), array(
    'ticket_status' => $_POST['status']
  ));
}
if(isset($_POST['assigned'])) {
  $result = vbx_request($_SESSION['server'] . '/messages/details/' . $id, array('Authorization' => 'Basic ' . $_SESSION['auth']), array(
    'assigned' => $_POST['assigned']
  ));
}
if(isset($_POST['description'])) {
  $result = vbx_request($_SESSION['server'] . '/messages/details/' . $id . '/annotations', array('Authorization' => 'Basic ' . $_SESSION['auth']), array(
    'annotation_type' => 'noted',
    'description' => $_POST['description']
  ));
}
if(isset($_GET['archive'])) {
  $result = vbx_request($_SESSION['server'] . '/messages/details/' . $id, array('Authorization' => 'Basic ' . $_SESSION['auth']), array(
    'archived' => 'true'
  ));
  header('Location: ' . openvbx_mobile_path());
  die;
}
$message = vbx_request($_SESSION['server'] . '/messages/details/' . $id, array('Authorization' => 'Basic ' . $_SESSION['auth']));
if(empty($message)) {
  header('Location: ' . openvbx_mobile_path());
  die;
}
$statuses = array('open' => 'Open', 'closed' => 'Closed', 'pending' => 'Pending');
include 'views/message.php';
