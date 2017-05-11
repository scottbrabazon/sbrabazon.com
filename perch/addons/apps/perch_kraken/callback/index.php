<?php	

	include(__DIR__	. '/../../../../core/inc/pre_config.php');
    include(__DIR__ . '/../../../../config/config.php');
    
    if (!defined('PERCH_PRODUCTION_MODE')) define('PERCH_PRODUCTION_MODE', PERCH_PRODUCTION);
    
    include(PERCH_CORE . '/inc/loader.php');
    include(__DIR__ .'/../autoloader.php');
    $Perch  = PerchAdmin::fetch();

	$API  = new PerchAPI(1.0, 'perch_kraken');
	$Lang = $API->get('Lang');
	$HTML = $API->get('HTML');

	if (count($_POST) && isset($_POST['id'])) {
		PerchKraken_Image::callback($_POST);
	}