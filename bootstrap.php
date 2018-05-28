<?php 

require "vendor/autoload.php";

use app\classes\Bind;
use app\models\Connection
;
// require "app/functions/helpers.php"; //Tá sendo requisitado no composer.json
$config = require "config.php";

Bind::set('config', $config);
Bind::set('connection', Connection::connect());