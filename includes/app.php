<?php declare(strict_types=1);

use Model\ActiveRecord;

require 'functions.php';
require 'config/database.php';
require '../vendor/autoload.php';

ActiveRecord::setDB($db);