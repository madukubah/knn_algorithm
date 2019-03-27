/*
 Copyright (c) 2007-2017, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or http://cksource.com/ckfinder/license
 */
session_start();
$_SESSION['IsAuthorized'] = true; 
function CheckAuthentication()
{
    // WARNING : DO NOT simply return "true". By doing so, you are allowing
    // "anyone" to upload and list the files in your server. You must implement
    // some kind of session validation here. Even something very simple as...
 
    // return isset($_SESSION['IsAuthorized']) && $_SESSION['IsAuthorized'];
 
    // ... where $_SESSION['IsAuthorized'] is set to "true" as soon as the
    // user logs in your system. To be able to use session variables don't
    // forget to add session_start() at the top of this file.
 
    return isset($_SESSION['IsAuthorized']) && $_SESSION['IsAuthorized'];
}
$baseDir = $_SERVER['DOCUMENT_ROOT'].'/core_halosultra/assets/upload/';
$baseUrl = 'http://localhost/core_halosultra/assets/upload/';

var config = {};

// Set your configuration options below.

// Examples:
// config.language = 'pl';
// config.skin = 'jquery-mobile';

CKFinder.define( config );
//$baseUrl = './assets/upload/';
//$baseDir = './assets/upload/';




