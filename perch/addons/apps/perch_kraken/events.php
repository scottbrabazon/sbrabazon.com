<?php
	$API = new PerchAPI(1.0, 'perch_kraken');

	$API->on('assets.create_image', 'PerchKraken_Image::on_create');
