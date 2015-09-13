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
$user_id = $_POST["user_id"];

$names = explode(" ", $names);

/*$db = mysql_connect('localhost', 'eresnetw_admin', 'Password1') or die( mysql_error() );
mysql_select_db( 'eresnetw_data', $db ) or die( mysql_error() );*/

$db = mysql_connect('kmm.deca.ee', 'c3kmm', 'ltl#4HPW') or die( mysql_error() );
mysql_select_db( 'c3kmm', $db ) or die( mysql_error() );

$q = 'SELECT u.id
          FROM users_contacts AS uc
          LEFT JOIN users AS u ON(uc.contact_id = u.id)
          WHERE uc.user_id = "'.$user_id.'"';

$res = mysql_query($q);
$ids = array();

while($row = mysql_fetch_assoc($res)){
    $ids[] = $row['id'];
}

$q = 'SELECT id, name FROM users
          WHERE id != "'.$user_id.'" AND name LIKE "%'.implode('%" AND name LIKE "%', $names).'%" AND id NOT IN("'.implode('","', $ids).'")';

$res = mysql_query($q);
while($row = mysql_fetch_assoc($res)){
    $results[] = array('id' => $row['id'], 'text' => $row['name']);
}

echo json_encode($results);
