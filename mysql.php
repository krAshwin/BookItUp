<?php
    function DatabaseConnection()
    {
        $servername = "localhost";
        $db_username = "username";
        $db_password = "password";
        $dbname = "book_it_up";	
        try{
            $connection = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }
        catch(PDOException $error){
            echo "Error".$error->getMessage();
            die();
        }
    }

    function insertData($name, $uid, $email, $pass)
    {
        try
            {
                $connection = DatabaseConnection();
                $stmt = $connection->prepare("insert into registrations (uid,username,email,pass) VALUES (:uid,:name,:email,:password)");
                $stmt->bindParam(":uid", $uid);
                $stmt->bindParam(":name", $name);
                $stmt->bindParam(":email",$email);
                $stmt->bindParam(":password",$pass);
                $stmt->execute();
            }
            catch(PDOException $exception_error)
            {
                echo "Error".$exception_error->getMessage();
            }
        
    }

    function checkEmailName($email,$uid){
		try
		{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("select email,uid from registrations where email=:email or uid=:uid");
			$stmt->bindParam(":email",$email);
			$stmt->bindParam(":uid",$uid);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				return 1;
			}
		}
		catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
    }
    
    function Authentication($uid,$pass){
		try
		{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("select uid,pass from registrations where uid = :uid and pass = :password");
			$stmt->bindParam(":uid",$uid);
			$stmt->bindParam(":password",$pass);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				return 1;
			}
			else{
				return 0;
			}
		}
		catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
    }
    
    function addEvent($ename,$edetails, $lang, $egenre, $eartists, $eloc, $eage, $epasses, $eprices, $edate, $edur, $eimg){
		try
		{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("insert into events (ename,edetails,lang,egenre,eartists, eloc, eage, epasses, eprice, edate, edur, eimg) VALUES (:ename,:edetails,:lang,:egenre,:eartists,:eloc,:eage,:epasses,:eprices,:edate,:edur,:eimg)");
			$stmt->bindParam(":ename", $ename);
			$stmt->bindParam(":edetails",$edetails);
			$stmt->bindParam(":lang",$lang);
			$stmt->bindParam(":egenre",$egenre);
			$stmt->bindParam(":eartists",$eartists);
			$stmt->bindParam(":eloc",$eloc);
			$stmt->bindParam(":eage",$eage);
            $stmt->bindParam(":epasses",$epasses);
            $stmt->bindParam(":eprices",$eprices);
            $stmt->bindParam(":edate",$edate);
            $stmt->bindParam(":edur",$edur);
            $stmt->bindParam(":eimg",$eimg);
			$stmt->execute();
			return 0;
		}
		catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
	}

	function addPromo($img1, $img2, $img3, $img4)
	{
		try{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("Select * from promo");
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0)
			{
				$stmt = $connection->prepare("delete from promo");
				$stmt->execute();
			}
			$stmt = $connection->prepare("insert into promo (one,two,three,four) values (:i1,:i2,:i3,:i4)");
			$stmt->bindParam(":i1",$img1);
			$stmt->bindParam(":i2",$img2);
			$stmt->bindParam(":i3",$img3);
			$stmt->bindParam(":i4",$img4);
			$stmt->execute();
			return 0;
		}
		catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
	}

	function checkCart($id){
		try{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("select event_id from cart where event_id = :id");
			$stmt->bindParam(":id",$id);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				return 1;
			}
			else{
				return 0;
			}
		}
		catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
	}

	function addToCart($id, $uname)	{
		try
		{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("insert into cart (event_id,uname) VALUES (:event_id,:uname)");
			$stmt->bindParam(":event_id", $id);
			$stmt->bindParam(":uname",$uname);
			$stmt->execute();
		}
		catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
	}
	function deleteCart($cid, $uname){
		try{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("delete from cart where cart_id = :cid and uname = :uname");
			$stmt->bindParam(":cid",$cid);
			$stmt->bindParam(":uname",$uname);
			$stmt->execute();
			return 0;
		}
		catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
	}

	function checkCartCheckout($uname){
		try{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("select * from cart where uname = :name");
			$stmt->bindParam(":name",$uname);
			$stmt->execute();
			$count = $stmt->rowCount();
			if($count > 0){
				return 1;
			}
			else{
				return 0;
			}
		}
		catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
	}

	function deleteItem($id){
		try{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("delete from events where event_id = :id");
			$stmt->bindParam(":id",$id);
			$stmt->execute();
			return 0;
		}
		catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
	}
	
	function deleteCheckoutCart($name){
		try{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("delete from cart where uname = :name");
			$stmt->bindParam(":name",$name);
			$stmt->execute();
			return 0;
		}
		catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
	}

	function reducePasses(){
		try{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("update events,cart set events.epasses=(events.epasses-1) where events.event_id=cart.event_id");
			$stmt->execute();
			return 0;
		}
		catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
	}

	function purchase_history($ename, $uname){
		try{
			$connection = DatabaseConnection();
			$stmt = $connection->prepare("insert into purchase_history(ename,uname) values(:ename,:uname);");
			$stmt->bindParam(':uname',$uname);
			$stmt->bindParam(':ename',$ename);
			$stmt->execute();
			return 0;
		}
		catch(PDOException $exception_error)
		{
			echo "Error".$exception_error->getMessage();
		}
	}
?>