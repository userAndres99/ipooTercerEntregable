<?php

include_once "Pasajero.php";

class PasajerosEspeciales extends Pasajero{
    /*ATRIBUTOS
    para saber si necesita silla de ruedas          $sillaDeRuedas
    para saber si necesita asistencia               $asistencia
    para saber si necesita una comida especial      $comidaEspecial
    */
    private $sillaDeRuedas;
    private $asistencia;
    private $comidaEspecial;

    public function __construct($nombre,$apellido,$documento,$telefono,$numAsiento,$numTicket,$sillaDeRuedas,$asistencia,$comidaEspecial)
    {
        parent::__construct($nombre,$apellido,$documento,$telefono,$numAsiento,$numTicket);
        $this->sillaDeRuedas = $sillaDeRuedas;
        $this->asistencia = $asistencia;
        $this->comidaEspecial = $comidaEspecial;
    }

    //----- METODOS GET -----
    /**
     * para obtener si necesita silla de ruedas
     * @return boolean
     */
    public function get_sillaDeRuedas(){
        return $this->sillaDeRuedas;
    }
    /**
     * para obtener si necesita asistencia
     * @return boolean
     */
    public function get_asistencia(){
        return $this->asistencia;
    }
    /**
     * para obtener si necesita comida especial
     * @return boolean
     */
    public function get_comidaEspecial(){
        return $this->comidaEspecial;
    }

    //----- METODOS SET -----
    /**
     * para enviar si necesita silla de ruedas
     * @param boolean
     */
    public function set_sillaDeRuedas($sillaDeRuedas){
        $this->sillaDeRuedas = $sillaDeRuedas;
    }
    /**
     * para enviar si necesita asistencia
     * @param boolean
     */
    public function set_asistencia($asistencia){
        $this->asistencia = $asistencia;
    }
    /**
     * para enviar si necesita comida especial
     * @param boolean
     */
    public function set_comidaEspecial($comidaEspecial){
        $this->comidaEspecial = $comidaEspecial;
    }
    //----- METODOS EXTRA -----
    /**
     * para dar el porcentaje a incrementar al pasajero
     * @return
     */
    public function darPorcentajeIncremento(){
        // $porcentaje
        
        $porcentaje=parent::darPorcentajeIncremento();
        if($this->get_sillaDeRuedas() == true && $this->get_asistencia() ==true && $this->get_comidaEspecial()== true ){
            
            $porcentaje=$porcentaje + 0.20;

        }elseif($this->get_sillaDeRuedas()==true || $this->get_asistencia()==true || $this->get_comidaEspecial()==true){
            $porcentaje=$porcentaje + 0.05;
        }

        return $porcentaje;
    }

    //----- TOSTRING -----
    public function __toString()
    {
        $cadena=parent::__toString();
        $cadena=$cadena."SILLA DE RUEDAS: ". $this->get_sillaDeRuedas()."\n". 
                        "ASISTENCIA: ". $this->get_asistencia()."\n". 
                        "COMIDA ESPECIAL: ". $this->get_comidaEspecial()."\n";

        return $cadena;
    }
}