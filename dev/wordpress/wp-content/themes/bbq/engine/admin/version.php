<?php
/**
 * Table of Contents (version.php)
 *
 *	- nice_framework_version_init()
 *	- nice_framework_get_latest_version()
 *	- niceupdates()
 *	- nice_framework_silent_update()
 *	- nice_version_check()
 *  - nice_version_notice()
 *  - nice_schedule_version_check()
 *
 */

/**
 * nice_framework_version_init()
 *
 * Init version. If the framework has been updated,
 * update nice_framework_option to current version
 * stored in $version.
 *
 * @since 1.0.0
 *
 */
function nice_framework_version_init()
{
    $version = '1.0.4';
    if ( get_option( 'nice_framework_version' ) != $version )	update_option( 'nice_framework_version', $version );
}

add_action( 'init', 'nice_framework_version_init', 10 );

/**
 * nice_framework_get_latest_version()
 *
 * Get remote framework version.
 *
 * @since 1.0.0
 *
 */
function nice_framework_get_latest_version()
{

	require_once( ABSPATH . "wp-admin" . '/includes/image.php' );
    require_once( ABSPATH . "wp-admin" . '/includes/file.php' );
    require_once( ABSPATH . "wp-admin" . '/includes/media.php' );
	if ( is_admin() ){

		if( isset ( $_REQUEST['page']) && ( strip_tags( trim( $_REQUEST['page'] ) ) == 'niceupdates' ) ){

			$url = 'http://updates.nicethemes.com/framework/changelog.txt';

			$temp_file_addr = download_url( $url );

			if( ! is_wp_error( $temp_file_addr ) && $file_contents = file( $temp_file_addr ) ) {
				foreach ( $file_contents as $line_num => $line ) {
					$current_line =  $line;

					if( $line_num > 1 ) {

						if ( preg_match( '/^[=]/', $line ) ) {

								// only with php > 5 //stristr( $current_line, '( ', true );
								$current_line = substr( $current_line , 0, strpos( $current_line, '(' )); // compatible with php4
								$current_line = preg_replace( '~[^0-9,.]~','', $current_line );
								$output['version'] = $current_line;
								break;
						}
					}
				}
				unlink( $temp_file_addr );
				update_option( 'nice_framework_remote_version', $output['version'] );
			}else{
				$output['version'] = get_option( 'nice_framework_version' );
			}

			return $output;
		}
	}
}

/**
 * niceupdates()
 *
 * Updates panel. Check if there's an available update.
 * Show the form so the user can update his framework version.
 *
 * @since 1.0.0
 *
 */
function niceupdates()
{
	echo '<div id="nice-container">';

	echo '<h1>Nice Updates</h1>';

	$current_version = get_option( 'nice_framework_version' );
	$latest_version = nice_framework_get_latest_version();
	$latest_version = $latest_version['version'];

	$method = get_filesystem_method();

    $to = ABSPATH . 'wp-content/themes/' . get_option( 'template' ) . '/engine/';
    if( isset( $_POST['password'] ) ){

            $cred = $_POST;
            $filesystem = WP_Filesystem( $cred );

    }
    elseif( isset ( $_POST['nice_ftp_credentials'])){

             $cred = unserialize( base64_decode( $_POST['nice_ftp_credentials'] ) );
             $filesystem = WP_Filesystem( $cred );

    } else {

           $filesystem = WP_Filesystem();

    }

	$url = admin_url( 'admin.php?page=niceupdates' );

	if( $filesystem == false){

            request_filesystem_credentials ( $url );

    }  else {

			// update needed
			if (version_compare( $latest_version, $current_version )){

				?>
				<form id="niceupdates" method="post">
				<input type="hidden" name="nice_ftp_credentials" value="<?php echo esc_attr( base64_encode( serialize( $_POST ) ) ); ?>" />
                <input type="hidden" name="nice_action" value="update" />

                <h3>There's a new Framework version(<?php echo$latest_version ;?>) available, please update.</h3>

				<p>By clicking the &quot;Update&quot; button, our latest NiceFramework will be downloaded and extracted to your current theme's /engine/ folder.<br />
				Please make a backup copy of your theme files and update WordPress to its latest version before updating the Framework.</p>
				<p>Update your version now to ensure continued improvements and bug fixing.</p>

				<input type="submit" value="Update  &rarr;" class="button button-highlighted"  />



				</form>
				<br />
				<em>NOTE: Please make sure your theme folder is writable</em>
				<?php

			}else { ?>
						<h3>Yey, Nice! Your NiceThemes framework is up to date.</h3>
						<p><strong>Your Framework version for this site:</strong> <?php echo $current_version; ?></p>
			<?php }

	}

	echo '</div>';
}

/**
 * nice_framework_silent_update()
 *
 * grab the last framework update and unzip it.
 *
 * @since 1.0.0
 *
 */
