<?php
/**
 * Created by PhpStorm.
 * User: Karl-Martin
 * Date: 12/09/15
 * Time: 14:52
 */

error_reporting(0);

session_start();

$description = $_POST["description"];
$user_id = $_POST["user_id"];


$db = mysql_connect('localhost', 'eresnetw_admin', 'Password1') or die( mysql_error() );
mysql_select_db( 'eresnetw_data', $db ) or die( mysql_error() );

$q = 'UPDATE users SET description = "'.$description.'" WHERE id = "'.$user_id.'"';
mysql_query($q);

