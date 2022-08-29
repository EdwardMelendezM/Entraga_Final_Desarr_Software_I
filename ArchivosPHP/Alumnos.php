<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA DOCENTE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="..\Estilos\estilos_alumnos.css" rel="stylesheet" type="text/css">
</head>

<body class="cuerpo" >
<h1 class="titulo">VISUALIZAR CVS</h1>
<form action = "Alumnos.php">
                <h3 class="titulo2">ALUMNOS MATRICULADOS 2022-I</h3>
                <a class="buttom" href="Main_2.php">Regresar</a>
                
</form>
<div class="clearfix"> </div><br>
<div class="principal">
            
            <table class="tabla" >
                <thead >
                    <tr>
                        <th class="tabla1">N°</th>
                        <th class="tabla1">CODIGO</th>
                        <th class="tabla1">NOMBRE</th>
                    </tr>
                </thead>

                <tbody>
                    <br><br><br><br>
                    
                    <?php 
                            session_start();
                            $ListaAlumnos=$_SESSION["ListaAlumnos"];

                            include("Funciones.php");
                            $i=1;
                            foreach ($ListaAlumnos as $key => $value) {

                    ?>
                    <tr>
                        <th class="tabla2"><?php  echo $i;  ?> </th>
                        <th class="tabla2"><?php  echo $key;   ?></th>
                        <th class="tabla2"><?php  echo $value;  ?></th>
                    </tr>
                    <?php $i++;} ?>
                </tbody>
            </table>
        

</div>  
</body>
</html>