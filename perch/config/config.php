<?php
    define('PERCH_LICENSE_KEY', 'P21503-CWQ772-WGA970-KGL555-LYK010');

    define("PERCH_DB_USERNAME", 'scottbra_perch');
    define("PERCH_DB_PASSWORD", 'S0n1cB00m');
    define("PERCH_DB_SERVER", "localhost");
    define("PERCH_DB_DATABASE", "scottbra_perch_db");
    define("PERCH_DB_PREFIX", "perch3_");
    
    define('PERCH_TZ', 'UTC');

    define('PERCH_EMAIL_FROM', 'hello@sbrabazon.com');
    define('PERCH_EMAIL_FROM_NAME', 'Scott Brabazon');

    define('PERCH_EMAIL_METHOD', 'smtp');
    define('PERCH_EMAIL_HOST', 'mail.sbrabazon.com');
    define('PERCH_EMAIL_AUTH', TRUE);
    define('PERCH_EMAIL_SECURE', 'ssl');
    define('PERCH_EMAIL_PORT', 465);
    define('PERCH_EMAIL_USERNAME', 'hello@sbrabazon.com');
    define('PERCH_EMAIL_PASSWORD', 'S0n1cB00m');

    define('PERCH_LOGINPATH', '/perch');
    define('PERCH_PATH', str_replace(DIRECTORY_SEPARATOR.'config', '', __DIR__));
    define('PERCH_CORE', PERCH_PATH.DIRECTORY_SEPARATOR.'core');

    define('PERCH_RESFILEPATH', PERCH_PATH . DIRECTORY_SEPARATOR . 'resources');
    define('PERCH_RESPATH', PERCH_LOGINPATH . '/resources');
    
    define('PERCH_HTML5', true);

    define('PERCH_RWD', true); 
