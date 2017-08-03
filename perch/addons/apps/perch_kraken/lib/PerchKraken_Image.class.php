<?php

class PerchKraken_Image
{
	private static $table = 'kraken_jobs';

	public static function on_create($Event)
	{
		$Asset = $Event->subject;

		$API = new PerchAPI(1.0, 'perch_kraken');
		$Settings = $API->get('Settings');

		if (!$Settings->get('perch_kraken_api_key')->val()) return;

		$dev = ($Settings->get('perch_kraken_dev_mode')->val() ? true : false);

		$Kraken = new Kraken($Settings->get('perch_kraken_api_key')->val(), $Settings->get('perch_kraken_api_secret')->val());

		$web_path = $Asset->web_path;
		if (strpos($web_path, '://')===false) {
			$web_path = $Settings->get('perch_kraken_url')->val().$Asset->web_path;
		}

		$params = array(
			'dev'          => $dev,
			'url'        => $web_path,
			//'file'         => $Asset->file_path,
			'callback_url' => $Settings->get('perch_kraken_url')->val().PERCH_LOGINPATH.'/addons/apps/perch_kraken/callback/',
			'wait'         => false
		);

		$data = [];
		PerchUtil::debug($params, 'notice');

		$data = $Kraken->url($params);

		PerchUtil::debug($data, 'notice');

		if (isset($data['id'])) {
			self::log_job($API, $data['id'], $Asset);
		}

	}

	public static function log_job($API, $id, $Asset)
	{
		$DB = $API->get('DB');

		$data = array(
			'jobID'     => $id, 
			'file_name' => $Asset->file_name,
			'file_path' => $Asset->file_path
			);

		$DB->insert(PERCH_DB_PREFIX.self::$table, $data);
	}

	public static function callback($data)
	{
		$API = new PerchAPI(1.0, 'perch_kraken');
		$DB = $API->get('DB');
		$table = PERCH_DB_PREFIX.self::$table;

		PerchUtil::debug('Callback.');

		if (isset($data['success']) && $data['success']) {

			PerchUtil::debug('Success is set.');

			$sql = 'SELECT * FROM '.$table.'
					WHERE jobID='.$DB->pdb($data['id']).'
						AND file_name='.$DB->pdb($data['file_name']).'
						AND status='.$DB->pdb('PENDING').'
					LIMIT 1';
			$row = $DB->get_row($sql);

			if (PerchUtil::count($row)) {

				PerchUtil::debug('We have a row.');

				// check the host
				$host = parse_url($data['kraked_url'], PHP_URL_HOST);
				if ($host == 'dl.kraken.io') {
					PerchUtil::debug('Host is good.');

					self::download_file($data['kraked_url'], $row['file_path']);

					PerchUtil::debug('Now update db');

					$DB->update($table, array(
							'status'      => 'COMPLETE',
							'orig_size'   => $data['original_size'],
							'kraked_size' => $data['kraked_size'],
							'saved_bytes' => $data['saved_bytes'],
						), 'jobID', $data['id']);
				}else{
					PerchUtil::debug('Host does not match.');
					PerchUtil::debug($host);
				}
			}else{
				PerchUtil::debug('No db row found.');
			}
		}else{
			PerchUtil::debug('Job is a fail');
			$DB->update($table, array('status'=>'FAILED'), 'jobID', $data['id']);
			return false;
		}
		
	}

	public static function download_file($url, $target) 
	{
		PerchUtil::debug('Downloading file.');
		PerchUtil::debug($url);
		PerchUtil::debug($target);
		$ch = curl_init();
		$timeout = 30;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		
		if ($data) {
			PerchUtil::debug('We have data, writing file');
			file_put_contents($target, $data);
		}
	}

}
