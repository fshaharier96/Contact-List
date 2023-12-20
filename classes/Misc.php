<?php
$dir = dirname( __DIR__ );

include_once $dir . "/classes/Config.php";

/**
 * This class is for miscellaneous operations
 */
class Misc {

	public function __construct($name) {
		require_once SITE_ROOT . '/vendor/schuhwerk/php-error-log-viewer/src/LogHandler.php';
		require_once SITE_ROOT . '/vendor/schuhwerk/php-error-log-viewer/src/AjaxHandler.php';



		$settings = [
            'file_path' => SITE_ROOT . '/logs/error_rakib.log',


		];

		$log_handler = new Php_Error_Log_Viewer\LogHandler($settings);
		$ajax_handler = new Php_Error_Log_Viewer\AjaxHandler($log_handler);
		$ajax_handler->handle_ajax_requests($name);
	}
}//end class Misc