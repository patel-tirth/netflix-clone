<?php
require_once("includes/header.php");
require_once("includes/config.php");

$preview = new PreviewProvider($con , $userLoggedIn);

echo $preview->createTvShowPreviewVideo();

$containers = new CategoryContainers($con , $userLoggedIn);

echo $containers->showTvShowCategories();

?>      