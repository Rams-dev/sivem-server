<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden De compra</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?=base_url("assets/images/logosis.png")?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>

     body{
        /* position: relative; */
        width: 100%;
        height: 50%;
        /* max-height: 50%; */
        border: 1px solid #000;
        font-size: 12px;

    } 
    .encabezados{
        display: block;
        border: solid 1px #000;
        height: 200px
    }

    .encabezado1{
        width: 69%;
        float: left;
    }
    .encabezado1-texto{
        width: 70%;
        margin: auto;
        text-align: center;
        font-size: 12px;
    }
    .datos{
        width: 100%;
    }

    .dato>p{
        padding-left: 10px;
    }
    .border-botom{
        font-size: 13px;
        border-bottom: solid 2px #000;
        margin-bottom: 3px;
    }
    .caja{
        border: 1px solid #000;
        margin-bottom: 3px;
        border-radius: 50%;
        width: 50%;
        
    }

    .cajav{
        border: 1px solid #000;
        margin-bottom: 3px;
        border-radius: 50%;
        width: 49.5%;
        float: right;
        position: absolute;
        top: 166px;
        left:51%;
        
    }


    .encabezado2{
        width: 30%;
        float: right;
    }

    .folio{
        border: 1px solid #000;
        border-radius: 8px;
        padding: 7px;
        margin: 2px 0px;
    }

    .folio> p {
        margin:0px;
    }

    .informacion{
        border: 1px solid #000;
        border-radius: 8px;
        height: 140px;

    }
    .tabla{
        margin-top: 4px;
    }

    .bandalateral{
        position: absolute;
        left: 57%;
        top: 47%;
        transform:rotate(270deg);
        width: 800px;
        height: 80px;
        opacity:.3
    }

    /* .foot>p{
        position: absolute;
        bottom: 75%;
    } */

    .center{
        width: 150px;
        padding-bottom: 20px;
        border-bottom: 1px solid #000;
        position: absolute;
        text-align: center;
        bottom: 1%;
        left: 40%;

    }

    .start{
        width: 150px;
        padding-bottom: 20px;
        border-bottom: 1px solid #000;
        position: absolute;
        text-align: center;
        left: 10%;
        bottom: 1%;
    }

    .end {
        width: 150px;
        padding-bottom: 20px;
        border-bottom: 1px solid #000;
        text-align: center;
        position: absolute;
        right: 10%;
        bottom: 1%;
    }
    
    </style>
</head>
<body>
<?php var_dump($ventas)?>
<?php foreach($ventas as $venta){}?>
<img src="<?= BASEPATH.'../assets/images/bandalateral.png'?>" class="bandalateral" alt="">
<div class="encabezados">
    <div class="encabezado1">
        <div class="encabezado1-texto">
            <p>impresión en HD y DF de lona | vinil | Tela | Microperforado | Laser | Offset | Serigrafia | Recorte de vinil | Rotulacion vehicular</p>
        </div>
        <div class="datos">
            <p class="border-bottom">Cliente: <?= $venta["nombre"]?></p>
            <p class="border-bottom">Telefono:</p>
            <p class="caja">Fecha: <?= $venta["fecha_venta"]?></p>
            <p class="caja">Impresor:</p>
            <p class="cajav">Vendedor: <?= $venta["nombre_vendedor"]?></p>
        </div>
    </div>
    <div class="encabezado2">
        <div class="folio"><p>N: <?= $venta["id"]?></p></div>
        <div class="informacion">
            <p>La Soledad No. 115</p>
        </div>
    </div>
</div>

 <div class="tabla">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Medidas</th>
                <th colspan="3">Descripción</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $i = 1;
            foreach($ventas as $dventa):
        ?>
        <tr>
            <td><?= $i?></td>
            <td><?= $dventa["alto"]. " x " . $dventa["ancho"] ?></td>
            <td colspan="3"><?=$dventa["calle"]." ".$dventa["localidad"]?></td>
        </tr>
        <?php 
            echo $i++;
            endforeach 
        ?>
            
        </tbody>
    </table>

</div> 
        <p class="start">Autorizado</p>
        <p class="center">Entregó</p>
        <p class="end">Recibió</p>
</body>
</html>