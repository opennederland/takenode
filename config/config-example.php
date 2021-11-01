<?php

date_default_timezone_set('Europe/Amsterdam');

define('ENVIRONMENT', 'development');
define('VERSION', '20211101-1614');
define('BASE_URL', ENVIRONMENT == 'development' ? 'http://localhost/' : 'https://takenode.org/');
define('AVAILABLE_LANGUAGES', serialize(['nl', 'en']));

define('DATABASE_CONNECTION', 'mysql:dbname=takenode;host=localhost');
define('DATABASE_USER', 'takenode');
define('DATABASE_PASSWORD', 'password');
define('DATABASE_OPTIONS', serialize([PDO::ATTR_EMULATE_PREPARES => FALSE]));
