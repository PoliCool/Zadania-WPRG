<?php


session_start();
require('connect.php');


function dd($value){
    echo "<pre>", print_r($value,true), "</pre>";
    die();
}
function executeQuery($sql,$data){
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s',count($values));
    $stmt->bind_param($types,...$values);
    $stmt->execute();
    return $stmt;
}
function selectAll($table, $conditions =[])
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if(empty($conditions) ){
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }else{
        //$sql="SELECT * FROM $table ";
            /*dynamiczne uwarunkowanie conditions*/
        $i=0;
            foreach($conditions as $key => $value){
                if($i==0) {
                    $sql = $sql . " WHERE $key = ?";
                }else{
                    $sql = $sql . " AND $key = ?";
                }
                $i++;
            }
            $stmt = executeQuery($sql,$conditions);
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
    }
}

function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";

        $i=0;
        foreach($conditions as $key => $value){
            if($i==0) {
                $sql = $sql . " WHERE $key = ?";
            }else{
                $sql = $sql . " AND $key = ?";
            }
            $i++;
        }

        $sql=$sql." LIMIT 1";
         $stmt = executeQuery($sql,$conditions);
        $records = $stmt->get_result()->fetch_assoc();
        return $records;
}

function create($table,$data){
    global $conn;
    $sql = "INSERT INTO $table SET ";
    $i=0;
    foreach($data as $key => $value){
        if($i==0) {
            $sql = $sql . "$key = ?";
        }else{
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }
    $stmt=executeQuery($sql,$data);
    $id=$stmt->insert_id;
    return $id;
}

function update($table,$id,$data){
    global $conn;
    $sql = "UPDATE $table SET ";

    $i=0;
    foreach($data as $key => $value){
        if($i==0) {
            $sql = $sql . "$key = ?";
        }else{
            $sql = $sql . ", $key = ?";
        }
        $i++;
    }
    $sql = $sql." WHERE id = ?";
    $data['id'] = $id;
    $stmt=executeQuery($sql,$data);
    return $stmt->affected_rows;
}


function delete($table,$id){
    global $conn;
    $sql = "DELETE FROM $table WHERE id=?";
    $stmt=executeQuery($sql,['id' => $id]);
    return $stmt->affected_rows;
}

/* test*/
/*
$conditions=[
    'admin' =>0,
    'username'=> 'adam'
];
*/
function getPublicPosts(){
   global $conn;
   //SELECT * FROM posts WHERE published=1
   $sql="SELECT p.*,u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=?";

    $stmt = executeQuery($sql,['published' => 1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}
function getPreviousPost($currentId) {
    global $conn;
    $sql = "SELECT * FROM posts WHERE id < ? ORDER BY id DESC LIMIT 1";
    $stmt = executeQuery($sql, ['id' => $currentId]);
    $record = $stmt->get_result()->fetch_assoc();
    return $record;
}

function getNextPost($currentId) {
    global $conn;
    $sql = "SELECT * FROM posts WHERE id > ? ORDER BY id ASC LIMIT 1";
    $stmt = executeQuery($sql, ['id' => $currentId]);
    $record = $stmt->get_result()->fetch_assoc();
    return $record;
}
function getMessages() {
    return selectAll('messages');  // zakładam, że tabela to 'messages'
}