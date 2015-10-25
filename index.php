<?php


require_once('controller/masterController.php');
require_once('controller/uploadController.php');
require_once('controller/viewController.php');

require_once('model/uploadModel.php');

require_once('view/imageView.php');
require_once('view/layoutView.php');
require_once('view/uploadView.php');


error_reporting(E_ALL);
ini_set('display_errors', 'On');

$mc = new masterController();
