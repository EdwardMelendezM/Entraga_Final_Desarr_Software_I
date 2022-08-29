<?php
# - INGRESO 
if(empty($_FILES['Matriculados2022']['name']) 
    || empty($_FILES['Docentes2022']['name'])
    || empty($_FILES['Tutorados2021']['name'])) {
    $nuevaURL="Main.php";
    header("Location: ".$nuevaURL);
}
include("Funciones.php");
# ------------------ ALUMNOS MATRICULADOS ---------------------
$file_Matriculados=$_FILES["Matriculados2022"]["name"];
$file_tmpMatriculados=$_FILES["Matriculados2022"]["tmp_name"];
$file_ErrorMatriculados=$_FILES["Matriculados2022"]["error"];

# --------------------- DOCENTES -----------------------
$file_Docente=$_FILES["Docentes2022"]["name"];
$file_tmpDocente=$_FILES["Docentes2022"]["tmp_name"];
$file_ErrorDocente=$_FILES["Docentes2022"]["error"];

# ------------- TUTORADOS --------------------
$file_Tutorados=$_FILES["Tutorados2021"]["name"];
$file_tmpTuto=$_FILES["Tutorados2021"]["tmp_name"];
$file_ErrorTuto=$_FILES["Tutorados2021"]["error"];




if($file_ErrorDocente==0 & $file_ErrorMatriculados==0 & $file_ErrorTuto == 0)
{

    $file_exMatricu=explode(".",$file_Matriculados);
    $file_exDocent=explode(".",$file_Docente);
    $file_exTuto=explode(".",$file_Tutorados);

    $file_exMatricu=strtolower(end($file_exMatricu));
    $file_exDocent=strtolower(end($file_exDocent));
    $file_exTuto=strtolower(end($file_exTuto));


    $file_newMatriculados=uniqid("",true).".txt";
    $file_newDocente=uniqid("",true).".txt";
    $file_newTuto=uniqid("",true).".txt";
    

    $file_path = "TempFile/";
    if (!file_exists($file_path))
    {
        mkdir($file_path, 0777, true);
    }


    $DireccionMatriculado="TempFile/".$file_newMatriculados;
    $DireccionDocente="TempFile/".$file_newDocente;
    $DireccionTutorado="TempFile/".$file_newTuto;

    move_uploaded_file($file_tmpMatriculados,$DireccionMatriculado);
    move_uploaded_file($file_tmpDocente,$DireccionDocente);
    move_uploaded_file($file_tmpTuto,$DireccionTutorado);     
}



$ListaAlumnos="";
$ListaDocentes="";
$ListaTutorados="";


$archivo_matriculados=fopen($DireccionMatriculado,"r") or die("Error al abrir");
while(!feof($archivo_matriculados))
{
    $traer = fgets($archivo_matriculados);
    $saltodelinea=nl2br($traer);
    $Palabra= utf8_encode(utf8_decode($saltodelinea));
    $ListaAlumnos=$ListaAlumnos.$Palabra;
}
$archivo_docente=fopen($DireccionDocente,"r") or die("Error al abrir");
while(!feof($archivo_docente))
{
    $traer = fgets($archivo_docente);
    $saltodelinea1=nl2br($traer);
    $Palabra= utf8_encode(utf8_decode($saltodelinea1));
    $ListaDocentes=$ListaDocentes.$Palabra;
}
$archivo_Tuto=fopen($DireccionTutorado,"r") or die("Error al abrir");
while(!feof($archivo_Tuto))
{
    $traer = fgets($archivo_Tuto);
    $saltodelinea1=nl2br($traer);
    $Palabra= utf8_encode(utf8_decode($saltodelinea1));
    $ListaTutorados=$ListaTutorados.$Palabra;
}


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