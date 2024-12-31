<?php
    include "funcoes.php";
    if(isset($_POST['limit']) and isset($_POST['offset']) and isset($_POST['ordena']) and isset($_POST['busca']) ){
        mostrar($_POST['ordena'], $_POST['busca'], $_POST['limit'], $_POST['offset']);
    }
?>