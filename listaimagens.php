<?php
    require_once ("classes/ListaImagens.class.php");
    $Lista = new ListaImagens("imagens",1);
    echo $Lista->criarFormulario('Lista de Imagens');
?>
