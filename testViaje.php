<?php

include_once("Viaje.php");
include_once("Pasajero.php");
include_once("ResponsableV.php");
include_once("PasajeroVIP.php");
include_once("PasajerosEspeciales.php");



/**
 * (Dado dos numero uno el minimo y el otro el maximo le solicita al usuario que ingrese un numero dentro de ese rango)
 * @param int $min
 * @param int $max
 * @return int
 */

function solicitarNumeroEntre($min, $max){
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}
//-------------------------------------------------------------------------------- 

/**
 * (Menu Principal del Viaje)
 * @return int
 */
function menuPrincipal(){
    //int $opcionPrincipal

    echo "\n----- MENU PRINCIPAL ----- \n \n";
    
    echo "1-)Ver los Datos del Viaje \n";
    echo "2-)Ver los Datos de los Pasajeros: \n";
    echo "3-)Modificar la Informacion del Viaje:  \n";
    echo "4-)Modificar la Informacion de Pasajeros: \n";
    echo "5-)Ingresar los Datos del Responsable \n";
    echo "6-)Agregar Pasajero \n";
    echo "7-)Salir \n \n";

    
    $opcionPrincipal=solicitarNumeroEntre(1,7);
    return $opcionPrincipal;
}
//--------------------------------------------------------------------------------
/**
 * (Menu Para Modificar los Datos del Viaje)
 * @return int
 */
function menuViaje(){
    // int $opcionViaje

    echo "----- QUE DESEA MODIFICAR DEL VIAJE? ----- \n \n";

    echo "1) El Codigo del Viaje \n";
    echo "2) El Destino del Viaje \n";
    echo "3) La Cantidad Maxima de Pasajeros \n";
    echo "4) Volver al Menu \n \n";


    $opcionViaje=solicitarNumeroEntre(1,4);
    return $opcionViaje;
}
//--------------------------------------------------------------------------------
/**
 * (Menu Para Modificar los Datos de los Pasajeros)
 * @return int
 */
function menuPasajeros(){
    //int $opcionPasajero

    echo "----- QUE DESEA MODIFICAR DEL PASAJERO? ----- \n \n";

    echo "1) El Nombre\n";
    echo "2) El Apellido\n";
    echo "3) Numero de Documento\n";
    echo "4) Numero de Telefono \n";
    echo "5) Volver al menu \n \n";

    
    $opcionPasajero=solicitarNumeroEntre(1,5);
    return $opcionPasajero;

}

//==================== INICIO DEL PROGRAMA ============================================================

//TEST ViajeFeliz

/*int $codigoViaje,$cantidadMaxPasajeros,$i,$documentoPasajero,$opcion,$nuevoCodigo,
    $nuevaCantMaxPasajeros,$nuevoDocumento,$pasajerosNuevos,$cantidadMaxPasajerosAntigua,
    $contador,$numEmpleadoResponsable,$numLicenciaResponsable,$nuevoTelefono,$indiceDelPasajero, 
    $telefonoPasajero,$numAsiento,$opcionPasajero,$respuesta,$opcionViaje,$opcionPrincipa,$cantidadMaxActual
    $maxIngresoPasajeros,$numTicket,$numViajeroFrecuente,$opcion
*/
/*string $destinoViaje,$nombrePasajero,$apellidoPasajero,$nuevoDestino,$nuevoNombre,$nuevoApellido,
        $nombreResponsable,$apellidoResponsable,$pregunta
*/
/*array $arrayPasajerosViaje,$pasajerosActuales
/*
/*objeto $viaje1,$pasajeroBuscado,$pasajero
*/
/*boolean $sillaDeRuedas,$asistencia,$comidaEspecial
*/
$opcion=0;
$cantMillas=0;
$numViajeroFrecuente=0;
$comidaEspecial=false;
$asistencia=false;
$sillaDeRuedas=false;
$pregunta="";
$numTicket=0;
$maxIngresoPasajeros=0;
$cantidadMaxActual=0;
$pasajerosActuales=[];
$viaje1=null;
$opcionPrincipal=0;
$opcionViaje=0;
$respuesta=0;
$opcionPasajero=0;
$Pasajero=null;
$pasajeroBuscado=null;
$numAsiento=0;
$telefonoPasajero=0;
$indiceDelPasajero=0;
$nuevoTelefono=0;        
$numEmpleadoResponsable=0;
$numLicenciaResponsable=0;
$nombreResponsable="";
$apellidoResponsable="";
$contador=0;
$codigoViaje = 0;
$cantidadMaxPasajeros = 0;
$i = 0;
$documentoPasajero = 0;
$opcion = 0;
$nuevoCodigo = 0;
$nuevaCantMaxPasajeros = 0;
$nuevoDocumento = 0;
$pasajerosNuevos = 0;
$cantidadMaxPasajerosAntigua = 0;
$destinoViaje = "";
$nombrePasajero = "";
$apellidoPasajero = "";
$nuevoDestino = "";
$nuevoNombre = "";
$nuevoApellido = "";
$arrayPasajerosViaje = [];

