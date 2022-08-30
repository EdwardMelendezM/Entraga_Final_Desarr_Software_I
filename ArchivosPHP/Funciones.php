<?php
//-------------------------------------------------
//        Separar Codigo y Alumno 3 Columnas
//-------------------------------------------------
function ListaAlumnosTresColumnas($Lista)
{
    $Nueva=array();
    $token = strtok($Lista, "\n\t");
    while($token != false) 
    {
        $part1=(string)$token;
        $part2=(string)$token;
        $part3=(string)$token;

        $PartUno=Parte1($part1);
        $PartDos=Parte2($part2);
        $PartTres=Parte3($part3);

        $ParteNumUno=(integer)$PartUno;
        $ParteNumDos=(integer)$PartDos;
        $ParteNumTres=(integer)$PartTres;

        if($ParteNumDos!=0 & $ParteNumTres==0)
        { $Nueva[$PartDos]=$PartTres; }
        $token = strtok("\n\t");
    }
    return $Nueva;
}

//---------------------------------------------------
//   FUNCION PARA SEPARAR LOS NOMBRE EN 3 COLUMNAS
//---------------------------------------------------
function ListaDocentesTresColumnas($Lista)
{
$Nueva=array();
    $token = strtok($Lista, "\n\t");
    while($token != false) 
    {
        $part1=(string)$token;
        $part2=(string)$token;
        $part3=(string)$token;

        $PartUno=Parte1($part1);
        $PartDos=Parte2($part2);
        $PartTres=Parte3($part3);

        $ParteNumUno=(integer)$PartUno;
        $ParteNumDos=(integer)$PartDos;
        $ParteNumTres=(integer)$PartTres;

        if($ParteNumDos==0 & $ParteNumTres==0 & $ParteNumUno!=0)
        { $Nueva[$PartDos]=$PartTres; }
        $token = strtok("\n\t");
    }
    return $Nueva;
}


//--------------------------------------------------
//      Separar Codigo y Alumno Para 2 columnas
//--------------------------------------------------
function ListaAlumnosDosColumnas($Lista)
{
    $Nueva=array();
    $token = strtok($Lista, "\n\t");
    while($token != false) 
    {
        $part1=(string)$token;
        $part2=(string)$token;

        $PartUno=Parte1($part1);
        $PartDos=Parte3($part2);

        $ParteNumUno=(integer)$PartUno;
        $ParteNumDos=(integer)$PartDos;

        if($ParteNumUno!=0 & $ParteNumDos==0)
        { $Nueva[$PartUno]=$PartDos; }
        $token = strtok("\n\t");
    }
    return $Nueva;
}

//---------------------------------------------------
//   FUNCION PARA GENERAR LISTA TUTORADOS SEPARADO
//---------------------------------------------------
function ListaTutorados($Lista)
{
    $Nueva=array();
    $token = strtok($Lista, "\n\t");
    while($token != false) 
    {
        $part1=(string)$token;
        $part2=(string)$token;

        $PartUno=Parte1($part1);
        $PartDos=Parte3($part2);

        $ParteNumUno=(integer)$PartUno;
        $ParteNumDos=(integer)$PartDos;

        $Nueva[$PartUno]=$PartDos; 
        $token = strtok("\n\t");
    }
    return $Nueva;
}



//-------------------------------------------
//            Separar Parte 1
//-------------------------------------------
function Parte1($string)
{
    $Codigo="";
    for ($i=0 ; $i < strlen($string) ; $i++)
    {
        if($string[$i]==",")
        {
            return $Codigo;
        }
        $Codigo=$Codigo.$string[$i];
    }
}

//-------------------------------------------
//            Separar Parte 3
//-------------------------------------------
function Parte3($string)
{
    $Codigo="";
    for ($j=0 ; $j < strlen($string) ; $j++)
    {
        if($string[$j]==",")
        {
            $Codigo="";
        }
        else
        {
            $Codigo=$Codigo.$string[$j];
        }
        
    }
    return $Codigo;
}

//-------------------------------------------
//            Separar Parte 2
//-------------------------------------------
function Parte2($string)
{
    $aux=0;
    $Codigo="";
    for ($k=0 ; $k < strlen($string) ; $k++)
    {
        if($string[$k]==",")
        {
            if($aux==1)
            {
                return $Codigo;
            }
            $Codigo="";
            $aux++;
            
        }
        else
        {
            $Codigo=$Codigo.$string[$k];
        }
    }
}

//-------------------------------------------------
//            Buscar Codigo de Alumno
//-------------------------------------------------
function BuscarCodigo($ListaGeneral,$CodigoEstudiante)
{
    foreach ($ListaGeneral as $key => $value) {
        if($CodigoEstudiante==$key)
        {
            return true;
        }
    }
    return false;
}

