<?php
/**
 * Created by PhpStorm.
 * User: Karl-Martin
 * Date: 12/09/15
 * Time: 14:52
 */

error_reporting(0);

session_start();

$names = strtoupper($_POST["names"]);

$names = explode(" ", $names);

/*$db = mysql_connect('localhost', 'eresnetw_admin', 'Password1') or die( mysql_error() );
mysql_select_db( 'eresnetw_data', $db ) or die( mysql_error() );*/

$db = mysql_connect('kmm.deca.ee', 'c3kmm', 'ltl#4HPW') or die( mysql_error() );
mysql_select_db( 'c3kmm', $db ) or die( mysql_error() );

$q = 'SELECT id, name FROM users
          WHERE name LIKE "%'.implode('%" AND name LIKE "%', $names).'%"';

$res = mysql_query($q);
while($row = mysql_fetch_assoc($res)){
    $results[] = array('id' => $row['id'], 'text' => $row['name']);
}

echo json_encode($results);