//CREO UN OBJETO DE LA CLASE VIAJE 
$viaje1= new Viaje(0,"",0,[],null,"300","900");       

//----- DATOS YA CARGADOS PARA PROBAR EL TEST -----
$codigoViaje=33;
$destinoViaje="mi casa";
$cantidadMaxPasajeros=4;


$arrayPasajerosViaje["estandar"]=[  new Pasajero ("paco","mendoza","76543210","2998765432","3","240")];
$arrayPasajerosViaje["vip"]=[new PasajeroVIP ("pipoca","vidal","12345678","2993333333","4","321","499","345")];
$arrayPasajerosViaje["especiales"]=[new PasajerosEspeciales ("leleco","menard","77777777","2991234567","1","300",true,true,true)];

$resposable= new ResponsableV(53,251,"ricardo","juarez");


//ENVIO DE LOS DATOS 
$viaje1->set_codigo($codigoViaje);
$viaje1->set_destino($destinoViaje);
$viaje1->set_cantMaximaPasajeros($cantidadMaxPasajeros);
$viaje1->set_arrayPasajeros($arrayPasajerosViaje);
$viaje1->set_responsable($resposable);

do{
    //MENU PRINCIPAL PARA QUE EL USUARIO DECIDA QUE HACER
    $opcionPrincipal = menuPrincipal();

    // SWITCH PARA EL MENU PRINCIPAL 
    switch($opcionPrincipal){

        //MUESTRA LOS DATOS DEL VIAJE
        case 1:
            
            echo "\n----- DATOS DEL VIAJE ----- \n \n";

            echo "el destino es ".$viaje1->get_destino()."\n";
            echo "el codigo es ".$viaje1->get_codigo()."\n";
            echo "la cantidad maxima de pasajeros es ".$viaje1->get_cantMaximaPasajeros()."\n";
            
            echo $viaje1;
        break;

        //MUESTRA LOS DATOS DE LOS PASAJEROS
        case 2:
            
            echo "\n----- DATOS DE LOS PASAJEROS ----- \n \n";
          
            echo $viaje1->mostrarPasajeros();

        break;
        
        //LAS OPCIONES DE MODIFICACION DEL VIAJE
        case 3:
            
            do{
                
                //MENU PARA MODIFICAR LOS DATOS DEL VIAJE
                $opcionViaje = menuViaje();

                //SWITCH PARA EL MENU DE VIAJE
                switch($opcionViaje){
                    
                    //PARA MODIFICAR EL CODIGO
                    case 1:
                        
                        echo "--- El Codigo es ".$viaje1->get_codigo()." ---\n \n";
                        echo "Ingrese el Nuevo Codigo \n";
                        $nuevoCodigo=trim(fgets(STDIN));
                        $viaje1->set_codigo($nuevoCodigo);

                        //----- PARA VER SI SE CAMBIA EL CODIGO -----
                        echo $viaje1;

                    break;

                    //PARA MODIFICAR EL DESTINO
                    case 2:
                        
                        echo "--- El Destino es ".$viaje1->get_destino()." ---\n \n";
                        echo "Ingrese el Nuevo Destino \n";
                        $nuevoDestino=trim(fgets(STDIN));
                        $viaje1->set_destino($nuevoDestino);

                        //----- PARA VER SI SE CAMBIA EL DESTINO -----
                        echo $viaje1;

                    break;
                    
                    //PARA MODIFICAR LA CANTIDAD MAXIMA DE PASAJEROS
                    case 3:
                        
                        echo "--- La Cantidad Maxima de Pasajeros es ".$viaje1->get_cantMaximaPasajeros()." ---\n \n";
                        
                        //GUARDO LA CANTIDAD MAXIMA DE PASAJEROS QUE HAY ACTUALMENTE
                        $cantidadMaxPasajerosAntigua=$viaje1->get_cantMaximaPasajeros();
                        
                        //UN DO WHILE POR SI EL USUARIO ELIGE UNA CANTIDAD MENOR A LA QUE YA ESTABA (NO SE COMO QUITAR PASAJEROS POR ESO)
                        do{
                            echo "Ingrese la Nueva Cantidad Maxima de Pasajeros Mayor a la Actual\n";
                            $nuevaCantMaxPasajeros = trim(fgets(STDIN));
                        
                        }while ( $cantidadMaxPasajerosAntigua >= $nuevaCantMaxPasajeros );

                        //MANDO LA NUEVA CANTIDAD MAXIMA DE PASAJEROS
                        $viaje1->set_cantMaximaPasajeros($nuevaCantMaxPasajeros);

                        //----- PARA VER SI SE CAMBIA LA CANTIDAD MAXIMA -----
                        echo $viaje1;
                        
                    break;
                    
                }

            }while($opcionViaje!=4);

        break;
        
        //PARA MODIFICAR LA INFORMACION DE LOS PASAJEROS
        case 4:
            
            //UN DO WHILE POR SI NO SE ENCUENTRA EL DOCUMENTO INGRESADO
            do{

                echo "Ingrese el Documento del Pasajero que Quiere Modificar\n";
                $documentoPasajero=trim(fgets(STDIN));
                $pasajeroBuscado=$viaje1->buscarPasajero($documentoPasajero);

                //UN IF PARA QUE LE AVISE AL USUARIO QUE EL PASAJERO NO FUE ENCONTRADO SI SE RECORRE TODO EL ARREGLO
                if($pasajeroBuscado == null){
                    echo "\n--- EL DOCUMENTO INGRESADO NO FUE ENCONTRADO EN LA LISTA DE PASAJEROS ---\n  \n \n ";
                }

            }while ($pasajeroBuscado == null);

            do{

                //MENU PARA MODIFICAR A LOS PSAJEROS
                $opcionPasajero=menuPasajeros();

                //SWITCH PARA EL MENU DE MODIFICACION DE LOS PASAJEROS
                switch ($opcionPasajero){

                    //PARA MODIFICAR EL NOMBRE
                    case 1:
                        
                        echo "--- (EL NOMBRE ES: ".$pasajeroBuscado->get_nombre().") ---\n\n";
                        echo "Ingrese el Nuevo Nombre\n";
                        $nuevoNombre=trim(fgets(STDIN));

                        //ENVIO DE DATOS                      
                        $viaje1->modificarPasajero($pasajeroBuscado,$opcionPasajero,$nuevoNombre);

                        //-----PARA VER SI SE GUARDO EL NOMBRE-----
                       echo $viaje1;

                    break;
                    
                    //PARA MODIFICAR EL APELLIDO
                    case 2:
                        
                        echo "--- (EL APELLIDO ES: ".$pasajeroBuscado->get_apellido().") ---\n\n";
                        echo "Ingrese el Nuevo Apellido\n";
                        $nuevoApellido=trim(fgets(STDIN));

                        //ENVIO DE DATOS
                        $viaje1->modificarPasajero($pasajeroBuscado,$opcionPasajero,$nuevoApellido);

                        //-----PARA VER SI SE GUARDO EL APELLIDO-----
                        echo $viaje1;

                    break;
                    
                    //PARA MODIFICAR EL DOCUMENTO
                    case 3:
                        
                        echo "--- (EL DOCUMENTO ES: ". $pasajeroBuscado->get_documento().") ---\n\n";
                        echo "Ingrese el Nuevo Documento\n";
                        $nuevoDocumento=trim(fgets(STDIN));

                        //ENVIO DE DATOS
                        $viaje1->modificarPasajero($pasajeroBuscado,$opcionPasajero,$nuevoDocumento);

                        //-----PARA VER SI SE GUARDO EL DOCUMENTO-----
                        echo $viaje1;

                    break;
                    
                    //PARA MODIFICAR EL TELEFONO
                    case 4:
                        
                        echo "--- (EL TELEFONO ES: ". $pasajeroBuscado->get_telefono().") ---\n \n";
                        echo "Ingrese el Nuevo Telefono \n";
                        $nuevoTelefono=trim(fgets(STDIN));

                        //ENVIO DE DATOS
                        $viaje1->modificarPasajero($pasajeroBuscado,$opcionPasajero,$nuevoTelefono);

                        //----- PARA VER SI SE GUARDO EL TELEFONO -----
                        echo $viaje1;
                    break;

                }
                
            }while($opcionPasajero!=5);

        break;
        
        //PARA INGRESAR LOS DATOS DEL RESPONSABLE
        case 5:
            
            echo "Ingrese el Numero de Empleado del Responsable: \n";
            $numEmpleadoResponsable=trim(fgets(STDIN));

            echo "Ingrese el Numero de Licencia del Responsable: \n";
            $numLicenciaResponsable=trim(fgets(STDIN));

            echo "Ingrese el Nombre del Responsable: \n";
            $nombreResponsable=trim(fgets(STDIN));

            echo "Ingrese el Apellido del Responsable: \n";
            $apellidoResponsable=trim(fgets(STDIN));

            $viaje1->get_responsable()->set_numeroEmpleado($numEmpleadoResponsable);
            $viaje1->get_responsable()->set_numeroLicencia($numLicenciaResponsable);
            $viaje1->get_responsable()->set_nombre($nombreResponsable);
            $viaje1->get_responsable()->set_apellido($apellidoResponsable);

            //----- PARA VER SI SE GUARDARON LOS DATOS -----
            echo $viaje1;

        break;
        case 6:

            $cantidadMaxActual=$viaje1->get_cantMaximaPasajeros();
            $pasajerosActuales=$viaje1->get_arrayPasajeros();
            $maxIngresoPasajeros=$cantidadMaxActual - count($pasajerosActuales);

            

            echo "=== PUEDE INGRESAR UN MAXIMO DE ".$maxIngresoPasajeros."=== \n";
            echo "ingrese la cantidad de pasajeros que quiere agregar \n";
            $pasajerosNuevos=solicitarNumeroEntre(0,$maxIngresoPasajeros);

            

            if($pasajerosNuevos == 0){
                echo "Ha Seleccionado para no Ingresar Ningun Pasajero o No hay espacios disponibles \n";
                echo "Puede Modificar la Cantidad Maxima de Pasajeros si asi lo desea y despues agregarlos \n";
            }else{

                echo "Que tipos de pasajeros desea ingresar? \n\n";
                echo "1-)Pasajero Estandar \n";
                echo "2-)Pasajero especial \n";
                echo "3-)pasajero Vip \n";

                $respuesta=solicitarNumeroEntre(1,3);
                switch($respuesta){

                    //OPCION PARA AGREGAR A LOS PASAJEROS ESTANDAR
                    case 1:

                        $contador=1;

                        //PARA AGREGAR A LOS NUEVOS PASAJEROS
                        do{
                            echo "--- Pasajero Nuevo ".$contador." de ".$pasajerosNuevos."---\n \n";
                
                            echo "Ingrese el Nombre: \n";
                            $nombrePasajero=trim(fgets(STDIN));

                            echo "Ingrese el Apellido: \n";
                            $apellidoPasajero=trim(fgets(STDIN));

                            echo "Ingrese el Documento: \n";
                            $documentoPasajero=trim(fgets(STDIN));

                            echo "ingrese el Telefono: \n";
                            $telefonoPasajero=trim(fgets(STDIN));

                            echo "ingrese el numero de asiento: \n";
                            $numAsiento=trim(fgets(STDIN));

                            echo "ingrese el numero de ticket: \n";
                            $numTicket=trim(fgets(STDIN));

                            //PARA BUSCAR QUE NO ESTE EL PASAJERO (LO BUSCA POR EL DOCUMENTO)
                            $Pasajero=$viaje1->buscarPasajero($documentoPasajero);

                            //SI RECORRIO TODO EL ARREGLO QUIERE DECIR QUE NO ENCONTRO AL PASAJERO Y LO AGREGO
                            if($Pasajero == null){

                                $viaje1->agregarPasajero($nombrePasajero,
                                                        $apellidoPasajero,
                                                        $documentoPasajero,
                                                        $telefonoPasajero,
                                                        $numAsiento,
                                                        $numTicket);
                                $contador++;

                            //SINO LE DIGO QUE VUELVA A INGRESAR LOS DATOS PORQUE EL PASAJERO YA ESTA
                            }else{
                                echo "\n --- El pasajero ya esta Registrado porfavor ingrese de nuevo los datos ---\n";
                            }
                

                        }while($contador <= $pasajerosNuevos);

                        echo $viaje1;
                    break;

                    //OPCION PARA AGREGAR A LOS PASAJEROS ESPECIALES
                    case 2:

                        $contador=1;

                        //PARA AGREGAR A LOS NUEVOS PASAJEROS
                        do{
                            echo "--- Pasajero Nuevo ".$contador." de ".$pasajerosNuevos."---\n \n";
                
                            echo "Ingrese el Nombre: \n";
                            $nombrePasajero=trim(fgets(STDIN));

                            echo "Ingrese el Apellido: \n";
                            $apellidoPasajero=trim(fgets(STDIN));

                            echo "Ingrese el Documento: \n";
                            $documentoPasajero=trim(fgets(STDIN));

                            echo "ingrese el Telefono: \n";
                            $telefonoPasajero=trim(fgets(STDIN));

                            echo "ingrese el numero de asiento: \n";
                            $numAsiento=trim(fgets(STDIN));

                            echo "ingrese el numero de ticket: \n";
                            $numTicket=trim(fgets(STDIN));

                            echo "¿El Pasajero Necesita Silla de Ruedas? (si/no): \n";
                            $pregunta=trim(fgets(STDIN));

                            if($pregunta == "si"){
                                $sillaDeRuedas = true;
                            }else{
                                $sillaDeRuedas = false;
                            }

                            echo "¿El Pasajero Necesita Asistencia? (si/no): \n";
                            $pregunta=trim(fgets(STDIN));

                            if($pregunta == "si"){
                                $asistencia = true;
                            }else{
                                $asistencia = false;
                            }

                            echo "¿El Pasajero Necesita Comida Especial? (si/no): \n";
                            $pregunta=trim(fgets(STDIN));

                            if($pregunta == "si"){
                                $comidaEspecial = true;
                            }else{
                                $comidaEspecial = false;
                            }

                            //PARA BUSCAR QUE NO ESTE EL PASAJERO (LO BUSCA POR EL DOCUMENTO)
                            $Pasajero=$viaje1->buscarPasajero($documentoPasajero);

                            //SI RECORRIO TODO EL ARREGLO QUIERE DECIR QUE NO ENCONTRO AL PASAJERO Y LO AGREGO
                            if($Pasajero == null){

                                $viaje1->agregarPasajeroEspeciales($nombrePasajero,
                                                                $apellidoPasajero,
                                                                $documentoPasajero,
                                                                $telefonoPasajero,
                                                                $numAsiento,$numTicket,
                                                                $sillaDeRuedas,
                                                                $asistencia,
                                                                $comidaEspecial);
                                $contador++;

                            //SINO LE DIGO QUE VUELVA A INGRESAR LOS DATOS PORQUE EL PASAJERO YA ESTA
                            }else{
                                echo "\n --- El pasajero ya esta Registrado porfavor ingrese de nuevo los datos ---\n";
                            }
                

                        }while($contador <= $pasajerosNuevos);

                        echo $viaje1;

                    break;

                    //OPCION PARA AGREGAR A LOS PASAJEROS VIP
                    case 3;

                    $contador=1;

                        //PARA AGREGAR A LOS NUEVOS PASAJEROS
                        do{
                            echo "--- Pasajero Nuevo ".$contador." de ".$pasajerosNuevos."---\n \n";
                
                            echo "Ingrese el Nombre: \n";
                            $nombrePasajero=trim(fgets(STDIN));

                            echo "Ingrese el Apellido: \n";
                            $apellidoPasajero=trim(fgets(STDIN));

                            echo "Ingrese el Documento: \n";
                            $documentoPasajero=trim(fgets(STDIN));

                            echo "ingrese el Telefono: \n";
                            $telefonoPasajero=trim(fgets(STDIN));

                            echo "ingrese el numero de asiento: \n";
                            $numAsiento=trim(fgets(STDIN));

                            echo "ingrese el numero de ticket: \n";
                            $numTicket=trim(fgets(STDIN));

                            echo "Numero de Viajero Frecuente:  \n";
                            $numViajeroFrecuente=trim(fgets(STDIN));

                            echo "Ingrese la Cantidad de Millas \n";
                            $cantMillas=trim(fgets(STDIN));

                            //PARA BUSCAR QUE NO ESTE EL PASAJERO (LO BUSCA POR EL DOCUMENTO)
                            $Pasajero=$viaje1->buscarPasajero($documentoPasajero);

                            //SI RECORRIO TODO EL ARREGLO QUIERE DECIR QUE NO ENCONTRO AL PASAJERO Y LO AGREGO
                            if($Pasajero == null){

                                $viaje1->agregarPasajeroVIP($nombrePasajero,$apellidoPasajero,$documentoPasajero,$telefonoPasajero,$numAsiento,$numTicket,$numViajeroFrecuente,$cantMillas);
                                $contador++;

                            //SINO LE DIGO QUE VUELVA A INGRESAR LOS DATOS PORQUE EL PASAJERO YA ESTA
                            }else{
                                echo "\n --- El pasajero ya esta Registrado porfavor ingrese de nuevo los datos ---\n";
                            }
                

                        }while($contador <= $pasajerosNuevos);

                        echo $viaje1;

                    break;
                }
            }
        break;
      
    }

}while ($opcion!=7);