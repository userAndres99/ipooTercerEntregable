<?php


class Viaje{
    //REPRESENTACION DE UN VIAJE

    /*ATRIBUTOS:
        codigo del viaje                        $codigoV
        destino del viaje                       $destinoV
        cantidad maxide pasajeros del viaje     $cantMaxPasajeros
        listado de pasajeros del viaje          $arrayPasajeros
        responsable del viaje                   $responsableV
        el costo del viaje                      $costoViaje
        la suma de lo que abonan los pasajeros  $sumaCostos
    */
    private $codigoV;
    private $destinoV;
    private $cantMaxPasajeros;
    private $arrayPasajeros;
    private $responsableV;
    private $costoViaje;
    private $sumaCostos;
    

    //CONSTRUCTOR DE LA CLASE VIAJE
    public function __construct($codigoV,$destinoV,$cantMaxPasajeros,$arrayPasajeros,$responsableV,$costoViaje,$sumaCostos){

        $this->codigoV = $codigoV;
        $this->destinoV = $destinoV;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->arrayPasajeros = $arrayPasajeros;
        $this->responsableV = $responsableV;
        $this->costoViaje = $costoViaje;
        $this->sumaCostos = $sumaCostos;
    }

    //----- METODO GET -----
    /**
     * para obtener el codigo del viaje
     * @return int
     */
    public function get_codigo(){
        return $this->codigoV;
    }
    /**
     * para obtener el destino del viaje
     * @return string
     */
    public function get_destino(){
        return $this->destinoV;
    }
    /**
     * para obtener la cantidad maxima de pasajeros
     * @return int
     */
    public function get_cantMaximaPasajeros(){
        return $this->cantMaxPasajeros;
    }
    /**
     * para obtener la lista de pasajeros
     * @return array
     */
    public function get_arrayPasajeros(){
        return $this->arrayPasajeros;
    }
    /**
     * para obtener los datos del responsable
     * @return object
     */
    public function get_responsable(){
        return $this->responsableV;
    }
    /**
     * para obtener el costo del viaje
     * @return int
     */
    public function get_costoViaje(){
        return $this->costoViaje;
    }
    /**
     * para obtener la suma de los costos
     * @return int
     */
    public function get_sumaCostos(){
        return $this->sumaCostos;
    }

