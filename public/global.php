<?php

error_reporting (E_ALL);

if (version_compare(phpversion(), '5.3.0', '<') == true) {
    die ('PHP5.3 And More');
}

define('SITE_PATH', __DIR__);
define('BASE_PATH', realpath(SITE_PATH . DIRECTORY_SEPARATOR  . '..'));
define('APP_ABSOLUTE_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'app');
define('CORE_ABSOLUTE_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'core');
define('PUBLIC_ABSOLUTE_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'public');
define('APP_RELATIVE_PATH', DIRECTORY_SEPARATOR . 'app');
define('CORE_RELATIVE_PATH', DIRECTORY_SEPARATOR . 'core');
define('PUBLIC_RELATIVE_PATH', DIRECTORY_SEPARATOR . 'public');