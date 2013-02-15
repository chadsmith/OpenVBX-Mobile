<?php
session_start();
function headerize($fields = array(), $headers = array()) {
	foreach($fields as $k => $v)
		$headers[] = $k . ': ' . $v;
	return $headers;
}
function vbx_request($url, $headers = null, $post = null) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  $headers = array_merge((array) $headers, array('Accept' => 'application/json'));
  curl_setopt($ch, CURLOPT_HTTPHEADER, headerize($headers));
	if(is_array($post)) {
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	}
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $res = json_decode(curl_exec($ch));
  curl_close($ch);
  return $res;
}
function openvbx_mobile_path($path = '/') {
  return dirname($_SERVER['SCRIPT_NAME']) . $path;
}
function require_login() {
  if(empty($_SESSION['server'])) {
    header('Location: ' . openvbx_mobile_path());
    die;
  }
  if(empty($_SESSION['auth'])) {
    header('Location: ' . openvbx_mobile_path('/login'));
    die;
  }
  if(empty($_SESSION['device'])) {
    header('Location: ' . openvbx_mobile_path('/settings'));
    die;
  }
}
