<?php
class Coche
{
    public $combustible;
    public $estado;
    public $deposito;
    public $velocidad;

    public function __construct($combustible = "Gasolina")
    {
        $this->combustible = $combustible;
        $this->estado = "Estacionado";
        $this->deposito = 0;
        $this->velocidad = 0;
    }

    public function __destruct()
    {
        echo "Objeto destruído.\n";
    }

    public function TipoCombustible()
    {
        return $this->combustible;
    }

    public function Estado()
    {
        if ($this->velocidad > 0) {
            return "Avanzando";
        } else {
            return "Estacionado";
        }
    }

    public function NivelDeposito()
    {
        return $this->deposito;
    }

    public function acelerar($litros)
    {
        if ($this->deposito < 10) {
            echo "No se puede avanzar, el coche está estacionado.\n";
        } else {
            $this->deposito -= $litros;
            $this->velocidad += 10;
        }
    }

    public function repostar($combustible, $litros)
    {
        if ($this->combustible === $combustible) {
            $this->deposito += $litros;
        } else {
            echo "¡No se acepta $combustible! Porfavor cambie de combustible.\n";
        }
        return $this->deposito;
    }

    public function frenar()
    {
        $this->velocidad -= 10;
    }
}

$miCoche = new Coche('Gasoil');
echo "Velocidad después de acelerar con el depósito vacío: " . $miCoche->acelerar(10). "\n";
echo "Combustible después de repostar con el combustible equivocado:  " . $miCoche->repostar("Gasolina", 40)."\n";
echo "Combustible después de echar 40 litros de gasóleo: " . $miCoche->repostar("Gasoil", 40) . "\n";
echo "Velocidad después de acelerar con combustible en el depósito: ". $miCoche->acelerar(10). "\n";
echo "Estado del coche: ". $miCoche->Estado() . "\n";
?>