<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <?php header('Content-Type: text/html; charset=UTF-8');?>
    <title>CRUD articulo</title>
    <?php
        $connectionInfo=array("Database"=>$Database, "UID"=>$UID, "PWD"=>$PWD);
        $con=sqlsrv_connect($serverName,$connectionInfo);
        $stmt=sqlsrv_query($con,$query);
        $stmt2=sqlsrv_query($con,$queryArl);
    ?>
</head>
<body>
    <div class="grid">
    <div class="card"  style="width: 24rem; margin: 2rem auto;">
        <div class="card-body" align="center">
            <div>
                <h1>Subir articulo</h1>
                <form  method="POST">
                    <div class="input-group mb-3">
                        <input name="form" id="articulo"type="hidden" value="1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Articulo</span>
                        <input name="articulo" id="articulo"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Precio</span>
                        <input name="precio" id="precio"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div>
                        Clasificacion
                        <select name="clasif" id="clasif">
                            @while ($datos=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
                                <option value="<?php echo $datos['id']?>">{{utf8_decode($datos['clasificacion'])}}</option>
                            @endwhile
                        </select>
                    </div>
                    <div>
                        <span class="input-group-text" id="inputGroup-sizing-default">Alto</span>
                        <input  name="alto" id="alto"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>@csrf
                    <div>
                        <span class="input-group-text" id="inputGroup-sizing-default">Largo</span>
                        <input  name="largo" id="largo"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div>
                        <span class="input-group-text" id="inputGroup-sizing-default">Ancho</span>
                        <input  name="ancho" id="ancho"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div>
                        <input type="submit" value="¡Listo!" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        <div class="card"  style="width: 24rem; margin: 2rem auto;">
            <div class="card-body" align="center">
                <h1>Actualizar articulo</h1>
                <form  method="GET" action="/articulo">
                    <div>
                        Seleccione ID
                        <select name="idArl" id="idArl">
                            @while ($datos=sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC))
                                <option value="<?php echo $datos['id']?>">{{utf8_decode($datos['id'])}}</option>
                            @endwhile
                        </select>
                    </div>
                    <div>
                        <input type="submit" value="Seleccionar"class="btn btn-primary"><br>
                        @if(isset($_GET['idArl']))
                            <?php
                                $idArl=$_GET['idArl'];
                                $aux=$queryArlinf.$idArl;
                                $aux2=$queryVw.$idArl;
                                $stmt3=sqlsrv_query($con,$aux);
                                $stmt4=sqlsrv_query($con,$aux2);
                                $datos3=sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC);
                                $datos2=sqlsrv_fetch_array($stmt4, SQLSRV_FETCH_ASSOC);
                                $_POST['idArl']=$idArl;
                            ?>
                            <span id="inputGroup-sizing-default">Se ha seleccionado el Id: {{$idArl}}</span>
                        @endif
                        <?php
                            $con=sqlsrv_connect($serverName,$connectionInfo);
                            $stmt=sqlsrv_query($con,$query);
                        ?>
                    </div>
                </form>
            
                <form method="POST">
                    <div class="input-group mb-3">
                        <input name="form" id="articulo"type="hidden" value="2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Articulo</span>
                        <input name="articulo" id="articulo"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Precio</span>
                        @if(isset($_GET['idArl']))
                            <input name="precio" id="precio" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $datos3['precio']?>">
                        @else
                            <input name="precio" id="precio" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="">
                        @endif
                    </div>
                    <div>
                        Clasificacion
                        <select name="clasif" id="clasif">
                            @while ($datos=sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
                                <option value="<?php echo $datos['id']?>">{{utf8_decode($datos['clasificacion'])}}</option>
                            @endwhile
                        </select>
                    </div>
                    <div>
                        <span class="input-group-text" id="inputGroup-sizing-default">Alto</span>
                        @if(isset($_GET['idArl']))
                            <input  name="alto" id="alto"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $datos2['alto']?>">
                        @else
                            <input  name="alto" id="alto"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="">
                        @endif
                    </div>
                    <div>
                        <span class="input-group-text" id="inputGroup-sizing-default">Largo</span>
                        @if(isset($_GET['idArl']))
                            <input  name="largo" id="largo"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $datos2['largo']?>">
                        @else
                            <input  name="largo" id="largo"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="">
                        @endif
                    </div>
                    <div>
                        <span class="input-group-text" id="inputGroup-sizing-default">Ancho</span>
                        @if(isset($_GET['idArl']))
                            <input  name="ancho" id="ancho"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $datos2['ancho']?>">
                        @else
                            <input  name="ancho" id="ancho"type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="">
                        @endif
                    </div>
                    <div>
                        <input type="submit" value="¡ A corregir !" class="btn btn-warning">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        <div class="card" style="width: 24rem; margin: 2rem auto;">
            <div class="card-body"align="center">
                <h1>Eliminar articulo</h1>
                <form  method="POST" action="/articulo">
                    <div class="input-group mb-3">
                        <input name="form" id="articulo"type="hidden" value="3" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <?php
                        $stmt2=sqlsrv_query($con,$queryArl);
                    ?>
                    <div>
                        Seleccione ID
                        <select name="idArl" id="idArl">
                            @while ($datos=sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC))
                                <option value="<?php echo $datos['id']?>">{{utf8_decode($datos['id'])}}</option>
                            @endwhile
                        </select>
                    </div>
                    <div>
                        <input type="submit" value="Sacando lo malo D:" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
</body>
</html>