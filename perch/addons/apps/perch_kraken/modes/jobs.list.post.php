<?php

    echo $HTML->title_panel([
            'heading' => $Lang->get('Listing recent jobs'),
            ], $CurrentUser);


    $Smartbar = new PerchSmartbar($CurrentUser, $HTML, $Lang);

    $Smartbar->add_item([
        'active' => true,
        'title' => 'Jobs',
        'link'  => '/addons/apps/perch_kraken/',
        'icon'  => 'core/clock',
    ]);

    echo $Smartbar->render();


    $Listing = new PerchAdminListing($CurrentUser, $HTML, $Lang, $Paging);
    $Listing->add_col([
            'title'     => $Lang->get('Date'),
            'value'     => 'jobCreated',
            'sort'      => 'jobCreated',
            'format'    => ['type'=>'date', 'format'=>PERCH_DATE_SHORT.' '.PERCH_TIME_SHORT],
        ]);

    $Listing->add_col([
            'title'     => $Lang->get('File'),
            'value'     => 'file_name',
            'sort'      => 'file_name',
        ]);

    $Listing->add_col([
            'title'     => $Lang->get('Status'),
            'value'     => 'status',
            'sort'      => 'status',
        ]);

    $Listing->add_col([
            'title'     => $Lang->get('Original size'),
            'value'     => function($Item) {
                return PerchUtil::format_file_size($Item->orig_size());
            },
            'sort'      => 'orig_size',
        ]);

    $Listing->add_col([
            'title'     => $Lang->get('New size'),
            'sort'      => 'kraked_size',
            'value'     => function($Item) {
                return PerchUtil::format_file_size($Item->kraked_size());
            },
        ]);

    $Listing->add_col([
            'title'     => $Lang->get('Saving'),
            'sort'      => 'saved_bytes',
            'value'     => function($Item) {
                return PerchUtil::format_file_size($Item->saved_bytes());
            },

        ]);

    echo $Listing->render($jobs);

