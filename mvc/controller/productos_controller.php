<?php
require_once("model/productos_model.php");
$producto=new productos_model();
$matrizproducto=$producto->getProductos();


require_once("view/productos_view.php");





?>