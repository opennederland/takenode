<?php

require_once(__DIR__.'/config/dependency_loader.php');

if(Security::csrf_token_valid($_POST) && !empty($_POST['id']))
{
  $db = Database::get_instance();

  $db->change_query('
    UPDATE `certificates`
    SET `is_published` = 1,
    updated_at = ?
    WHERE `id` = ?
  ', [
    time(),
    $_POST['id']
  ]);
}
