<?php

include_once "Pasajero.php";

class PasajeroVIP extends Pasajero{
    /*ATRIBUTOS
    numero de viajero frecuente del pasajero $numViajeroFrecuente
    cantidad de millas recorridas por el pasajero $cantMillasPasajero
    */
    private $numViajeroFrecuente;
    private $cantMillasPasajero;

    public function __construct($nombre,$apellido,$documento,$telefono,$numAsiento,$numTicket,$numViajeroFrecuente,$cantMillasPasajero)
    {
        parent::__construct($nombre,$apellido,$documento,$telefono,$numAsiento,$numTicket);
        $this->numViajeroFrecuente = $numViajeroFrecuente;
        $this->cantMillasPasajero = $cantMillasPasajero;
    }

    //----- METODOS GET -----
    /**
     * para obtener el numero de viajero frecuente
     * @return int
     */
    public function get_numeroViajeroFrecuente(){
        return $this->numViajeroFrecuente;
    }
    /**
     * para obtener la cantidad de millas
     * @return float
     */
    public function get_cantidadMillasPasajero(){
        return $this->cantMillasPasajero;
    }

    //----- METODOS SET -----
    /**
     * para enviar el numero de viajero frecuente
     * @param int
     */
    public function set_numeroViajeroFrecuente($numViajeroRecuente){
        $this->numViajeroFrecuente = $numViajeroRecuente;
    }
    /**
     * para enviar la cantidad de millas
     * @param float
     */
    public function set_cantidadMillasPasajero($cantMillasPasajero){
        $this->cantMillasPasajero = $cantMillasPasajero;
    }

    //----- METODOS EXTRA -----
    /**
     * para obtener el porcentaje que se le incrementa al pasajero
     * @return
     */
    public function darPorcentajeIncremento()
    {
        $porcentaje=parent::darPorcentajeIncremento();

        if($this->get_cantidadMillasPasajero() > 300){
            $porcentaje=$porcentaje + 0.20; 
        }else{
            $porcentaje=$porcentaje + 0.25;
        }

        return $porcentaje;
    }

    //----- TOSTRING -----
    public function __toString()
    {
        $cadena=parent::__toString();
        $cadena=$cadena."NUMERO VIAJERO RECUENTE: ". $this->get_numeroViajeroFrecuente()."\n". 
                        "CANTIDAD MILLAS PASAJERO: ". $this->get_cantidadMillasPasajero()."\n";

        return $cadena;
    }
}