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
        $this->estado = "Estasionado";
        $this->deposito = 0;
        $this->velocidad = 0;
    }

    public function __destruct()
    {
        echo "El objeto esta destruído.\n";
    }

    public function TipoCombustible()
    {
        return $this->combustible;
    }

    public function Estado()
    {
        if ($this->velocidad > 0) {
            return "avanzando";
        } else {
            return "estasionado";
        }
    }

    public function Deposito()
    {
        return $this->deposito;
    }
}


?>