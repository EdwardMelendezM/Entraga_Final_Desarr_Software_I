<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA DOCENTE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="..\Estilos\estilos_alumnos.css" rel="stylesheet" type="text/css">
</head>

<body class="cuerpo">
<h1 class="titulo">VISUALIZAR CVS</h1>
<form action = "Alumnos.php">
                <h3 class="titulo2">LISTA TOTAL DE TUTORADOS </h3>
                <a href="Main_2.php" class="buttom">Regresar</a>
                
            </form>
<div class="clearfix"> </div><br>
<div class="principal">
            
            <table class="tabla" >
                <thead >
                    <tr >
                        <th class="tabla1">-------</th>
                        <th class="tabla1">---------</th>
                    </tr>
                </thead>

                <tbody>
                    <br><br><br><br>
                    
                    <?php echo "<br><br>";
                            session_start();
                            $ListaTutorados=$_SESSION["ListaTutorados"];

                            include("Funciones.php");
                            foreach ($ListaTutorados as $key => $value) {

                    ?>
                    <tr>
                        <th class="tabla2"><?php  echo $key;   ?></th>
                        <th class="tabla2"><?php  echo $value;  ?></th>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        

</div>  
</body>
</html>