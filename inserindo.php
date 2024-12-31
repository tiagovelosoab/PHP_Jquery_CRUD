<?php
    include "conecta_banco.php";
    $nome=$_POST['nome'];
    $idade=$_POST['idade'];
    $sexo=$_POST['sexo'];
    $i=0;
    $endOriginalArray=json_decode($_POST['enderecoInt']);
    $endArray=array();
    foreach($endOriginalArray as $indice){
        echo $indice;
        $endArray[$i]["rua"]=$_POST['rua'.$indice];
        $endArray[$i]["numero"]=$_POST['numero'.$indice];
        $endArray[$i]["bairro"]=$_POST['bairro'.$indice];
        $i++;
    }
    $i=0;
    $telOriginalArray=json_decode($_POST['telefoneInt']);
    $telArray=array();
    foreach($telOriginalArray as $indice){
        $telArray[$i]["ddd"]=$_POST['ddd'.$indice];
        $telArray[$i]["telefone"]=$_POST['telefone'.$indice];
        $telArray[$i]["tipo"]=$_POST['tipo'.$indice];
        $i++;
    }
    mysqli_query($conexao,"insert into pessoa (nome,idade,sexo) values ('$nome',$idade,'$sexo')");
    $id=mysqli_insert_id($conexao);
    $i=0;
    while($i<count($endOriginalArray)){
        $rua=$endArray[$i]['rua'];
        $numero=$endArray[$i]['numero'];
        $bairro=$endArray[$i]['bairro'];
        mysqli_query($conexao,"insert into endereço (pessoa,numero,rua,bairro) values ($id,$numero,'$rua','$bairro')");
        $i++;
    }
    $i=0;
    while($i<count($telOriginalArray)){
        $ddd=$telArray[$i]['ddd'];
        $telefone=$telArray[$i]['telefone'];
        $tipo=$telArray[$i]['tipo'];
        mysqli_query($conexao,"insert into telefone (pessoa,ddd,telefone,tipo) values ($id,'$ddd','$telefone','$tipo')");
        $i++;
    }
    header("location: home.php");
?>