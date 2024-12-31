<?php
include "funcoes.php";
imprime_cabecalho("Listagem");
?>
<div class="container">
    <h1 style="text-align:center">Listagem de pessoas</h1>
    <br><br>
    <div class="row">
        <div class="col-sm-4">
            <form method="get" action="home.php">
                <div class="input-group">
                    <input class="form-control-md" type="text" name="busca" placeholder="Busca por nome" value=<?= isset($_GET["busca"]) ? $_GET["busca"] : "" ?>>
                    <button style='border-width:1px;' type="submit"> <i class="bi bi-search"></i></button>
                </div>
                <input type="text" style="display:none" name="ordenar" value='<?= isset($_GET["ordenar"]) ? $_GET["ordenar"] : "p.id" ?>'>
            </form>
        </div>
        <div class="col-sm-4" style="margin-left:10%">
            <label for="ordenar">Ordenar por:</label>
            <select class="form-select" id="ordenar" name="ordenar" onchange="select(busca)">
                <option value="p.id" <?= (isset($_GET["ordenar"]) && $_GET["ordenar"] == "p.id") ? "selected" : "" ?>>ID</option>
                <option value="p.nome" <?= (isset($_GET["ordenar"]) && $_GET["ordenar"] == "p.nome") ? "selected" : "" ?>>Nome</option>
                <option value="p.idade" <?= (isset($_GET["ordenar"]) && $_GET["ordenar"] == "p.idade") ? "selected" : "" ?>>Idade</option>
                <option value="telefone" <?= (isset($_GET["ordenar"]) && $_GET["ordenar"] == "telefone") ? "selected" : "" ?>>Telefone</option>
                <option value="endereço" <?= (isset($_GET["ordenar"]) && $_GET["ordenar"] == "endereço") ? "selected" : "" ?>>Endereço</option>
            </select>
        </div>
        <div class="col-sm-2" style="text-align: right; margin-left:5%">
            <a href="inserir.php">Inserir nova pessoa</a>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-striped">
        <tr>
            <th><input id="seleciona_tudo" type="checkbox" name="excluir"></th>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Sexo</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>

        <?php
        if (!isset($_GET["ordenar"])) {
            $_GET["ordenar"] = "p.id";
        }
        if (!isset($_GET["busca"])) {
            $_GET["busca"] = "";
        }
        mostrar($_GET["ordenar"], $_GET["busca"], 5, 0);
        ?>
        <tbody id="dados_adicionais"></tbody>
    </table> <br>
    <div class="row">
        <div class="col text-left">
            <button class="btn btn-outline-danger" id="deleta_selecionados">Deleção múltipla</button>
        </div>
        <div class="col text-center">
            <button class="btn btn-link" id="ver_mais">Ver mais</button>
        </div>
        <div class="col text-right">
            <button class="btn btn-outline-warning" id="ver_tudo">Ver tudo</button>
        </div>
    </div>
</div> <br>
<script>
    let result = '';
    let limit = 5;
    let offset = 0;
    let ordena = '<?= isset($_GET["ordenar"]) ? $_GET["ordenar"] : "p.id" ?>';
    let busca = '<?= isset($_GET["busca"]) ? $_GET["busca"] : "" ?>';

    function select(busca) {
        let valor = document.getElementById("ordenar").value;
        window.location.href = "home.php?ordenar=" + valor + "&busca=" + busca;
    }

    function aumenta_lim(ver_tudo) {
        if (limit == Number.MAX_SAFE_INTEGER) {
            offset = Number.MAX_SAFE_INTEGER;
        } else if (limit == 5 && !ver_tudo) {
            limit += 5;
            offset += 5;
        } else if (!ver_tudo) {
            offset += 10;
        } else if (limit == 5 && ver_tudo) {
            offset += 5;
            limit = Number.MAX_SAFE_INTEGER;
        } else {
            offset += 10;
            limit = Number.MAX_SAFE_INTEGER;
        }
    }
    $(document).ready(function() {
        $("#ver_mais").click(function() {
            aumenta_lim(false);
            $.ajax({
                url: "dados_adicionais.php",
                type: "POST",
                data: {
                    limit: limit,
                    offset: offset,
                    ordena: ordena,
                    busca: busca
                },
                success: function(resposta) {
                    result += resposta;
                    document.getElementById('dados_adicionais').innerHTML = result;
                }
            });
        });
        $("#ver_tudo").click(function() {
            let confirmacao = window.confirm("Deseja realmente ver tudo? Pode não caber na página");
            if (confirmacao) {
                aumenta_lim(true);
                $.ajax({
                    url: "dados_adicionais.php",
                    type: "POST",
                    data: {
                        limit: limit,
                        offset: offset,
                        ordena: ordena,
                        busca: busca
                    },
                    success: function(resposta) {
                        result += resposta;
                        document.getElementById('dados_adicionais').innerHTML = result;
                    }
                });
            }
        });
        $("#seleciona_tudo").click(function() {
            if (document.getElementById('seleciona_tudo').checked == true) {
                $(".seleciona").prop("checked", true);
                result = result.replaceAll("unchecked", "checked");
            } else {
                $(".seleciona").prop("checked", false);
                result = result.replaceAll("checked", "unchecked");
            }
        });
        $(document).on('click', '.seleciona', function() {
            let id = $(this).attr('id');
            if (document.getElementById(id).checked == true) {
                result = result.replace("<input class='seleciona' id=" + id + " unchecked type='checkbox' name='excluir'>", "<input class='seleciona' id=" + id + " checked type='checkbox' name='excluir'>");
            } else {
                result = result.replace("<input class='seleciona' id=" + id + " checked type='checkbox' name='excluir'>", "<input class='seleciona' id=" + id + " unchecked type='checkbox' name='excluir'>");
            }
        });
        $(document).on('click','.deleta_especifico',function(){
            let id = $(this).attr('id');
            let nome=id.split('/')[1];
            if(confirm('Deseja realmente deletar o usuário '+nome+'?')){
                id=id.split('/')[0];
                $.ajax({
                url: 'deletando_selecionados.php',
                type: 'POST',
                data: {
                    id_selecionado:id
                },
                 success: function(response) {
                    alert('Exclusão confirmada');
                    location.reload();
                },
            });
            }
            
        });
        $('#deleta_selecionados').click(function() {
            let deletados = [];
            $('tr input:checkbox:checked').each(function() {
                deletados.push($(this).attr("id"));
            });
            if (deletados.length == 0) {

            } else if (window.confirm("Deseja mesmo excluir as pessoas selecionadas?")) {
                $.ajax({
                    url: "deletando_selecionados.php",
                    type: "POST",
                    data: {
                        deletados: deletados
                    },
                    success: function() {
                        location.reload();
                    }
                });
            }
        });
    });
</script>
</body>

</html>