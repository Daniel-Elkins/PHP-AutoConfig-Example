<?php
  
  /*
    .default.php
    
    Default configuration that gets loaded if no suitable file exists.
    In this case, we will set site_enabled = false since we don't want
    any visitors if the something is wrong and a configuration file
    cannot be located or read.
  */
  
  #  setup configuration.
  $config = array (
    'title' => 'Default Configuration',
    'filename' => __FILE__,
    'site_enabled' => false,
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
    'base_url' => 'localhost',
    'error_reporting' => E_ALL,
    'ini' => array (
      'display_errors' => 'On',
    ),
  );
  
  #  apply any php.ini settings.
  if (count ($config['ini']) > 0)
    foreach ($config['ini'] as $directive => $value)
      ini_set ($directive, $value);
  
  #  return the array to whatever is including this file.
  #    i.e. $GLOBALS['_CONFIG'] = require_once ('.default.php');
  return $config;
  
  