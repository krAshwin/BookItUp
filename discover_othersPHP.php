<?php

    include("mysql.php");
    function displayView()
    {
        try{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("select * from events where egenre not in ('Music','Comedy)");
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
                while($row = $stmt->fetch()){
					$name = $row["ename"];
					$img = $row['eimg'];
					$location = $row['eloc'];
                    $min_age = $row['eage'];
                    $id = $row['event_id'];
                    $genre =$row['egenre'];
                    $passes=$row['epasses'];
                    if ($passes <= 0)
                    {
                        echo '<div class="col-md-3" style="margin-bottom:10px">
                    <a href="content.php?id='.$id.'" style="color: inherit;text-decoration: none;">
                        <div class="card" style=margin-bottom:5px">
                            <div class="card-body" style="padding: 0px;width: 250px;"><img class="event-image" style="width: 250px;height: 300px;" src="/BookItUp/event_images/'.$img.'">
                                <div style="margin-top: 7px;font-family: Montserrat;font-weight: 600;">
                                    <p style="margin-left: 7px;">'.$name.'</p>
                                    <p class="text-center" style="font-weight: normal;font-size: 14px;color:red;">Sold Out!</p>
                                </div>
                            </div>
                        </div>
                    </a></div>'; 
                    }
                    else{
                        echo '<div class="col-md-3" style="margin-bottom:10px">
                    <a href="content.php?id='.$id.'" style="color: inherit;text-decoration: none;">
                        <div class="card" style=margin-bottom:5px">
                            <div class="card-body" style="padding: 0px;width: 250px;"><img class="event-image" style="width: 250px;height: 300px;" src="/BookItUp/event_images/'.$img.'">
                                <div style="margin-top: 7px;font-family: Montserrat;font-weight: 600;">
                                    <p style="margin-left: 7px;">'.$name.'</p>
                                    <p class="text-center" style="font-weight: normal;font-size: 12px;">'.$min_age.' | '.$genre.' | 
                                    '.$location.'</p>
                                </div>
                            </div>
                        </div>
                    </a></div>'; 
                }
				return 1;
            }
        }
			else{
				return 0;
			}
		}
		catch(PDOException $exception_error)
		{
			echo "No data found in this section!";
		}
	}
?>