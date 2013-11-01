<?php
  
  /*
    autoconfig.local.php
    
    Since this has a .local suffix, it is an example of a configuration
    that would be used on your local/development server. You would want
    many settings to be different such as error_reporting set to E_ALL
    so that you can see and resolve E_NOTICES and other errors, or have
    display_errors turned on so errors are shown.
  */
  
  #  setup configuration.
  $config = array (
    'title' => 'Local Development Configuration',
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
    'base_url' => 'autoconfig.local',
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
  #    i.e. $GLOBALS['_CONFIG'] = require_once ('autoconfig.local.php');
  return $config;
  
  