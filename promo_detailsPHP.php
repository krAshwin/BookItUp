<?php
    include("mysql.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $promo1 = $_FILES["promo1"]["name"];
        $promo2 = $_FILES["promo2"]["name"];
        $promo3 = $_FILES["promo3"]["name"];
        $promo4 = $_FILES["promo4"]["name"];
        $promo_images = "/var/www/html/BookItUp/promo_images/";
        $p1_target_file = $promo_images.basename($_FILES["promo1"]["name"]);
        $p2_target_file = $promo_images.basename($_FILES["promo2"]["name"]);
        $p3_target_file = $promo_images.basename($_FILES["promo3"]["name"]);
        $p4_target_file = $promo_images.basename($_FILES["promo4"]["name"]);
        $p1_imageFileType = strtolower(pathinfo($p1_target_file,PATHINFO_EXTENSION));
        $p2_imageFileType = strtolower(pathinfo($p2_target_file,PATHINFO_EXTENSION));
        $p3_imageFileType = strtolower(pathinfo($p3_target_file,PATHINFO_EXTENSION));
        $p4_imageFileType = strtolower(pathinfo($p4_target_file,PATHINFO_EXTENSION));
        if(move_uploaded_file($_FILES["promo1"]["tmp_name"],$p1_target_file))
            if(move_uploaded_file($_FILES["promo2"]["tmp_name"],$p2_target_file))
                if(move_uploaded_file($_FILES["promo3"]["tmp_name"],$p3_target_file)) 
                if(move_uploaded_file($_FILES["promo4"]["tmp_name"],$p4_target_file))
                if (addPromo($promo1,$promo2,$promo3,$promo4) == 0)
                {
                    echo "<script>alert('Upload Successfull!')</script>";
                }
    }
?>