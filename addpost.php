<?php
session_start();
require_once 'inc/conn.php';

if (isset($_POST['submit'])) {
    $post_title = $_POST['post_name'];
    $post_detail = $_POST['post_detail'];
    $post_by = $_POST['post_by'];
    $post_status = '1';
    // echo $post_title;
    
        $sql = 'INSERT INTO tbl_post (post_title,post_detail,post_by,post_status)  VALUES ( :post_title,:post_detail,:post_by,:post_status)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":post_title",$post_title);
        $stmt->bindParam(":post_detail",$post_detail);
        $stmt->bindParam(":post_by",$post_by);
        $stmt->bindParam(":post_status",$post_status);
        $stmt->execute();
        if ($stmt) {
            $_SESSION['success'] = 'เพิ่มข้อมูลสำเร็จ..';
        header("refresh:0; url=index.php");
        }else{
            $_SESSION['error'] = 'เกิดข้อผิดพลาด';
        header("refresh:0; url=index.php");
        }
    
}else{
    header("refresh:0; url=post.php");
    
}

?>