<!DOCTYPE html>
<html lang="en">
    <head>
        <title> PAGINA DOCENTE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="..\Estilos\estilos_main.css" rel="stylesheet" >
</head>

<body class="principal">

<section class="section_cabeza">
<div class="cabeza">
        <img src="..\Imagenes\unsaac.jpg" class="imagen" width="180" height="180 ">
        <h1 class="titulo_universidad">UNIVERSIDAD NACIONAL DE SAN ANTONIO DE ABAD DEL CUSCO</h1>
</div>
</section>

<div class="clearfix"> </div>
<div class="cabezal_div">
    <div class="cuerpo">
        <div >
            <h3 class="Titulo_Cuerpo"> INGRESAR LOS CSV  <h3>
            <form action="Operaciones.php" method ="POST" enctype="multipart/form-data">
                <h3 >LISTA DE ALUMNOS MATRICULADOS</h3>
                <input type="file"  name="Matriculados2022" class="form_dentro">

                <br>
                <h3 >LISTA DE PROFESORES DEL 2022</h3>
                <input type="file"  name="Docentes2022" class="form_dentro">

                <br>
                <h3>LISTA DE TUTURADOS 2021</h3>
                <input type="file"  name="Tutorados2021" class="form_dentro">
                <br><br>
                <input type="submit" name ="submit"    value="Subir" class="form_buttom">
            </form>
            
        </div> 
    </div>
</div>  
</body>
</html>