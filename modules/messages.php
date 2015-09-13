<?php
/**
 * Created by PhpStorm.
 * User: Karl-Martin
 * Date: 12/09/15
 * Time: 14:52
 */

error_reporting(0);

session_start();

$data = $_SESSION;


$action = $_POST["action"];

$db = mysql_connect('kmm.deca.ee', 'c3kmm', 'ltl#4HPW') or die( mysql_error() );
mysql_select_db( 'c3kmm', $db ) or die( mysql_error() );

/*db = mysql_connect('localhost', 'eresnetw_admin', 'Password1') or die( mysql_error() );
mysql_select_db( 'eresnetw_data', $db ) or die( mysql_error() );*/

if($action == 'getMessages'){


    $q = 'SELECT * FROM messages
          LEFT JOIN users ON messages.user_id = users.id
          ORDER BY messages.id ASC';

    $res = mysql_query($q);

    $messages = array();

    while($row = mysql_fetch_assoc($res)){
        $messages[]=$row;
    }

    echo json_encode($messages);

}
elseif($action == 'putMessage' ){

    $message = $_POST["message"];
    $userId = $_POST["userId"];

    $q = 'INSERT INTO `messages`(`user_id`, `message`) VALUES ("'.$userId.'","'.$message.'")';
    echo $q;
    mysql_query($q);

    echo 'success';

}
