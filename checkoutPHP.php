<?php 
	include("mysql.php");
	function checkout_cart($name){
		try{
			$connection = DatabaseConnection();
            $stmt = $connection->prepare("select SUM(eprice) from cart,events where events.event_id = cart.event_id and uname = :name");
            $stmt_details = $connection->prepare("select * from cart,events where events.event_id = cart.event_id and uname = :name");
			$stmt_details->bindParam(":name",$name);
			$stmt_details->execute();
			$count = $stmt_details->rowCount();
			if($count > 0){
				while($row = $stmt_details->fetch()){
					$ename = $row["ename"];
					$price = $row["eprice"];
                    echo '<tr>
                    <td style="border:1px solid black">'.$ename.'</td>
                    <td style="border:1px solid black">Rs. '.$price.'</td></tr>
                    ';
            }
            echo '
                <div class="col text-center"><form method="POST"> <button class="btn btn-primary" type="submit" name= "buyme" style="width: 30%;background-color: black;margin-top: 30px;"><strong>Buy Now</strong></button></div>
            </div></form>
        </div>';

        if(isset($_POST['buyme']))
        {
            if(purchase_history($ename,$_SESSION['suname'])==0){
                reducePasses();
                deleteCheckoutCart($_SESSION['suname']);
                echo '<script>alert("Thank You for buying this item!");window.location.href="home.php";</script>';
            }
            
        }
            $stmt->bindParam(":name",$name);
            $stmt->execute();
            $row = $stmt->fetch();
            $final_price = $row['SUM(eprice)'];

            echo '<h3 style="margin-top:50px"> <b>Final Price: Rs. '.$final_price.'/- </b></h3>';
        }
        
    }
    catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
}
?>