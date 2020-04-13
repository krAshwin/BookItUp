<?php 
	include("mysql.php");
	function displayCart($name){
		try{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("Select * from cart,events where events.event_id = cart.event_id and uname = :name");
			$stmt->bindParam(":name",$name);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				while($row = $stmt->fetch()){
					$ename = $row["ename"];
					$price = $row["eprice"];
					$image = $row["eimg"];
                    $id = $row['cart_id'];
                    echo '<div class="card" style = "margin-bottom:10px">
                    <div class="card-body cart-items">
                        <div><img class="img-fluid d-inline-block event-image" src="/BookItUp/event_images/'.$image.'" style="width: 200px;height: 200px;border-radius: 5px;">
                            <div class="d-inline-block" style="position: absolute;margin-left: 15px;width: 70%;margin-top: initial;">
                                <p class="d-block event-name" style="vertical-align: text-top;font-size: 25px;margin-top: 20px;"><strong>'.$ename.'</strong></p>
                                <p class="d-inline-block event-price"><strong>Rs. '.$price.' /-</strong></p>
                            </div>
                            <div class="d-inline-block float-right"><form method="POST"><button name="'.$id.'"
                            class="btn del-btn btn-outline-primary" type="submit" style="border:none; color:black;"><strong><i class="fa fa-close"> </i></strong></button></form></div>
                        </div>
                    </div>
                </div>';
                if(isset($_POST["$id"])){
        			deleteCart($id,$_SESSION['suname']);
        			echo '<script>window.location.href="cart.php";</script>';
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