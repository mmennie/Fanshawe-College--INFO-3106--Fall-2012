<?php

defined('IN_APPLICATION') or exit;

ini_set('display_errors', 'on');
error_reporting(E_ALL | E_STRICT);

require_once 'library/Object.php';

/* Include shape files. No need to include Shape.php as it is included in these files */
require_once 'library/shapes/Square.php';
require_once 'library/shapes/Pentagon.php';
require_once 'library/shapes/Triangle.php';