    //----- METODO SET -----
    /**
     * para enviar el codigo del viaje
     * @param int $codigoV
     */
    public function set_codigo($codigoV){
        $this->codigoV = $codigoV;
    }
    /**
     * para enviar el destino del viaje
     * @param string $destinoV
     */
    public function set_destino($destinoV){
        $this->destinoV = $destinoV;
    }
    /**
     * para enviar la cantidad maxima de pasajeros del viaje
     * @param int $cantMaxPasajeros
     */
    public function set_cantMaximaPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros=$cantMaxPasajeros;
    }
    /**
     * para enviar la lista de pasajeros del viaje
     * @param array $arrayPasajeros
     */
    public function set_arrayPasajeros($arrayPasajeros){
        $this->arrayPasajeros=$arrayPasajeros;
    }
    /**
     * para enviar los datos del responsable
     * @param object $responsableV
     */
    public function set_responsable($responsableV){
        $this->responsableV = $responsableV;
    }
    /**
     * para enviar el costo del viaje
     * @param float $costoViaje
     */
    public function set_costoViaje($costoViaje){
        $this->costoViaje = $costoViaje;
    }
    /**
     * para enviar la suma de los costos
     * @param float $sumaCostos
     */
    public function set_sumaCostos($sumaCostos){
        $this->sumaCostos = $sumaCostos;
    }
    //----- METODOS EXTRA -----
   
    /**
     * para mostrar a todos los pasajeros
     * @return string
     */
    public function mostrarPasajeros(){
        //array $colPasajero
        //string $cadena

        $colPasajero= $this->get_arrayPasajeros();

        $cadena = "";

        for($i=0;$i < count($colPasajero["estandar"]); $i++){
        
            $cadena=$cadena."=== Pasajero Estandar ". $i + 1 . " === \n". $colPasajero["estandar"][$i] . "\n \n";
            
        }
        for($i=0;$i < count($colPasajero["vip"]); $i++){
        
            $cadena=$cadena."=== Pasajero VIP ". $i + 1 . " === \n". $colPasajero["vip"][$i] . "\n \n";
            
        }
        for($i=0;$i < count($colPasajero["especiales"]); $i++){
        
            $cadena=$cadena."=== Pasajero Especial ". $i + 1 . " ===\n". $colPasajero["especiales"][$i] . "\n \n";
            
        }
            
        return $cadena; 
    }
         
    /**
     * busca un pasajero en la lista por dni
     * @param string $dni
     * @return object
     */
    public function buscarPasajero($dni){
        //array $colPasajero
        //boolean $encontro

        $colPasajero=$this->get_arrayPasajeros();
        $pasajero=null;

        $i=0;
        $encontro=false;

        //EMPEZAMOS LA BUSQUEDA POR LOS PASAJEROS ESTANDAR
        while($i<count($colPasajero["estandar"]) && !$encontro){

            if($colPasajero["estandar"][$i]->get_documento()==$dni){

                $encontro = true;
                $pasajero=$colPasajero["estandar"][$i];
                $i=$i-1;
            }
            $i=$i+1;
        
        }
        //SI NO SE ENCONTRO AL PASAJERO EN LOS ESTANDAR PASAMOS AL DE LOS VIP
        if(count($colPasajero["estandar"]) == $i){
            
            $i=0;
            $encontro=false;

            while($i<count($colPasajero["vip"]) && !$encontro){

                if($colPasajero["vip"][$i]->get_documento()==$dni){

                    $encontro = true;
                    $pasajero=$colPasajero["vip"][$i];
                    $i=$i-1;
                }
                $i=$i+1;
            }
        
        }
        //SI NO SE ENCONTRO AL PASAJERO EN LOS VIP PASAMOS AL DE LOS ESPECIALES
        if(count($colPasajero["vip"]) == $i){

            $i=0;
            $encontro=false;

            while($i<count($colPasajero["especiales"]) && !$encontro){

                if($colPasajero["especiales"][$i]->get_documento()==$dni){

                    $encontro = true;
                    $pasajero=$colPasajero["especiales"][$i];
                    $i=$i-1;
                }
                $i=$i+1;
            }

        }
        return $pasajero;
    }
    
    /**
     * para modificar a un pasajero
     * @param object $objPasajero
     * @param int $opcionModificar
     * @param string $datoModificar
     */
    public function modificarPasajero($objPasajero,$opcionModificar,$datoModificar){

        switch ($opcionModificar){
            case 1:
                $objPasajero->set_nombre($datoModificar);
            break;
            case 2:
                $objPasajero->set_apellido($datoModificar);
            break;
            case 3:
                $objPasajero->set_documento($datoModificar);
            break;
            case 4:
                $objPasajero->set_telefono($datoModificar);
            break;
    
        }
        
    }
    /**
     * para saber si hay lugar disponible en el viaje
     * @return boolean
     */
    public function hayPasajesDisponibles(){
        //boolean $hayLugar
        //int $cantidadPasajeros,$cantidadMax

        $hayLugar=false;
        
        $cantidadPasajeros=count($this->get_arrayPasajeros());
        $cantidadMax=$this->get_cantMaximaPasajeros();
        if($cantidadMax > $cantidadPasajeros){
            $hayLugar=true;
        }

        return $hayLugar;
    }
    /**
     * para venderle un pasaje a un cliente
     * @param object $objPasajero
     * @param string $tipoPasjero 
     */
    public function venderPasaje($objPasajero,$tipoPasajero){
        //float $abonarPasajero,$costo,$incrementar,$sumaCostos
        //int $cantidadPasajeros
        //array $pasajeros

        $abonarPasajero=0;

        if($this->hayPasajesDisponibles() == true){

            $pasajeros=$this->get_arrayPasajeros();
            $costo=$this->get_costoViaje();

            //OBTENGO EL PORCENTAJE
            $incrementar = $objPasajero->darPorcentajeIncremento();

            //MULTIPLICO EL PORCENTAJE POR EL COSTO PARA SABER CUANTO HAY QUE SUMARLE AL COSTO DEL VIAJE
            $incrementar = $costo * $incrementar;

            //SUMO EL COSTO DEL VIAJE MAS EL INCREMENTO
            $abonarPasajero = $costo + $incrementar;

            if($tipoPasajero == "vip"){

                $cantidadPasajeros=count($pasajeros["vip"]);
                $pasajeros["vip"][$cantidadPasajeros]=$objPasajero;

            }elseif($tipoPasajero == "especial"){

                $cantidadPasajeros=count($pasajeros["especial"]);
                $pasajeros["especial"][$cantidadPasajeros]=$objPasajero;
                
            }else{

                $cantidadPasajeros=count($pasajeros["estandar"]);
                $pasajeros["estandar"][$cantidadPasajeros]=$objPasajero;
                
            }
   
        }
        //OBTENGO LA SUMA DE LOS COSTOS
        $sumaCosto=$this->get_sumaCostos();

        //LE AGREGO A LA SUMA DE LOS COSTOS LO QUE TIENE QUE ABONAR EL PASAJERO
        $sumaCosto=$sumaCosto + $abonarPasajero;

        //ENVIO DE DATOS
        $this->set_sumaCostos($sumaCosto);
        $this->set_arrayPasajeros($pasajeros);

        return $abonarPasajero;
    }

    /**
     * para ir agregando a los pasajeros
     * @param string $pnombre,$papellido,$pdni,$ptelefono,$pnumAsiento,$pnumTicket
     */
    Public function agregarPasajero($pnombre,$papellido,$pdni,$ptelefono,$pnumAsiento,$pnumTicket){
        //object $pasjero

        $pasajero=new Pasajero($pnombre,$papellido,$pdni,$ptelefono,$pnumAsiento,$pnumTicket);
        
        //ESTA FUNCION TAMBIEN SE ENCARGA DE AGREGAR AL PASAJERO A LA COLECCION
        $this->venderPasaje($pasajero,"estandar");
             
    }

    /**
     * para ir agregando a los pasajeros especiales
     * @param string $pnombre,$papellido,$pdni,$ptelefono,$pnumAsiento,$pnumTicket
     * @param boolean $sillasDeRuedas,$asistencia,$comidaEspecial
     */
    Public function agregarPasajeroEspeciales($pnombre,$papellido,$pdni,$ptelefono,$pnumAsiento,$pnumTicket,$sillaDeRuedas,$asistencia,$comidaEspecial){
        //object $pasajero

        $pasajero= new PasajerosEspeciales($pnombre,$papellido,$pdni,$ptelefono,$pnumAsiento,$pnumTicket,$sillaDeRuedas,$asistencia,$comidaEspecial);
        
        //ESTA FUNCION TAMBIEN SE ENCARGA DE AGREGAR AL PASAJERO A LA COLECCION
        $this->venderPasaje($pasajero,"especial");
                     
    }

    /**
     * para ir agregando a los pasajeros vip
     * @param int $pdni,$ptelefono
     * @param string $pnombre,$papellido 
     */
    Public function agregarPasajeroVIP($pnombre,$papellido,$pdni,$ptelefono,$pnumAsiento,$pnumTicket,$numViajeroFrecuente,$cantMillasPasajero){
        //object pasajero

        
        $pasajero= new PasajeroVIP($pnombre,$papellido,$pdni,$ptelefono,$pnumAsiento,$pnumTicket,$numViajeroFrecuente,$cantMillasPasajero);
         
        //ESTA FUNCION TAMBIEN SE ENCARGA DE AGREGAR AL PASAJERO A LA COLECCION
        $this->venderPasaje($pasajero,"vip");
             
    }

    

    
    
    //----- METODO TOSTRING -----
    public function __toString(){

        return  "El Codigo es: ".$this->get_codigo()."\n".
                "El Destino es: ".$this->get_destino()."\n".
                "La Cantidad Maxima de Pasajeros es: ".$this->get_cantMaximaPasajeros()."\n".
                "--- Datos del Responsable del Viaje: --- \n".$this->get_responsable()."\n".
                $this->mostrarPasajeros()."\n". 
                "COSTO DEL VIAJE: ". $this->get_costoViaje()."\n". 
                "SUMA DE LOS COSTOS ABONADOS POR LOS PASAJEROS: ". $this->get_sumaCostos()."\n";
                          
    }
}
