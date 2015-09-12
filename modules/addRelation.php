<?php
/**
 * Created by PhpStorm.
 * User: Karl-Martin
 * Date: 12/09/15
 * Time: 14:52
 */

error_reporting(0);

session_start();

$user_id = $_POST["user_id"];
$contact_id = $_POST["contact_id"];
$relation = $_POST["relation"];
$action = $_POST["action"];


/*$db = mysql_connect('localhost', 'eresnetw_admin', 'Password1') or die( mysql_error() );
mysql_select_db( 'eresnetw_data', $db ) or die( mysql_error() );*/

$db = mysql_connect('kmm.deca.ee', 'c3kmm', 'ltl#4HPW') or die( mysql_error() );
mysql_select_db( 'c3kmm', $db ) or die( mysql_error() );

if($action == 'get'){

    $q = 'SELECT u.name
          FROM users_contacts AS uc
          LEFT JOIN users AS u ON(uc.user_id = u.id)
          WHERE uc.user_id = "'.$user_id.'"';

    $res = mysql_query($q);

    $names = array();
    while($row = mysql_fetch_assoc($res)){
        $names[] = $row;
    }

    echo json_encode($names);
}
elseif($action == 'add'){
    $q = 'INSERT INTO `users_contacts`(`user_id`, `relation`, `contact_id`) VALUES ("'.$user_id.'","'.$relation.'","'.$contact_id.'")';
    $res = mysql_query($q);
}




