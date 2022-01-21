<?php

Class Auto{
    protected $rueda;//para que la clase camion pueda accerder
    public $color;
    public $motor;

    function __construct(){
        $this->rueda=4;
        $this->color="";
        $this->motor=1600;

    }

    function arrancar(){
        echo "estoy arrancando <br>";

    }
    function frenar(){
        echo "estoy frenando<br>";

    }
    function girar(){
        echo "estoy girando<br>";

    }



    function set_color($colorauto){
        $this->color=$colorauto;
        echo "el color es $this->color <br>";
    }
    function get_ruedas(){
        return  $this->rueda;
    }
}


Class Camion extends Auto{
    public $rueda;
    public $color;
    public $motor;

    function __construct(){
        $this->rueda=12;
        $this->color="";
        $this->motor=1600;

    }
    function asignacolor($colorcamion){
        $this->color=$colorcamion;
        echo "el color del camion es $this->color <br>";
    }
    function arrancar(){

        Auto::arrancar();
        echo "el camion arranco<br>";
    }
}