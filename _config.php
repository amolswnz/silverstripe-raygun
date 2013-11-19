<?php

if(defined('SS_RAYGUN_APP_KEY')) {
	$raygun = new RaygunLogWriter(SS_RAYGUN_APP_KEY);
	SS_Log::add_writer($raygun);

	// Disabled for now pending changes to SS Framework to allow for exception-handling override
	//$originalExceptionHandler = set_exception_handler(array($raygun, 'exception_handler'));
	//$raygun->setPostExceptionCallback($originalExceptionHandler);
} else {
	if(Director::isLive()) {
		user_error("SilverStripe RayGun module installed, but SS_RAYGUN_APP_KEY not defined in _ss_environment.php", E_USER_WARNING);
	}
}
