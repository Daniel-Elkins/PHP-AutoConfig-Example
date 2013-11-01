<?php
  
  /*
    debug.autoconfig.local.php
    
    This is an example of loading a different configuration for a
    subdomain. In this case, it is a debug subdomain on a local
    development server. You could also have one for production or
    add another configuration file for an admin panel/back-end
    such as admin.autoconfig.com.php or cms.autoconfig.com.php.
  */
  
  #  setup configuration.
  $config = array (
    'title' => 'Local Development Configuration',
    'filename' => __FILE__,
    'site_enabled' => true,
    'debug' => array (
      'enabled' => true,
      'backtraces' => false,
      'level' => 3,
    ),
    'database' => array (
      'engine' => 'mysql',
      'host' => 'localhost',
      'username' => 'root',
      'password' => 'secret',
      'name' => 'autoconfig',
    ),
    'base_url' => 'debug.autoconfig.local',
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
  #    i.e. $GLOBALS['_CONFIG'] = require_once ('debug.autoconfig.local.php');
  return $config;
  
  