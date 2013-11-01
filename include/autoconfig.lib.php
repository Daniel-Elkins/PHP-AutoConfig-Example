<?php
  
  namespace AutoConfig;
  
  #  gets the name of the configuration file to load
  #  based on Apache's SeverName directive, or if not present,
  #  then the Host: field in the client's HTTP request header.
  function getConfigFilename ()
  {
    $domain = empty ($_SERVER['SERVER_NAME']) ?
      $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
    
    $domain = urldecode ($domain);
    if (empty ($domain))
      return '.default.php';
    
    if (0 === strcasecmp (substr ($domain, 0, 7), 'http://'))
      $domain = substr ($domain, 7);
    
    if (0 === strcasecmp (substr ($domain, 0, 8), 'https://'))
      $domain = substr ($domain, 8);
    
    if (0 === strcasecmp (substr ($domain, 0, 4), 'www.'))
      $domain = substr ($domain, 4);
    
    return empty ($domain) ? '.default.php' : (strtolower ($domain) . '.php');
  }