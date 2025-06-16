<?php
function validatePost($post){
    $errors = array();
    if(empty($post['title'])){
        array_push($errors,'Title is required');
    }
    if(empty($post['body'])){
        array_push($errors,'Body is required');
    }

    $existingPost = selectOne('posts',['title'=>$post['title']]);
    if($existingPost){
        array_push($errors,'Title already exists');
    }
    return $errors;
}