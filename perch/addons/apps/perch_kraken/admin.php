<?php

if ($CurrentUser->logged_in()) {
    $this->register_app('perch_kraken', 'Kraken', 1, 'Image optimisation', '1.1');
    $this->require_version('perch_kraken', '3.0');

    $this->add_setting('perch_kraken_api_key', 'API key', 'text', '');
    $this->add_setting('perch_kraken_api_secret', 'API Secret', 'text', '');

    $default_callback = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'];

    $this->add_setting('perch_kraken_url', 'Image base URL', 'text', $default_callback);
    $this->add_setting('perch_kraken_dev_mode', 'Mode', 'select', '', array(
            array('label'=>'Production', 'value'=>''),
            array('label'=>'Development', 'value'=>'1'),
        ));

    include('autoloader.php');

    include(__DIR__.'/events.php');

}