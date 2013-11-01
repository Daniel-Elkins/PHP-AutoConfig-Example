<?php
  
  require_once ('../include/bootstrap.php');  
  
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link href="//fonts.googleapis.com/css?family=Roboto:400,300,100" rel="stylesheet" />
    <style>
      @charset "utf-8";
      
      body {
        font-family: "Roboto", "Calibri", "Segoe UI", "Segoe", "Trebuchet MS", "Trebuchet", sans-serif;
        font-size: 16px;
        margin: 2em 5em;
        line-height: 1.6em;
      }
      
      h1, h2, h3, h4, h5, h6 {
        font-weight: 300;
      }
      
      .pre-box {
        white-space: pre;
        display: block;
        overflow: scroll;
        border: 1px solid #dedede;
        font-family: monospace;
      }
      
      #box-current-config {
        width: 80%;
        height: 250px;
        font-size: 12px;
      }
      
      table {
        border-collapse: collapse;
        border: 1px solid #dedede;
      }
      
      th, td {
        padding: 3px;
      }
      
      th {
        text-align: left;
      }
      
      td.label {
        display: table-cell;
        background-color: #e0e0e0;
        font-weight: 600;
      }
      
      .child {
        margin-left: 1.5em;
      }
      
    </style>
    <title>
      PHP Secure Auto-Config
    </title>
  </head>
  <body>
    <div class="document">
      <section class="document-header">
        <header>
          <h1 class="document-title">
            <a href="<?= $_SERVER['PHP_SELF'] ?>">
              PHP Secure Auto-Config
            </a>
          </h1>
        </header>
      </section>
      
      <section class="document-body">
        <header class="section-header">
          <h2>
            Configuration being used:
          </h2>          
        </header>
        <table>
          <tbody>
            <tr>
              <td class="label">
                Title:
              </td>
              <td>
                <?= text ($GLOBALS['_CONFIG']['title'], 'N/A') ?>
              </td>
            </tr>
            <tr>
              <td class="label">
                Filename:
              </td>
              <td>
                <?= text (basename ($GLOBALS['_CONFIG']['filename']), 'N/A') ?>
              </td>
            </tr>
            <tr>
              <td class="label">
                File path:
              </td>
              <td>
                <?= text ($GLOBALS['_CONFIG']['filename'], 'N/A') ?>
              </td>
            </tr>
            <tr>
              <td class="label">
                Base Url:
              </td>
              <td>
                <?= text ($GLOBALS['_CONFIG']['base_url'], 'N/A') ?>
              </td>
            </tr>
          </tbody>
        </table>
        
        <section class="child" id="config-raw">
          <header>
            <h3 class="section-header">
              Raw config data
            </h3>
          </header>
          <div class="pre-box" id="box-current-config"><?= print_r ($GLOBALS['_CONFIG'], true) ?></div>
        </section>
        
      </section>
      <!-- // .document-body -->
      
    </div>
  </body>
</html>