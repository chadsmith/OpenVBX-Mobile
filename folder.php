<?php
require 'core.php';
require_login();
$id = intval($_GET['id']);
$folder = vbx_request($_SESSION['server'] . '/messages/inbox/' . $id, array('Authorization' => 'Basic ' . $_SESSION['auth']));
$today = strtotime('today');
$yesterday = strtotime('yesterday');
include 'views/folder.php';
