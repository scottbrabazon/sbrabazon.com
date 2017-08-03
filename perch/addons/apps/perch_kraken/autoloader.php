<?php
	spl_autoload_register(function($class_name){
        if (strpos($class_name, 'PerchKraken')===0 || $class_name === 'Kraken') {
    		include(PERCH_PATH.'/addons/apps/perch_kraken/lib/'.$class_name.'.class.php');
    		return true;
    	}
    	return false;
    });