<?php
  
  /*
    autoconfig.com.php
    
    Since this has a .com suffix, it is an example of a configuration
    that would be used on your live/production server. You would want
    many settings to be different such as display_errors being turned
    off and possibly error_reporting to (E_ALL | ~E_NOTICES) so that
    notices aren't logged (they should be tested for and resolved in
    the development stage).
  */
  
  #  setup configuration.
  $config = array (
    'title' => 'Production Configuration',
    'filename' => __FILE__,
    'site_enabled' => true,
    'debug' => array (
      'enabled' => false,
      'backtraces' => false,
      'level' => 0,
    ),
    'database' => array (
      'engine' => 'mysql',
      'host' => 'localhost',
      'username' => 'root',
      'password' => 'secret',
      'name' => 'autoconfig',
    ),
    'base_url' => 'autoconfig.com',
    'error_reporting' => E_ALL,
    'ini' => array (
      'display_errors' => 'Off',
    ),
  );
  
  #  apply any php.ini settings.
  if (count ($config['ini']) > 0)
    foreach ($config['ini'] as $directive => $value)
      ini_set ($directive, $value);
  
  #  return the array to whatever is including this file.
  #    i.e. $GLOBALS['_CONFIG'] = require_once ('autoconfig.com.php');
  return $config;
  
  