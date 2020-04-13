<?php
    include("mysql.php");
    function displayDetails($id){
		try{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("Select * from events where event_id = :id");
			$stmt->bindParam(":id",$id);
			$stmt->execute();
            $count = $stmt->rowCount();
            if($count > 0){
				while($row = $stmt->fetch()){
					$name = $row["ename"];
					$date = $row["edate"];
					$duration = $row["edur"];
					$img = $row['eimg'];
					$location = $row['eloc'];
                    $desc = $row['edetails'];
                    $artists = $row['eartists'];
                    $min_age = $row['eage'];
                    $price = $row['eprice'];
                    $id = $row['event_id'];
                    $genre = $row['egenre'];
                    $passes = $row['epasses'];
                    if ($passes <= 0)
                    {
                        echo '<div class="container">
                    <div class="d-block" style="border-bottom: 2px solid black;"><img class="d-inline" style="width: 250px;height: 300px;" src="/BookItUp/event_images/'.$img.'">
                        <p class="d-inline event-name" style="position: absolute;top: 30%;margin-left: 20px;font-family: Montserrat;font-size: 24px;font-weight: bold;">'.$name.'</p>
                        <p class="d-inline event-duration" style="position: absolute;top: 34%;margin-left: 20px;font-family: Montserrat;font-size: 18px;">'.$duration.'</p>
                        <p class="d-inline event-date" style="position: absolute;top: 37%;margin-left: 20px;font-family: Montserrat;font-size: 18px;">'.$date.'</p>
                    </div>
                    
                    <div style="margin-top: 20px;margin-left: 5px;font-family: Montserrat, sans-serif;">
                    <p style="font-size: 18px;width: 80%;"><strong>About the Event</strong></p>
                    <p class="text-justify" style="font-size: 16px;font-weight: normal;width: 80%;">'.$desc.'</p>
                </div>
                <div style="margin-top: 20px;margin-left: 5px;font-family: Montserrat, sans-serif;">
                    <p style="font-size: 18px;width: 80%;"><strong>Artists</strong></p>
                    <p class="text-justify" style="font-size: 16px;font-weight: normal;width: 80%;">'.$artists.'<br></p>
                </div>
                <div style="margin-top: 20px;margin-left: 5px;font-family: Montserrat, sans-serif;">
                    <p style="font-size: 18px;width: 80%;"><strong>Location</strong></p>
                    <p class="text-justify" style="font-size: 16px;font-weight: normal;width: 80%;">'.$location.'<br></p>
                </div>
                <div style="margin-top: 20px;margin-left: 5px;font-family: Montserrat, sans-serif;">
                    <p style="font-size: 18px;width: 80%;"><strong>Genre</strong></p>
                    <p class="text-justify" style="font-size: 16px;font-weight: normal;width: 80%;">'.$genre.'<br></p>
                </div>
                <div style="margin-top: 20px;margin-left: 5px;font-family: Montserrat, sans-serif;">
                    <p style="font-size: 18px;width: 80%;"><strong>Minimum Age Limit</strong></p>
                    <p class="age-limit" style="font-size: 16px;font-weight: normal;width: 80%;">'.$min_age.'+<br></p>
                    <p style="font-size: 18px;width: 80%;"><strong>Price</strong></p>
                    <p class="event-price" style="font-size: 16px;font-weight: normal;width: 80%;">Rs. '.$price.' /-<br></p>
                </div>
                <div>
                <h4 class="text-center" style="color:red; font-weight:bold">SOLD OUT</h4></div>';
                    }
                    else{
                        echo '<div class="container">
                    <div class="d-block" style="border-bottom: 2px solid black;"><img class="d-inline" style="width: 250px;height: 300px;" src="/BookItUp/event_images/'.$img.'">
                        <p class="d-inline event-name" style="position: absolute;top: 30%;margin-left: 20px;font-family: Montserrat;font-size: 24px;font-weight: bold;">'.$name.'</p>
                        <p class="d-inline event-duration" style="position: absolute;top: 34%;margin-left: 20px;font-family: Montserrat;font-size: 18px;">'.$duration.'</p>
                        <p class="d-inline event-date" style="position: absolute;top: 37%;margin-left: 20px;font-family: Montserrat;font-size: 18px;">'.$date.'</p>
                    </div>
                    
                    <div style="margin-top: 20px;margin-left: 5px;font-family: Montserrat, sans-serif;">
                    <p style="font-size: 18px;width: 80%;"><strong>About the Event</strong></p>
                    <p class="text-justify" style="font-size: 16px;font-weight: normal;width: 80%;">'.$desc.'</p>
                </div>
                <div style="margin-top: 20px;margin-left: 5px;font-family: Montserrat, sans-serif;">
                    <p style="font-size: 18px;width: 80%;"><strong>Artists</strong></p>
                    <p class="text-justify" style="font-size: 16px;font-weight: normal;width: 80%;">'.$artists.'<br></p>
                </div>
                <div style="margin-top: 20px;margin-left: 5px;font-family: Montserrat, sans-serif;">
                    <p style="font-size: 18px;width: 80%;"><strong>Location</strong></p>
                    <p class="text-justify" style="font-size: 16px;font-weight: normal;width: 80%;">'.$location.'<br></p>
                </div>
                <div style="margin-top: 20px;margin-left: 5px;font-family: Montserrat, sans-serif;">
                    <p style="font-size: 18px;width: 80%;"><strong>Genre</strong></p>
                    <p class="text-justify" style="font-size: 16px;font-weight: normal;width: 80%;">'.$genre.'<br></p>
                </div>
                <div style="margin-top: 20px;margin-left: 5px;font-family: Montserrat, sans-serif;">
                    <p style="font-size: 18px;width: 80%;"><strong>Minimum Age Limit</strong></p>
                    <p class="age-limit" style="font-size: 16px;font-weight: normal;width: 80%;">'.$min_age.'+<br></p>
                    <p style="font-size: 18px;width: 80%;"><strong>Price</strong></p>
                    <p class="event-price" style="font-size: 16px;font-weight: normal;width: 80%;">Rs. '.$price.' /-<br></p>
                </div>
                <div>
                <form method="POST"><button class="btn btn-outline-secondary btn-block" type="submit" style="width: 80%;" name="'.$id.'">Buy</button></form></div>';
                    }
                    
                }
                if(isset($_POST["$id"])){
                    $iid = (int) $id;
                    if(checkCart($iid) == 0){
                        addToCart($iid ,$_SESSION['suname']);
                        echo '<script>alert("Your item has been added to cart")</script>';
                    }
                    else{
                        echo '<script>alert("Your item has been already been added to cart")</script>';
                    }
                }
            }
        }
        catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
    }


?>