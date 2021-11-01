<?php

class Security
{
  public static function set_csrf_cookie_and_return_token()
  {
    $uuid = !empty($_COOKIE['csrf_token']) ?
      $_COOKIE['csrf_token'] :
      Helper::generate_uuid();

    setcookie('csrf_token', $uuid, time() + 3600, '', '', TRUE, TRUE);

    return $uuid;
  }

  public static function csrf_token_valid($post_values)
  {
    return !empty($_COOKIE['csrf_token']) &&
      !empty($post_values['csrf_token']) &&
      $_COOKIE['csrf_token'] === $post_values['csrf_token'];
  }
}
