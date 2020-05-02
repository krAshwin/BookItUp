<?php
    include('mysql.php');
    function showPast($uname){
        try{
            $connection = DatabaseConnection();
            $stmt = $connection->prepare("select * from purchase_history where uname=:uname order by purchase_id desc");
            $stmt->bindParam(":uname",$uname);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
                while($row = $stmt->fetch()){
                $event_name=$row['ename'];
                echo "<div class='card'><div class='card-body'><b>".$event_name."</b></div></div>";
            }
        }
        }
        catch(PDOException $exception_error)
		{
			echo "No data found in this section!";
		}
    }
?>