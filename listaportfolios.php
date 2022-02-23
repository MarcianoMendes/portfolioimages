<?php
    require_once ("classes/ListaPortfolios.class.php");
    $Lista = new ListaPortfolios("portfolios",1);
    echo $Lista->criarFormulario('Lista de Portfólios');
?>