function nice_framework_silent_update()
{

	if ( isset( $_REQUEST['page'] ) ){

	if( strtolower( strip_tags( trim( $_REQUEST['page'] ) ) ) == 'niceupdates' )
	{
		//Setup Filesystem
		$method = get_filesystem_method();

		if( isset( $_POST['nice_ftp_credentials'] ) ){

			$cred = unserialize( base64_decode( $_POST['nice_ftp_credentials']));
			$wpfs = WP_Filesystem( $cred);

		} else {

		   $wpfs = WP_Filesystem();

		};

		if( $wpfs == false){

				function nice_framework_update_filesystem_warning() {
					$method = get_filesystem_method();
					echo "<div id='filesystem-warning' class='updated fade'><p>Failed: Filesystem preventing downloads. ( ". $method .")</p></div>";
				}
				add_action( 'admin_notices', 'nice_framework_update_filesystem_warning' );
				return;
		}
		if( isset ( $_REQUEST['nice_action'])){

		if( strtolower( trim( strip_tags( $_REQUEST['nice_action'] ) ) ) == 'update' ){

		$temp_file_addr = download_url( 'http://updates.nicethemes.com/framework/framework.zip' );

		if ( is_wp_error( $temp_file_addr) ) {

			$error = $temp_file_addr->get_error_code();

			if( $error == 'http_no_url' ) {
			//The source file was not found or is invalid
				function nice_framework_update_missing_source_warning() {
					echo "<div id='source-warning' class='updated fade'><p>Failed: Invalid URL Provided</p></div>";
				}
				add_action( 'admin_notices', 'nice_framework_update_missing_source_warning' );
			} else {
				function nice_framework_update_other_upload_warning() {
					echo "<div id='source-warning' class='updated fade'><p>Failed: Upload - $error</p></div>";
				}
				add_action( 'admin_notices', 'nice_framework_update_other_upload_warning' );

			}

			return;

		  }
		//Unzip it
		global $wp_filesystem;
		$to = $wp_filesystem->wp_content_dir() . "/themes/" . get_option( 'template' ) . "/engine/";

		$dounzip = unzip_file( $temp_file_addr, $to);

		unlink( $temp_file_addr); // Delete Temp File

		if ( is_wp_error( $dounzip) ) {

			//DEBUG
			$error = $dounzip->get_error_code();
			$data = $dounzip->get_error_data( $error);

			if( $error == 'incompatible_archive' ) {
				//The source file was not found or is invalid
				function nice_framework_update_no_archive_warning() {
					echo "<div id='nice-no-archive-warning' class='updated fade'><p>Failed: Incompatible archive</p></div>";
				}
				add_action( 'admin_notices', 'nice_framework_update_no_archive_warning' );
			}
			if( $error == 'empty_archive' ) {
				function nice_framework_update_empty_archive_warning() {
					echo "<div id='nice-empty-archive-warning' class='updated fade'><p>Failed: Empty Archive</p></div>";
				}
				add_action( 'admin_notices', 'nice_framework_update_empty_archive_warning' );
			}
			if( $error == 'mkdir_failed' ) {
				function nice_framework_update_mkdir_warning() {
					echo "<div id='nice-mkdir-warning' class='updated fade'><p>Failed: mkdir Failure</p></div>";
				}
				add_action( 'admin_notices', 'nice_framework_update_mkdir_warning' );
			}
			if( $error == 'copy_failed' ) {
				function nice_framework_update_copy_fail_warning() {
					echo "<div id='nice-copy-fail-warning' class='updated fade'><p>Failed: Copy Failed</p></div>";
				}
				add_action( 'admin_notices', 'nice_framework_update_copy_fail_warning' );
			}

			return;

		}

		function nice_framework_updated_success() {
			echo "<div id='framework-upgraded' class='updated fade'><p>New framework successfully downloaded, extracted and updated.</p></div>";
		}

		add_action( 'admin_notices', 'nice_framework_updated_success' );

		}
		}
	}
	}

}

add_action( 'admin_head','nice_framework_silent_update' );

/**
 * nice_version_check()
 *
 * Check the remote framework changelog
 * for updates.
 *
 * @since 1.0.0
 *
 * @return (str) remote_version
 *
 */
function nice_version_check( $args )
{
	$current_version = get_option( 'nice_framework_version' );

	$url = 'http://updates.nicethemes.com/framework/changelog.txt';

	$temp_file_addr = download_url( $url );
	if( ! is_wp_error( $temp_file_addr ) && $file_contents = file( $temp_file_addr ) ) {
        foreach ( $file_contents as $line_num => $line ) {
            $current_line =  $line;

            if( $line_num > 1 ) {    // Not the first or second... dodgy :P

                if ( preg_match( '/^[=]/', $line ) ) {

						// only with php > 5 //stristr( $current_line, '( ', true );
                        $current_line = substr( $current_line , 0, strpos( $current_line, '( ' )); // compatible with php4
                        $current_line = preg_replace( '~[^0-9,.]~','', $current_line );
                        $output['version'] = $current_line;
                        break;
                }
            }
        }
        unlink( $temp_file_addr );
    }else{
		$output['version'] = get_option( 'nice_framework_version' );
	}

	$msg = 'New Framework version <strong>( ' . $output['version'] . ' )</strong> ready to be installed. <a href="' . admin_url( 'admin.php?page=niceupdates' ). '">Click here</a>';
	update_option( 'nice_framework_updates', $msg );
	update_option( 'nice_framework_remote_version', $output['version'] );
}

add_action( 'nice_cron_version_check', 'nice_version_check' );

/**
 * nice_version_notice()
 *
 * display a notice if the framework needs to be updated
 *
 * @since 1.0.0.0
 *
 */
function nice_version_notice()
{
	// display a notice if the framework need an update
	/*$msg = get_option( 'nice_framework_updates' );
	if (!empty( $msg)) echo "<div class='update-nag'>".$msg."</div>";*/

}
//add_action( 'admin_notices', 'nice_version_notice', 5 );

/**
 * nice_schedule_version_check()
 *
 * Schedule a framework version check. (weekly)
 *
 * @since 1.0.0
 *
 */
function nice_schedule_version_check() {
	if ( !wp_next_scheduled( 'nice_cron_version_check' ) ) {

		$latest_version = nice_framework_get_latest_version();
		$latest_version = $latest_version['version'];

		wp_schedule_event( time(), 'weekly', 'nice_cron_version_check', array( 'current'=>get_option( 'nice_framework_version' ), 'latest' => $latest_version ) );
	}
}

// uncomment for this check to start working
add_action( 'init', 'nice_schedule_version_check' );

?>