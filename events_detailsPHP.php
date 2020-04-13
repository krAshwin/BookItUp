<?php
    include("mysql.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $ename = $_POST["name"];
        $edetails = $_POST["details"];
        $lang = $_POST["lang"];
        $egenre = $_POST["genre"];
        $eartists = $_POST["artists"];
        $eloc = $_POST["loc"];
        $eage = $_POST["min_age"];
        $epasses = $_POST["passes"];
        $eprices = $_POST["prices"];
        $edate = $_POST["date"];
        $edur = $_POST["dur"];
        $eimg = $_FILES["img_file"]["name"];
        $event_image = "/var/www/html/BookItUp/event_images/";
        $etarget_file = $event_image.basename($_FILES["img_file"]["name"]);
        $eimageFileType = strtolower(pathinfo($etarget_file,PATHINFO_EXTENSION));
        if(move_uploaded_file($_FILES["img_file"]["tmp_name"],$etarget_file))
        {
            if(addEvent($ename,$edetails, $lang, $egenre, $eartists, $eloc, $eage, $epasses, $eprices, $edate, $edur, $eimg) == 0)
           {
                echo "<script> alert('Thanks for uploading the details')</script>";
           }
        }
        
        
        
    }
?>