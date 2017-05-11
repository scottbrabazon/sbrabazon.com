<?php
    // Prevent running directly:
    if (!defined('PERCH_DB_PREFIX')) exit;

    // Let's go
    $sql = "
    CREATE TABLE IF NOT EXISTS `__PREFIX__kraken_jobs` (
        `jobID` char(32) NOT NULL DEFAULT '',
        `jobCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `file_name` char(255) NOT NULL,
        `file_path` text NOT NULL,
        `status` enum('PENDING','COMPLETE','FAILED') NOT NULL DEFAULT 'PENDING',
        `orig_size` int(10) unsigned NOT NULL DEFAULT '0',
        `kraked_size` int(10) unsigned NOT NULL DEFAULT '0',
        `saved_bytes` int(10) unsigned NOT NULL DEFAULT '0',
        PRIMARY KEY (`jobID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

    ";
    
    $sql = str_replace('__PREFIX__', PERCH_DB_PREFIX, $sql);
    
    $statements = explode(';', $sql);
    foreach($statements as $statement) {
        $statement = trim($statement);
        if ($statement!='') $this->db->execute($statement);
    }
 