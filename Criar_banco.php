<?php
    include "conecta_banco.php";
    $nomes=array("João","Maria","Fernando","Fernanda","Joaquim","Gabriela","Gabriel","Jamile","Jonas","Guilhermina");
    $sobrenomes=array("de Sousa","de Alencar","Silva","Gomes","Farias","Brito","Alves","de Sá","Marques","Santos");
    $logradouro=array("rua","travessa","avenida","alameda","largo");
    $nome_rua=array(
        "Rio Branco", "Maceió", "Macapá", "Manaus", "Salvador", 
        "Fortaleza", "Brasília", "Vitória", "Goiânia", "São Luís",
        "Cuiabá", "Campo Grande", "Belo Horizonte", "Belém", "João Pessoa",
        "Curitiba", "Recife", "Teresina", "Rio de Janeiro", "Natal", 
        "Porto Alegre", "Porto Velho", "Boa Vista", "Florianópolis", 
        "São Paulo", "Aracaju", "Palmas"
    );
    $bairros = array(
        "Vila Madalena", "Leblon", "Copacabana", "Itaim Bibi", "Jardim Botânico", 
        "Moema", "Barra Funda", "Centro", "Pinheiros", "Tatuapé", 
        "Liberdade", "Santa Cecília", "Vila Progredior", "Jardim Paulista", "Campo Belo"
    );
    for($i=0;$i<30;$i++){
        $pos_nome=rand(0,9);
        $nome_completo=$nomes[$pos_nome]." ".$sobrenomes[rand(0,9)];
        $sexo=$pos_nome%2==0?"Masculino":"Feminino";
        $idade=rand(18,80);
        mysqli_query($conexao,"insert into pessoa (nome,idade,sexo) values ('$nome_completo',$idade,'$sexo');");
        $id=mysqli_insert_id($conexao);
        $ddd=rand(0,9)*10+rand(0,9);
        $tipo=rand(0,1)?"F":"C";
        $tel=rand(100000000, 999999999);
        mysqli_query($conexao,"insert into telefone (ddd,telefone,tipo,pessoa) values ('$ddd','$tel','$tipo',$id);");
        $rua=$logradouro[rand(0,sizeof($logradouro)-1)]." ".$nome_rua[rand(0,sizeof($nome_rua)-1)];
        $bairro=$bairros[rand(0,sizeof($bairros)-1)];
        $numero=rand(1,1000);
        mysqli_query($conexao,"insert into endereço (rua,numero,bairro,pessoa) values ('$rua','$numero','$bairro',$id);");
    }
    for($i=1;$i<31;$i++){
        for($j=0;$j<rand(0,3);$j++){
            $ddd=rand(0,9)*10+rand(0,9);
            $tipo=rand(0,1)?"F":"C";
            $tel=rand(100000000, 999999999);
            mysqli_query($conexao,"insert into telefone (ddd,telefone,tipo,pessoa) values ('$ddd','$tel','$tipo',$i);");
            $rua=$logradouro[rand(0,sizeof($logradouro)-1)]." ".$nome_rua[rand(0,sizeof($nome_rua)-1)];
            $bairro=$bairros[rand(0,sizeof($bairros)-1)];
            $numero=rand(1,1000);
            mysqli_query($conexao,"insert into endereço (rua,numero,bairro,pessoa) values ('$rua','$numero','$bairro',$i);");
        }
    }   
    echo "criação bem sucedida";
?>