<?php
session_start();
require_once 'inc/conn.php';

if (isset($_POST['addUser'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $user_level = '2';
    $password = $_POST['password'];
    $comPass = $_POST['comPass'];

    if ($password != $comPass) { 
        $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน...';
        header("refresh:0; url=register.php");
    } else {
        // check user in table
        $sqlCheckUser = 'SELECT * FROM tbl_user WHERE fname = :fname AND lname = :lname AND username = :username';
        $check_user = $conn->prepare($sqlCheckUser);
        $check_user->bindParam(':fname', $fname);
        $check_user->bindParam(':lname', $lname);
        $check_user->bindParam(':username', $username);
        $check_user->execute();

        if ($check_user->rowCount() > 0) { //ถ้ามี user แล้ว
            $_SESSION['error'] = 'มีชื่อในระบบแล้ว <a href="login.php">เข้าสู่ระบบ</a>';
            header("refresh:0; url=register.php");
        } else { // ถ้ายังไม่มี
            $sql = 'INSERT INTO tbl_user (fname,lname,username,password,user_level)  VALUES (:fname,:lname,:username,:password,:user_level )';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":fname", $fname);
            $stmt->bindParam(":lname", $lname);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":user_level", $user_level);
            $stmt->execute();
            if ($stmt) {
                $_SESSION['success'] = 'บันทึกข้อมูลสำเร็จ..';
                header("refresh:0; url=register.php");
            } else {
                $_SESSION['error'] = 'เกิดข้อผิดพลาด';
                header("refresh:0; url=register.php");
            }
        }
    }
} else {
    header("refresh:0; url=register.php");
}
