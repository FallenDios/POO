<?php 

class Calculadora {
    private float $num1;
    private float $num2;

    public function __construct(float $num1, float $num2){
        $this->num1 = $num1;
        $this->num2 = $num2;
    }

    //Metodos Getters

    public function getNum1():float{
        return $this->num1;
    }

    public function getNum2():float{
        return $this->num2;
    }

    //Metodos Setters

    public function setNum1(float $num1):void{
        $this->num1 = $num1;
    }

    public function setNum2(float $num2):void{
        $this->num2 = $num2;
    }

    //Metodos de operaciones

    public function sumar():float{
        return $this->num1 + $this->num2;
    }

    public function restar():float{
        return $this->num1 - $this->num2;
    }

    public function multiplicar():float{
        return $this->num1 * $this->num2;
    }

    public function dividir(): ?float {
        return ($this->num2 != 0) ?  $this->num1 / $this->num2 : null;
    }
    


    //Metodo toString

    public function __toString(): string {
        return "Numero 1: {$this->num1}, Numero 2: {$this->num2}";
    }
    
}

// Clase de prueba TestCalculadora

class TestCalculadora{
    public static function probar(): string{
        $calc = new Calculadora(10, 5);

        $resultado = "Valores iniciales:". $calc ."\n";
        $resultado .= "Suma:" . $calc->sumar() ."\n";
        $resultado .= "Resta:". $calc->restar() ."\n";
        $resultado .= "Multiplicacion:". $calc->multiplicar() ."\n";
        $resultado .= "Division:". ($calc->dividir() ?? "Error: Division por cero") ."\n";


        // Modificar Valores

        $calc->setNum1(20);
        $calc->setNum2(4);

        $resultado .= "Valores modificados:". $calc ."\n";
        $resultado .= "Nueva division: ". $calc->dividir()."\n";

        return $resultado;

    }
    }

//Ejutador de test

echo TestCalculadora::probar();