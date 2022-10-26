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
            <div class="white"></div>
            <div class="cabeza">
                    <img src="..\Imagenes\unsaac.jpg" class="imagen" width="180" height="180 ">
                    <h1 class="titulo_universidad">UNIVERSIDAD NACIONAL DE SAN ANTONIO DE ABAD DEL CUSCO</h1>
            </div>
        </section>
        <div class="white"></div>

        <div class="cabezal_div">
            <div class="cuerpo">
                <div class="cuerpo-p2">
                    <h3 class="Titulo_Cuerpo"> INGRESAR LOS CSV  <h3>
                    <form action="Operaciones.php" method ="POST" enctype="multipart/form-data">
                        <h3 class="sub-title">LISTA DE ALUMNOS MATRICULADOS</h3>

                        <div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                            <input type="file" id="fichero-tarifas" class="input-file" value=""  name="Matriculados2022"">
                                Subir Matriculados...
                        </div>

                        <br>
                        <h3 class="sub-title">LISTA DE PROFESORES DEL 2022</h3>

                        <div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                            <input type="file" id="fichero-tarifas" class="input-file" value=""  name="Docentes2022"">
                                Subir Docentes...
                        </div>

                        <br>
                        <h3 class="sub-title">LISTA DE TUTURADOS 2021</h3>
                        <div class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                            <input type="file" id="fichero-tarifas" class="input-file" value=""  name="Tutorados2021"">
                                Subir Tutorados...
                        </div>

                        <br><br>
                        
                        <input type="submit" name ="submit" value="ENTRAR" class="form_buttom">
                    </form>
                    
                </div> 
            </div>
        </div>  
    </body>
</html>