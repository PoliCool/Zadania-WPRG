<?php

include(ROOT_PATH.'app/database/db.php');
include(ROOT_PATH.'app/helpers/validatePost.php');

$table='posts';
$posts=selectAll($table );

$errors=array();
$id="";
$title="";
$body="";
$published="";



if(isset($_GET['id'])){
   $post= selectOne($table,['id'=>$_GET['id']]);
   $id=$post['id'];
    $title=$post['title'];
    $body=$post['body'];
    $published=$post['published'];
}

/*usuwanie*/
if(isset($_GET['delete_id'])){
   $cout=delete($table,$_GET['delete_id']);
    $_SESSION['message'] = 'Post deleted successfully';
    $_SESSION['type'] = 'success';
    header('Location:' . BASE_URL . '/admin/posts/index.php');
}

/*publikowanie*/
if(isset($_GET['publish'])&& isset($_GET['p_id'])){
    $published=$_GET['publish'];
    $p_id=$_GET['p_id'];
    $cout =update($table,$p_id,['published'=>$published]);
    $_SESSION['message'] = 'Post published state changed';
    $_SESSION['type'] = 'success';
    header('Location:' . BASE_URL . '/admin/posts/index.php');
}


/*dodanie*/
if(isset($_POST['add_post'])){
    //dd($_FILES['image']);
    //$errors=validatePost($_POST);

    if(!empty($_FILES['image']['name'])){
        $image_name =time() . '_'. $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/".$image_name;
        $result=move_uploaded_file($_FILES['image']['tmp_name'],$destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, 'Image upload not successful');
        }
    }else{
        array_push($errors,'Image is required');
    }



    if(count($errors)==0) {
        unset($_POST['add_post']);
        $_POST['user_id'] = $_SESSION['user_id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;

        $post_id = create($table, $_POST);
        $_SESSION['message'] = 'Post created successfully';
        $_SESSION['type'] = 'success';
        header('Location:' . BASE_URL . '/admin/posts/index.php');
    }else{
        $title=$_POST['title'];
        $body=$_POST['body'];

    }
}
/*update*/
if(isset($_POST['update_post'])){
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/images/" . $image_name;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, 'Image upload not successful');
        }
    } else {
        array_push($errors, 'Image is required');
    }

    if(count($errors)==0) {
        $id=$_POST['id'];
        unset($_POST['update_post'],$_POST['id']);
        $_POST['user_id'] = $_SESSION['user_id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);

        $post_id = update($table,$id,$_POST);
        $_SESSION['message'] = 'Post updated successfully';
        $_SESSION['type'] = 'success';
        header('Location:' . BASE_URL . '/admin/posts/index.php');
        exit();
    }else{
        $title=$_POST['title'];
        $body=$_POST['body'];
    }
}

