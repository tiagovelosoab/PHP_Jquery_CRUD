<?php
include "conecta_banco.php";
    if(isset($_POST["deletados"])){
        $arr_original=$_POST["deletados"];
        $ids=array();
        foreach($arr_original as $valor){
           array_push($ids,explode("k",$valor)[1]);
        }
        foreach($ids as $id){
            mysqli_query($conexao,"delete from pessoa where id=$id");
        }
        exit;
    }
    if(isset($_POST['id_selecionado'])){
        $id=$_POST["id_selecionado"];
        $query=mysqli_query($conexao,"delete from pessoa where id=$id");
        exit;
    }
    if(isset($_POST['endereco_selecionado'])){
        $id=$_POST["endereco_selecionado"];
        $query=mysqli_query($conexao,"delete from endereço where id=$id");
        exit;
    }
    if(isset($_POST['telefone_selecionado'])){
        $id=$_POST["telefone_selecionado"];
        $query=mysqli_query($conexao,"delete from telefone where id=$id");
        exit;
    }
?>