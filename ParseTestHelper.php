<?php

use Parse\ParseClient;
use Parse\ParseQuery;
use Parse\ParseObject;

class ParseTestHelper
{

  public static function setUp()
  {
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    date_default_timezone_set('UTC');
    ParseClient::initialize(
      '7u1DSFl77TQj9xpMuZDLOOvWmMVyYZ4YJUSaHKCR', //app-id-here
      'StWYkOuR0U38Tl2d502Zrx3GMB2lWlaq9ax7wQ8N', //rest-api-key-here
      't4ycQncgu2S7RuWIkk0FTLpkXy6aD1DytlunzY0M' //master-key-here
    );
  }

  public static function tearDown()
  {

  }

  public static function clearClass($class)
  {
    $query = new ParseQuery($class);
    $query->each(function(ParseObject $obj) {
      $obj->destroy(true);
    }, true);
  }

} 