<?php

require_once(__DIR__.'/config/dependency_loader.php');

$available_languages = unserialize(AVAILABLE_LANGUAGES);

if(!empty($_GET['language']) && in_array($_GET['language'], $available_languages))
{
  setcookie('language', $_GET['language'], time() + 5 * 365 * 24 * 60 * 60 , '', '', TRUE, TRUE);
}

if(!empty($_SERVER['HTTP_REFERER']))
{
  Helper::redirect($_SERVER['HTTP_REFERER']);
}

Helper::redirect(BASE_URL);
