<?php
session_start();
include 'inc/conn.php';
    if (isset($_GET['comment_id'])) {
      $comment_id = $_GET['comment_id']; //comment_id
    echo $comment_id;
    // exit();
      // Prepare the DELETE statement
      $sql_comment = "DELETE FROM tbl_comment WHERE comment_id = :comment_id";
      $stmt_comment = $conn->prepare($sql_comment);
    
      // Bind the values to the statement
      $stmt_comment->bindParam(':comment_id', $comment_id);
    
      // Execute the DELETE statement
      $stmt_comment->execute();
    
      if ($stmt_comment) {
        // $_SESSION['success'] = 'ลบข้อมูลสำเร็จ..';
        // header("refresh:0; url=page.php?page_id=$id");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
      }
    }
?>