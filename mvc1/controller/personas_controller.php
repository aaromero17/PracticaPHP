<?php
require_once("model/personas_model.php");
$personas=new personas_model();
$matrizpersona=$personas->getPersonas();


require_once("view/personas_view.php");





?>