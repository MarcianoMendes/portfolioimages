<?php
    require_once ("classes/ListaUsuarios.class.php");
    $Lista = new ListaUsuarios("usuarios",1);
    echo $Lista->criarFormulario('Lista de Usuários');
?>
