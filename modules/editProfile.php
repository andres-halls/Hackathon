<?php
/**
 * Created by PhpStorm.
 * User: Karl-Martin
 * Date: 12/09/15
 * Time: 14:52
 */

error_reporting(0);

session_start();

$db = mysql_connect('localhost', 'eresnetw_admin', 'Password1') or die( mysql_error() );
mysql_select_db( 'eresnetw_data', $db ) or die( mysql_error() );

/*$db = mysql_connect('kmm.deca.ee', 'c3kmm', 'ltl#4HPW') or die( mysql_error() );
mysql_select_db( 'c3kmm', $db ) or die( mysql_error() );*/

if ($_POST['action'] == 'get') {

    $user_id = $_POST["user_id"];
    $q = 'SELECT description FROM users WHERE id = "'.$user_id.'"';
    $res = mysql_query($q);
    $description = mysql_fetch_assoc($res);
    echo json_encode($description);

} else if ($_POST['action'] == 'update') {

    $description = $_POST["description"];
    $user_id = $_POST["user_id"];

    $q = 'UPDATE users SET description = "'.$description.'" WHERE id = "'.$user_id.'"';
    mysql_query($q);


}

