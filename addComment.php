<?php
session_start();
require_once 'inc/conn.php';

if (isset($_POST['addComment'])) {
    $comment_msg = $_POST['comment_msg'];
    $comment_by = $_POST['comment_by'];
    $comment_status = '1';
    $comment_post = $_POST['comment_post'];
    // echo $post_title;
    
        $sql = 'INSERT INTO tbl_comment (comment_msg,comment_by,comment_status,comment_post)  VALUES ( :comment_msg,:comment_by,:comment_status,:comment_post)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":comment_msg",$comment_msg);
        $stmt->bindParam(":comment_by",$comment_by);
        $stmt->bindParam(":comment_status",$comment_status);
        $stmt->bindParam(":comment_post",$comment_post);
        $stmt->execute();
        if ($stmt) {
            // $_SESSION['success'] = 'เพิ่มข้อมูลสำเร็จ..';
        header("refresh:0; url=page.php?page_id=$comment_post");
        }else{
            // $_SESSION['error'] = 'เกิดข้อผิดพลาด';
            header("refresh:0; url=page.php?page_id=$comment_post");
        }
    
}else{
    header("refresh:0; url=post.php");
    
}

?>