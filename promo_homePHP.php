<?php

include("mysql.php");
function displayPromo(){
    try{
        $connection = DatabaseConnection();
        $stmt = $connection->prepare("Select * from promo");
        $stmt->execute();
        $row=$stmt->fetch();
        $p1 = $row['one'];
        $p2 = $row['two'];
        $p3 = $row['three'];
        $p4 = $row['four'];
        echo '<div class="col-md-3"><img class="promo1" style="width: 250px;height: 250px;" src="/BookItUp/promo_images/'.$p1.'"></div>
        <div class="col-md-3"><img class="promo2" style="width: 250px;min-width: 250px;height: 250px;" src="/BookItUp/promo_images/'.$p2.'"></div>
        <div class="col-md-3"><img class="promo3" style="width: 250px;min-width: 250px;height: 250px;" src="/BookItUp/promo_images/'.$p3.'"></div>
        <div class="col-md-3"><img class="promo4" style="width: 250px;min-width: 250px;height: 250px;" src="/BookItUp/promo_images/'.$p4.'"></div>';
    }
    catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
}
?>