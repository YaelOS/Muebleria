<?php
    header('Content-Type: text/html; charset=UTF-8');
        $serverName="LAPTOP-HCJ89HJ8\SQLEXPRESS";
        $connectionInfo=array("Database"=>"Muebleria", "UID"=>"sa", "PWD"=>"aaa");
        $query="SELECT [id] ,[clasificacion] FROM [dbo].[clasificacion]";
        $con=sqlsrv_connect($serverName,$connectionInfo);
        $_POST['con']=$con;
        /*if($con){
            echo"Conexion exitosa\n";
            $query="SELECT [id] ,[clasificacion]FROM [dbo].[clasificacion]";
            $stmt=sqlsrv_query($con,$query);
            $cuenta=0;
            while($row=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
                echo($row['clasificacion']);
                echo("<br/>");
                $cuenta++;
            }
            sqlsrv_free_stmt($stmt);
        }else{
            echo"Fallo en la conexion";
            die( print_r( sqlsrv_errors(), true));
        }*/
?>