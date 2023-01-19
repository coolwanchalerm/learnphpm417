<!doctype html>
<html lang="en">
<?php
include 'inc/conn.php';
include 'inc/header.php';


?>

<body>
    <?php
    include 'inc/nav.php';

    ?>
    <!-- main -->

    <div class="container mt-5">
        <div class="row text-center callout callout-info">
            <div class="h2 pb-2 mb-4 text-success border-bottom border-success">
                Array

            </div>

        </div>


        <?php
        // ondimemtion array
        /*$days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
       
        foreach ($days as $day) {
            echo "Hello " . $day . "<br>";
        } */

        //Associative Arrays
        /*
        $posts = [
            ["title"=>"พี่น้องเอ้ย","detail"=>"พี่น้องเอ้ย เพิ่นว่าปีเดือนจ้อ","post_by"=>"admin"],
            ["title"=>"สวัสดี","detail"=>"ชาวโลก","post_by"=>"user1"],
            ["title"=>"หมายายมี","detail"=>"กัดหมียายมา","post_by"=>"ครูวันเฉลิม"]
        ];
        
        print_r($posts);
        echo "<hr>";
        // echo "<br>".$posts[1]["title"];
        // echo "<br>".$posts[0]["detail"];

        // ลองใช้ for
        foreach($posts as $post){
            echo "ชื่อโพสต์ ".$post["title"]." รายละเอียด ".$post["detail"]."<br>";
        } */
        ?>

</body>

</html>