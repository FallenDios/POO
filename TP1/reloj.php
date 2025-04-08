<?php

class Reloj{
    private int $horas;
    private int $minutos;
    private int $segundos;

public function __construct(int $horas = 0, int $minutos = 0, int $segundos = 0) {
    $this->horas = $horas;
    $this->minutos = $minutos;
    $this->segundos = $segundos;
}
public function puestoAcero(): void{
    $this->horas = 0;
    $this->minutos = 0;
    $this->segundos = 0;

}

public function incremento(): void{
    $this->segundos ++;
    if($this->segundos > 59){
        $this->segundos = 0;
        $this->minutos ++;
        if($this->minutos > 59){
            $this->minutos = 0;
            $this->horas ++;
            if($this->horas > 23){
                $this->horas = 0;
            }
        }

    }
}


public function __toString(): string{
    return sprintf("%02d:%02d:%02d", $this->horas, $this->minutos, $this->segundos);
}

}


class TestReloj{
    public static function main(): void{
        $reloj= new Reloj(23, 59, 58);
        echo"Hora inicial:. $reloj. \n";
        $reloj->incremento();
        echo"Despues de 1 segundo:".$reloj."\n";
        $reloj->incremento();
        echo"Despues de otro segundo:".$reloj."\n";

        $reloj->puestoAcero();
        echo"Despues de ponerlo a cero:".$reloj."\n";

    }
}

TestReloj::main();