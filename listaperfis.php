<?php
    require_once ("classes/ListaPerfis.class.php");
    $Lista = new ListaPerfis("perfis",1);
    echo $Lista->criarFormulario('Lista de Perfis');
?>
