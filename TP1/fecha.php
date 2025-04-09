<?php

class Fecha{
    public $dia;
    public $mes;
    public $anio;

    public function __construct($dia, $mes, $anio)
    {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
    }

    // Metodo para obtener la fecha abreviada 

    public function fechaAbreviada(){
        return sprintf("%02d/%02d/%04d", $this->dia, $this->mes, $this->anio);
    }

    //Metodo para obtener la fecha de forma extendida

    public function fechaExtendida(){
        $meses= [
            1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril", 5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto", 9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre"
        ];
        
        return sprintf("%02d de %s de %04d", $this->dia, $meses[$this->mes], $this->anio);
    }

    // Metodo para verificar si es bisiesto

    private function esBisiesto($anio){
        return $anio % 4 == 0 && ($anio % 100 != 0 || $anio % 400 == 0);
    }



    //Metodo para incrementar un dia 

    private function incrementarDia(){
        $diasPorMes= [31, $this->esBisiesto($this->anio) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        $this->dia++;
        if ($this->dia > $diasPorMes[$this->mes - 1]){
            $this->dia= 1;
            $this->mes++;
            if ($this->mes > 12){
                $this->mes= 1;
                $this->anio++;
            }
        }
    }

    //Funcion para incrementar la fecha

    public static function incrementar($fecha, $dias){
        $nuevaFecha = new fecha($fecha->dia, $fecha->mes, $fecha->anio);
        for ($i= 0 ; $i < $dias; $i++){
            $nuevaFecha->incrementarDia();
        }
        return $nuevaFecha;
    }
}
