<?php

class Helper
{
  public static function generate_uuid()
  {
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // Set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // Set bits 6-7 to 10

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
  }

  public static function translate($term, $original)
  {
    $translations = [
      'file_type' => [
        'beeld' => 'picture/video',
        'geluid' => 'audio file',
        'tekst' => 'text document'
      ],
      'name' => [
        '(alias)' => 'None'
      ],
      'contact_info' => [
        '' => 'None'
      ]
    ];

    return empty($translations[$term][$original]) ?
      $original :
      $translations[$term][$original];
  }

  public static function get_language()
  {
    $available_languages = unserialize(AVAILABLE_LANGUAGES);

    return !empty($_COOKIE['language']) && in_array($_COOKIE['language'], $available_languages) ?
      $_COOKIE['language'] :
      $available_languages[0];
  }

  function redirect($url, $status_code = 303)
  {
    header('Location: ' . $url, TRUE, $status_code);
    exit;
  }
}
