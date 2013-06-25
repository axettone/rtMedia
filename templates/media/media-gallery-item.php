<?php

	/** That's all, stop editing from here * */
	if ( ! defined( 'WP_LOAD_PATH' ) ) {
		/** classic root path if wp-content and plugins is below wp-config.php */
		$classic_root = dirname( dirname( dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) ) ) . '/';

			//$classic_root = dirname(dirname(dirname(dirname(dirname(dirname(__FILE__)))))) . '/' ;
		if ( file_exists( $classic_root . 'wp-load.php' ) )
			define( 'WP_LOAD_PATH', $classic_root );
		else
		if ( file_exists( $path . 'wp-load.php' ) )
			define( 'WP_LOAD_PATH', $path );
		else
			exit( "Could not find wp-load.php" );

		// let's load WordPress
		require_once( WP_LOAD_PATH . 'wp-load.php');
	}

	global $rt_media_backbone;
	$rt_media_backbone = false;
	if(isset($_POST['backbone']))
		$rt_media_backbone = $_POST['backbone'];
?>
<li class="rt-media-list-item">
    <div class="rt-media-item-thumbnail">
        <a href ="<?php rt_media_permalink(); ?>">
            <img src="<?php rt_media_image(); ?>" >
        </a>
    </div>

    <div class="rt-media-item-title">
        <h4 title="<?php echo rt_media_title(); ?>">
            <?php do_action('rtmedia_before_item', rt_media_id()); ?>
            <a href="<?php rt_media_permalink(); ?>">
                <?php echo rt_media_title(); ?>
            </a>
            <?php do_action('rtmedia_after_item', rt_media_id()); ?>
        </h4>
    </div>

    <div class="rt-media-item-actions">
        <?php rt_media_actions(); ?>
    </div>
</li>