<?php
include "conecta_banco.php";
function mostrar($ordena, $busca, $limit, $offset)
{   
    $query = mysqli_query(
        $GLOBALS["conexao"],
        "select p.id, p.nome, p.sexo, p.idade,
        (select concat(t.ddd,' ',t.telefone) from telefone t WHERE t.pessoa = p.id limit 1) as telefone, 
        (select concat(e.rua,', n° ',e.numero,', ',e.bairro) from endereço e WHERE e.pessoa = p.id limit 1) as endereço
        from pessoa p 
        inner join endereço e on p.id=e.pessoa 
        inner join telefone t on p.id=t.pessoa
        where p.nome like '%$busca%' group by p.id 
        order by $ordena asc limit $limit offset $offset"
    );
    while ($linha = mysqli_fetch_array($query)) {
        /* Unchecked não faz nada já que não existe, porém ele será útil quando manipularmos a variavel
        result durante a manipulação de checkbox com jquery*/
        echo "<tr>" .
            "<th><input class='seleciona' id=check".$linha['id']." unchecked type='checkbox' name='excluir'></th>".
            "<td>" . $linha['id'] . "</td>" .
            "<td>" . $linha['nome'] . "</td>" .
            "<td>" . $linha['idade'] . "</td>" .
            "<td>" . $linha['sexo'] . "</td>" .
            "<td>" . $linha['telefone'] . "</td>" .
            "<td>" . $linha['endereço'] . "</td>" .
            "<td>" .
                "<form method='POST' action='editar.php'>".
                    "<button style='border-width:1px; margin-left:19%;' type='submit'><i class='bi bi-pencil'></i></button>" .
                    "<input style='display:none' name='id' value='". $linha['id'] ."'>".
                "</form>".
            "</td>" .
            "<td>" .
                "<button id='".$linha['id'].'/'.$linha['nome']."' class='deleta_especifico' style='border-width:1px; margin-left:19%;' type='submit'><i class='bi bi-trash'></i></button>" .
            "</td>" . "</tr>";
    }
    mysqli_free_result($query);
}

function imprime_cabecalho($titulo)
{
    echo '<!DOCTYPE html>
        <html lang="pt">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="IE-edge">
            <title>' . $titulo . '</title>
            <link rel="stylesheet" href="css/mycss.css">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link href="bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        </head>
        
        <body>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/funcoes.js"></script>';
};

function imprime_pessoa($id)
{
    $query = mysqli_query($GLOBALS['conexao'], "SELECT id,nome,idade,sexo FROM pessoa WHERE id=$id");
    $linha = mysqli_fetch_array($query);
    echo '
        <div class="card">
            <div class="card-header" style="background-color: #FFFFE6;">
                <strong>Pessoa</strong>
            </div>
            <div class="card-body" style="border-radius:5px;">
                <div class="row">
                <input type="number" style="display:none" value="' . $linha["id"] . '" name="idPessoa">
                    <div class="col-sm-6">
                        <label for="nome">Nome Completo</label>
                        <input value="' . $linha["nome"] . '" type="text" class="form-control-md" size="45%" maxlength="50" required id="nome" name="nome">
                    </div>
                    <div class="col-sm-3">
                        <label style="margin-left:10%" for="idade">Idade</label>
                        <input value="' . $linha["idade"] . '" required type="number" style="width:40%;" class="form-control-md" id="idade" name="idade">
                    </div>
                    <div class="col-sm-3">
                        <label for="sexo">Sexo</label>
                        <select name="sexo" class="form-select" required id="sexo">
                            <option ' . ($linha["sexo"] == "Masculino" ? 'selected' : '') . ' value="Masculino">Masculino</option>
                            <option ' . ($linha["sexo"] == "Feminino" ? 'selected' : '') . ' value="Feminino">Feminino</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <br>
    ';
    mysqli_free_result($query);
}

function imprime_endereco($id)
{
    $query = mysqli_query($GLOBALS['conexao'], "select id,rua,numero,bairro from endereço where pessoa=$id");
    $enderecoCont=0;
    while($linha=mysqli_fetch_array($query)){
        $enderecoCont++;
        echo'
            <div id="end'.$enderecoCont.'"> 
            <br> 
                <div class="card">
                    <div class="card-header" style="background-color: #EBFAEB;">
                        <strong>Endereço nº'.$enderecoCont.'</strong>
                    </div>
                    <div class="card-body" style="border-radius:5px;">
                        <input type="number" style="display:none" value="' . $linha["id"] . '"id="idEndereco'.$enderecoCont.'" name="idEndereco'.$enderecoCont.'">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="rua">Rua</label>
                                <input type="text" class="form-control-md" size="60%" value="'.$linha["rua"].'" maxlength="80" required id="rua" name="rua'.$enderecoCont.'">
                            </div>
                            <div class="col-sm-2">
                                <label for="numero">Número</label>
                                <input type="number" style="width:59.1%"  value="'.$linha["numero"].'" required id="numero" name="numero'.$enderecoCont.'">
                            </div>
                            <div class="col-sm-4">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control-md" size="30%"  value="'.$linha["bairro"].'" maxlength="30" required id="bairro" name="bairro'.$enderecoCont.'">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="excluirEnd" style="border-width:1px; margin-top:0.5%;outline: none !important;" id="excluirEnd'.$enderecoCont.'"><i class="bi bi-trash"></i></button>
                <br>
            </div>';
    }
    mysqli_free_result($query);
    echo "<script>let endereco=$enderecoCont</script>";
}

function imprime_telefone($id) {
    $query = mysqli_query($GLOBALS['conexao'], "select id,ddd,telefone,tipo from telefone where pessoa=$id;");
    $telefoneCont=0;
    while($linha=mysqli_fetch_array($query)){
        $telefoneCont++;
        echo'
        <div id="tel'.$telefoneCont.'">
            <br>
            <div class="card">
                    <div class="card-header" style="background-color: #EBF0FF;">
                        <strong>Telefone n°'.$telefoneCont.'</strong>
                    </div>
                    <div class="card-body" style="border-radius:5px;">
                        <input type="number" style="display:none" value="' . $linha["id"] . '"id="idTelefone'.$telefoneCont.'" name="idTelefone'.$telefoneCont.'">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="ddd">DDD</label>
                                <input type="text" class="form-control-md" style="width:30%;" value="'.$linha["ddd"].'" maxlength="4" required id="ddd" name="ddd'.$telefoneCont.'">
                            </div>
                            <div class="col-sm-4">
                                <label for="telefone">Telefone</label>
                                <input type="tel" class="form-control-md" value="'.$linha["telefone"].'" minlength="8" maxlength="9" id="telefone" name="telefone'.$telefoneCont.'">
                            </div>
                            <div class="col-sm-4">
                                <label for="tipo" style="margin-left:15%">Tipo</label>
                                <select name="tipo'.$telefoneCont.'" required class="form-select" id="tipo">
                                    <option ' . ($linha["tipo"] == "F" ? 'selected' : '') . ' value="F">Fixo</option>
                                    <option ' . ($linha["tipo"] == "C" ? 'selected' : '') . ' value="C">Celular</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="excluirTel" style="border-width:1px; margin-top:0.5%;outline: none !important;" id="excluirTel'.$telefoneCont.'"><i class="bi bi-trash"></i></button>
                <br>
            </div>';
    }
    mysqli_free_result($query);
    echo "<script>let telefone=$telefoneCont</script>";
}
