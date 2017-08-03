<?php
	$Paging->set_per_page(24);

	$Jobs   = new PerchKraken_Jobs($API);
	$jobs   = $Jobs->all($Paging);

	if (!PerchUtil::count($jobs)) {
		$Jobs->attempt_install();
	}

