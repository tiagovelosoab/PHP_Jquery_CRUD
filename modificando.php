<?php
    include "conecta_banco.php";
    $idPessoa=$_POST['idPessoa'];
    $nome=$_POST['nome'];
    $idade=$_POST['idade'];
    $sexo=$_POST['sexo'];
    $arrEndInserirOriginal=json_decode($_POST['enderecoIntMod']);
    $arrEndOriginal=json_decode($_POST['enderecoInt']);
    $arrTelInserirOriginal=json_decode($_POST['telefoneIntMod']);
    $arrTelOriginal=json_decode($_POST['telefoneInt']);
    $arrEndInserir=array();
    $arrEndModificar=array();
    $arrTelModificar=array();
    $arrTelInserir=array();
    foreach($arrEndInserirOriginal as $endereco){
        if(in_array($endereco,$arrEndOriginal)){
            array_push($arrEndModificar,$endereco);
        }else{
            array_push($arrEndInserir,$endereco);
        }
    } 
    foreach($arrTelInserirOriginal as $telefone){
        if(in_array($telefone,$arrTelOriginal)){
            array_push($arrTelModificar,$telefone);
        }else{
            array_push($arrTelInserir,$telefone);
        }
    }
    mysqli_query($conexao,"update pessoa set nome='$nome',idade=$idade,sexo='$sexo' where id=$idPessoa");
    foreach($arrEndInserir as $endereco){
        $numero=$_POST["numero".$endereco];
        $rua=$_POST["rua".$endereco];
        $bairro=$_POST["bairro".$endereco];
        mysqli_query($conexao,"insert into endereço (numero,rua,bairro,pessoa) values($numero,'$rua','$bairro',$idPessoa)");
    }
    foreach($arrEndModificar as $endereco){
        $id=$_POST['idEndereco'.$endereco];
        $numero=$_POST["numero".$endereco];
        $rua=$_POST["rua".$endereco];
        $bairro=$_POST["bairro".$endereco];
        mysqli_query($conexao,"update endereço set rua='$rua', numero=$numero, bairro='$bairro' where id=$id");
    }
    foreach($arrTelInserir as $telefone){
        $ddd=$_POST["ddd".$telefone];
        $tel=$_POST["telefone".$telefone];
        $tipo=$_POST["tipo".$telefone];
        mysqli_query($conexao,"insert into telefone (ddd,telefone,tipo,pessoa) values('$ddd','$tel','$tipo',$idPessoa)");
    }
    foreach($arrTelModificar as $telefone){
        $id=$_POST['idTelefone'.$telefone];
        $ddd=$_POST["ddd".$telefone];
        $tel=$_POST["telefone".$telefone];
        $tipo=$_POST["tipo".$telefone];
        mysqli_query($conexao,"update telefone set ddd='$ddd', telefone='$tel', tipo='$tipo' where id=$id");
    } 
    header("Location:home.php");
?>