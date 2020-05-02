<?php
    include('mysql.php');
    function response($fname,$fmail,$res){
        try{
            $connection = DatabaseConnection();
            $stmt = $connection->prepare("insert into feedback(fname,fmail,response) values(:fname,:fmail,:res)");
            $stmt->bindParam(":fname",$fname);
            $stmt->bindParam(":fmail",$fmail);
            $stmt->bindParam(":res",$res);
            $stmt->execute();
            return 0;
        }
        catch(PDOException $exception_error)
		{
			echo "No data found in this section!";
		}
    }
?>