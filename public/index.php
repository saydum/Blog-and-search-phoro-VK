<?php
include '../dd.php';
require '../vendor/autoload.php';
$config = include '../config/config.php';





$wrapperContainerBuilder = new App\models\WrapperContainerBuilder;

$container = $wrapperContainerBuilder->containerBlogPanel();


include '../config/routs.php';



