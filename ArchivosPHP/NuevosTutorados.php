<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA DOCENTE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="..\Estilos\estilos_alumnos.css" rel="stylesheet" type="text/css">
</head>

<body class="cuerpo" >
<h1 class="titulo">OPERACIONES</h1>
<form action = "Alumnos.php">
                <h3 class="titulo2">ALUMNOS NO CONSIDERADOS EN TUTORIA 2022-I</h3>
                <a class="buttom" href="Main_2.php">Regresar</a>
                
</form>
<div class="clearfix"> </div><br>
<div class="principal">
            
            <table class="tabla" >
                <thead class="table-success table-striped" >
                    <tr>
                        <th class="tabla1">DOCENTE</th>
                        <th class="tabla1">ALUMNO</th>
                    </tr>
                </thead>

                <tbody>
                    <br><br><br><br>
                    
                    <?php echo "<br><br>";
                            session_start();
                            $ListaAlumnos=$_SESSION["NuevosTutorados"];

                            include("Funciones.php");
                            foreach ($ListaAlumnos as $key => $value) {

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