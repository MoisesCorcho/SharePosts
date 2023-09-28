<?php

// Load Config
require_once 'config/config.php';

// Load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

//Load Libraries
//  require_once 'libraries/Controller.php';
//  require_once 'libraries/Core.php';
//  require_once 'libraries/Database.php';

/**
 * This function automatize the lines above,  this function require the scripts inside the path that we specied
 * in this case, the libraries
 */

 // Autoload Core Libraries
 spl_autoload_register(function($className) {
    require_once 'libraries/'. $className .'.php';
 });