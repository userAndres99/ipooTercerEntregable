<?php

class Pasajero{
    
    /*ATRIBUTOS
        nombre del pasajero             $pasajero
        apellido del pasajero           $apellido
        documento del pasajero          $documento
        telefono del pasajero           $telefono
        numero de asiento               $numAsiento
        numero de ticket                $numTicket
    */
    private $nombre;
    private $apellido;
    private $documento;
    private $telefono;
    private $numAsiento;
    private $numTicket;
    

    //CONSTRUCTOR DE LA CLASE PASAJERO
    public function __construct($nombre,$apellido,$documento,$telefono,$numAsiento,$numTicket)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->telefono = $telefono;
        $this->numAsiento = $numAsiento;
        $this->numTicket = $numTicket;
        
    }

    //----- METODO GET -----
    /**
     * para obtener el nombre del pasajero
     * @return string
     */
    public function get_nombre(){
        return $this->nombre;
    }
    /**
     * para obtener el apellido del pasajero
     * @return string
     */
    public function get_apellido(){
        return $this->apellido;
    }
    /**
     * para obtener el documento
     * @return int
     */
    public function get_documento(){
        return $this->documento;
    }
    /**
     * para obtener el telefono
     * @return int
     */
    public function get_telefono(){
        return $this->telefono;
    }
    /**
     * para obtener el numero de asiento
     * @return int
     */
    public function get_numeroAsiento(){
        return $this->numAsiento;
    }
    /**
     * para obtenter el numero de ticket
     * @return int
     */
    public function get_numeroTicket(){
        return $this->numTicket;
    }
    
    //----- METODO SET -----
    /**
     * para enviar el nombre
     * @param string $nombre
     */
    public function set_nombre($nombre){
        $this->nombre = $nombre;
    }
    /**
     * para enviar el apellido
     * @param string $apellido
     */
    public function set_apellido($apellido){
        $this->apellido = $apellido;
    }
    /**
     * para enviar el documento
     * @param int $documento
     */
    public function set_documento($documento){
        $this->documento = $documento;
    }
    /**
     * para enviar el telefono
     * @param int $telefono
     */
    public function set_telefono($telefono){
        $this->telefono = $telefono;
    }
    /**
     * para enviar el numero de asiento
     * @param $numAsiento
     */
    public function set_numeroAsiento($numAsiento){
        $this->numAsiento = $numAsiento;
    }
    /**
     * para enviar el numero de ticket
     * @param $numTicket
     */
    public function set_numeroTicket($numTicket){
        $this->numTicket = $numTicket;
    }

    //----- METODOS EXTRA -----
    /**
     * para obtener el porcentaje de incremento del pasajero
     * @return
     */
    public function darPorcentajeIncremento(){
        $porcentaje= 0.10;

        return $porcentaje;
    } 

    //----- TOSTRING -----
    public function __toString()
    {
        return "NOMBRE: ".$this->get_nombre()."\n".
                "APELLIDO: ".$this->get_apellido()."\n". 
                "DOCUMENTO: ".$this->get_documento()."\n". 
                "TELEFONO: ".$this->get_telefono()."\n". 
                "NUMERO DE ASIENTO: ". $this->get_numeroAsiento()."\n". 
                "NUMERO DE TICKET: ". $this->get_numeroTicket()."\n";
    }
}