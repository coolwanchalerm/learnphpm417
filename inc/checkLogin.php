<?php
    session_start();

    include 'conn.php';
    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Get the submitted username and password
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check if the username and password match a record in the database
        $query = "SELECT * FROM tbl_user WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($row);
        if ($row) {
            // The username and password are correct, so create a session for the user

            // Redirect the user to the appropriate page based on their role (admin or user)
            if ($row['user_level'] == '1') {
                header("Location:../index.php");
            $_SESSION['userLogin'] = "admin";
            $_SESSION['userLoginName'] = $row['fname'].' '.$row['lname'];

            } else {
                header("Location: ../index.php");
                $_SESSION['userLogin'] = "user";
                $_SESSION['userLoginName'] = $row['fname'].' '.$row['lname'];
            }
            exit;
        } else {
            // The username and password are incorrect, so display an error message
            header("Location: ../login.php");
            $_SESSION['err'] = "ไม่พบข้อมูล";

            
        }
    }

?>