//-------------------------------------------------
//             COMPARAR LISTAS
//-------------------------------------------------
function CompararListas($ListaTutorados,$ListaUniversal)
{
    $ListaAlumnosSinTutor=array();
    foreach ($ListaTutorados as $key => $value) {
        $Valor=BuscarCodigo($ListaUniversal,$key);
        if(!$Valor)
        {
            $ListaAlumnosSinTutor[$key]=$value;
        } 
    }
    return $ListaAlumnosSinTutor;
}
//-------------------------------------------------------------
/*  PROCEDIMIENTO NUMERO 2 - NORMALIZAR TUTORADOS A DOCENTES  */ 
//--------------------------------------------------------------
function NormalizarNuevosAlumnosToTutotres($ListaTutorados,$Nuevos_Alumnos)
{
    $ListDocentes=array();
    $Alumnos=array();
    $token = strtok($ListaTutorados, "\n\t");
    $contador=0;
    // $Nueva[$PartUno]=$PartDos; 
    //  Lista[codigo] = nombre;
    $suma=0;
    $Docente="";
    while($token != false) 
    {
        
        $part1=(string)$token; # DOCENTE, Goku
        $part2=(string)$token; # 10000101, Pepa Ping

        $PartUno=Parte1($part1);
        $PartDos=Parte3($part2);

        $ParteNumUno=(integer)$PartUno;
        $ParteNumDos=(integer)$PartDos;
        # 0 : Cadena
        # 1 : Numero
        if($ParteNumUno!=0)
        {
            array_push($Alumnos,$ParteNumUno);
        }
        else
        {
            if($contador!=0)
            {
                $ListDocentes[$Docente]=$Alumnos;
                $Alumnos=array();
                $suma=1;
            }
            $Docente=$PartDos;
            $contador++;
        }
        $ListaTutoresConDocentes[$PartUno]=$PartDos; 
        $token = strtok("\n\t");
        $suma++;

    }
    # DICCIONARIO = {'DOCENTE'=[192666,192665,18795,4987,19879,,9874,98,49,84,64] }
    if($contador-1==count($ListDocentes))
    {
        $ListDocentes[$Docente]=$Alumnos;
    }
    //Total de docentes = 36
    $Promedio=0;
    foreach ($ListDocentes as $key => $value) {
        $Promedio=$Promedio+count($value);
    }
    $Promedio=$Promedio/36;
    // REPARTIR ALUMNOS # docente : boris, 
    // ---------------------------------------------
    $ListaNuevosAlumnos=array(); 
    foreach ($Nuevos_Alumnos as $key => $value) {
        array_push($ListaNuevosAlumnos,$key);
    }
    $aux=0;
    while(count($ListaNuevosAlumnos)>0)
    {

        foreach ($ListDocentes as $key => $value) {

            
            if($Promedio>=count($value))
            {

                array_push($value,$ListaNuevosAlumnos[$aux]);
                unset($ListaNuevosAlumnos[$aux]);
                $aux++;
            }

            if(count($ListaNuevosAlumnos)==0)
            {
                break;
            }
                
        }
    }
    //ESTO NOS RETORNA LA LISTA COMPLETA CON ALUMNOS
    // $ListDocentes
    $ListaCompleta=array();
    $contador=0;
    foreach ($ListDocentes as $key => $value) {
        $ListaCompleta[$key]=": DOCENTE";
        echo "<br>".$contador;
        for ($i=0; $i < count($value); $i++) { 
            $ListaCompleta[$contador]=$value[$i];
            $contador++;
        }
    }
    
    return $ListaCompleta;
}

#--------------------------------------------------------------
#         FUNCION PARA RECIBIR Y CONVERTIR LOS CSV
#--------------------------------------------------------------
function convertir_csv_to_listas($name) # $name="Matriculados2022"
{

    $ListaFinal=""; # Aqui retornaremos el csv convertido
    $file_Matriculados=$_FILES[$name]["name"];
    $file_tmpMatriculados=$_FILES[$name]["tmp_name"];
    $file_ErrorMatriculados=$_FILES[$name]["error"];

    if($file_ErrorMatriculados==0)
    {
        $file_exMatricu=explode(".",$file_Matriculados);
        $file_exMatricu=strtolower(end($file_exMatricu));
        $file_newMatriculados=uniqid("",true).".txt";
        $file_path = "TempFile/";
    if (!file_exists($file_path))
    {
        mkdir($file_path, 0777, true);
    }

    $DireccionMatriculado="TempFile/".$file_newMatriculados;
    move_uploaded_file($file_tmpMatriculados,$DireccionMatriculado);
    }
    
    $archivo_matriculados=fopen($DireccionMatriculado,"r") or die("Error al abrir");
    while(!feof($archivo_matriculados))
    {
        $traer = fgets($archivo_matriculados);
        $saltodelinea=nl2br($traer);
        $Palabra= utf8_encode(utf8_decode($saltodelinea));
        $ListaFinal=$ListaFinal.$Palabra;
    }
    
    return $ListaFinal;
}
?>