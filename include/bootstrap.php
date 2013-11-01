<?php
  
  ini_set ('display_errors', 'On');
  error_reporting (E_ALL);
  
  $GLOBALS['_CONFIG'] = null;
  
  function text ($text, $default = null, $return = true, $charset = 'utf-8')
  {
    $which = strlen ($text) > 0 ? 'text' : 'default';
    
    if (strlen ($$which) > 0)
    
      if (true === $return)
        return htmlspecialchars ($$which, ENT_QUOTES, $charset);
      else
        echo htmlspecialchars ($$which, ENT_QUOTES, $charset);
  }
  
  function diePage ($message, $title = 'Fatal Error', $heading = 'Fatal Error')
  {
    return
      '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8" />' .
      '<link href="//fonts.googleapis.com/css?family=Roboto:400,300,100" rel="stylesheet" />' .
      '<title>' . text ($title, 'Fatal Error') . '</title></head><body><div class="document">' .
      '<section class="document-header"><header><h1 class="document-title"><a href="/">' .
      text ($title, 'Fatal Error') . '</a></h1></header></section><section class="document-body">' .
      '<header class="section-header"><h2>' . text ($heading, 'Unknown error has occurred') . '</h2></header>' .
      '<p>' . text ($message, 'No details about the error are available, please try again later.') .
      '</p></section></body></html>';
  }
  
  
  
  #  Include the auto-config library.
  require_once ('autoconfig.lib.php');
  
  #  Get the appropriate configuration file.
  use AutoConfig as ac;
  
  $cfgFile = ac\getConfigFilename ();
  
  #  If it doesn't exist then something went very wrong! Exit.
  if (false === ($configPath = realpath ('../private/conf/' . $cfgFile)))
    die (diePage ('Unable to locate the configuration file with the name `' . $cfgFile . '`.'));
  
  #  Load the configuration file which should make _CONFIG an array.
  $GLOBALS['_CONFIG'] = require_once ($configPath);
  
  if (!is_array ($GLOBALS['_CONFIG']))
    die (diePage ('Invalid configuration file (`' . $cfgFile . '`).'));
  