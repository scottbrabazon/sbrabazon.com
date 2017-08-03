<?php

class PerchKraken_Jobs extends PerchAPI_Factory
{
    protected $table     = 'kraken_jobs';
	protected $pk        = 'jobID';
	protected $singular_classname = 'PerchKraken_Job';

    protected $default_sort_column = 'jobCreated';
    protected $default_sort_direction = 'DESC';
	
}
