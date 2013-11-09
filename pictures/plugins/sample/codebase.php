<?php
/*************************
  Coppermine Photo Gallery
  ************************
  Copyright (c) 2003-2008 Dev Team
  v1.1 originally written by Gregory DEMAR

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License version 3
  as published by the Free Software Foundation.

  ********************************************
  Coppermine version: 1.4.19
  $HeadURL: https://coppermine.svn.sourceforge.net/svnroot/coppermine/trunk/cpg1.4.x/plugins/sample/codebase.php $
  $Revision: 4392 $
  $Author: gaugau $
  $Date: 2008-04-16 09:25:35 +0200 (Mi, 16 Apr 2008) $
**********************************************/

if (!defined('IN_COPPERMINE')) die('Not in Coppermine...');

// Add an install action
$thisplugin->add_action('plugin_install','sample_install');

// Add a configure action
$thisplugin->add_action('plugin_configure','sample_configure');

// Add a filter for the gallery header
$thisplugin->add_filter('gallery_header','sample_header');

$thisplugin->add_filter('plugin_block','sample_block_mgr');


// Sample function to modify gallery header html
function sample_header($html) {
    global $thisplugin;
    $return = '<p style="color:red;"><b>This is sample data returned from plugin "'.$thisplugin->name.'".</b></p>'.$html;
    return $return;
}

function sample_block_mgr($block) {
    return $block;
}


// Install function
// Checks if uid is 'foo' and pwd is 'bar'; If so, then install the plugin
function sample_install() {

    // Install
    if ($_POST['uid']=='foo' && $_POST['pwd']=='bar') {

        return true;

    // Loop again
    } else {

        return 1;
    }
}

// Configure function
// Displays the form
function sample_configure() {
    echo <<< EOT
    <form name="cpgform" id="cpgform" action="{$_SERVER['REQUEST_URI']}" method="post">
            <table border="0" cellspacing="0" cellpadding="0" width="100%">
              <tr>
                <td class="tableh2" colspan="2">
                  <h3>Enter the username ('foo') and password ('bar') to install</h3>
                </td>
              </tr>
              <tr>
                <td class="tableb" align="right">
                  Username:
                </td>
                <td class="tableb">
                  <input type="text" name="uid" class="textinput" style="width:100%" />
                </td>
              </tr>
              <tr>
                <td class="tableb tableb_alternate" align="right">
                  Password:
                </td>
                <td class="tableb tableb_alternate">
                  <input type="password" name="pwd" class="textinput" style="width:100%" />
                </td>
              </tr>
              <tr>
                <td class="tablef" colspan="2">
                  <input type="submit" value="Go!" class="button" />
                </td>
              </tr>
            </table>
    </form>
EOT;
}
?>