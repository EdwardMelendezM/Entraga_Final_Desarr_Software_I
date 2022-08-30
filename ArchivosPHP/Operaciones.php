<?php
#---------- INSERTAMOS LA FUNCIONES -----------
include("Funciones.php");

#-------------------------------------------------------------
#      VERIFICAMOS SI LA ENTRADA DE DATOS ES CORRECTO
#-------------------------------------------------------------
if(empty($_FILES['Matriculados2022']['name']) 
    || empty($_FILES['Docentes2022']['name'])
    || empty($_FILES['Tutorados2021']['name'])) {
    $nuevaURL="Main.php";
    header("Location: ".$nuevaURL);
}


#-------------------------------------------------------------
#      USAMOS LA FUNCION CREADA PARA CONVERTIR LOS CSV
#-------------------------------------------------------------
$ListaAlumnos=convertir_csv_to_listas("Matriculados2022");
$ListaDocentes=convertir_csv_to_listas("Docentes2022");
$ListaTutorados=convertir_csv_to_listas("Tutorados2021");


//----------------------------------------------------
//               PROGRAMA PRINCIPAL
//-------------------------------------------------------
# UTILIZAMOS TODOS LOS MODULOS
$Matriculados=ListaAlumnosTresColumnas($ListaAlumnos);
$Profesores=ListaDocentesTresColumnas($ListaDocentes);
$Tutores=ListaTutorados($ListaTutorados);
$AlumnosTutores=ListaAlumnosDosColumnas($ListaTutorados);
$Final=CompararListas($AlumnosTutores,$Matriculados);

#Alumnos nuevos
$NuevosAlumnos=CompararListas($Matriculados,$AlumnosTutores);

$NuevosTutorados=NormalizarNuevosAlumnosToTutotres($ListaTutorados,$NuevosAlumnos);

# INICIO DE SESION PARA GUARDAR VARIABLES
session_start();
$_SESSION["ListaAlumnos"]=$Matriculados;
$_SESSION["ListaDocentes"]=$Profesores;
$_SESSION["ListaTutorados"]=$Tutores;
$_SESSION["listaDeNoConsiderados"]=$Final;
$_SESSION["NuevosTutorados"]=$NuevosTutorados;

$central="Main_2.php";
header("Location:".$central);
?>