<?php
if (!isset($_POST['id'])) {
    header("Location:home.php");
}
include "funcoes.php";
imprime_cabecalho("Edição");
$id = $_POST['id'];
?>
<div class="container">
    <h1 style="text-align:center">Editando Contatos</h1> <br>
    <a href="home.php">Voltar a página inicial</a>
    <br><br>
    <form method="post" id="form" action="modificando.php">
        <?php imprime_pessoa($id) ?>
        <div id="endereco_form">
            <?php imprime_endereco($id) ?>
        </div><br>
        <div class="row">
            <div class="col text-right">
                <button id="adicionarEnd" style="border-width:1px;outline: none !important;"><i class="bi bi-plus"></i></button>
            </div>
        </div> <br>
        <div id="telefone_form">
            <?php imprime_telefone($id) ?>
        </div><br>
        <div class="row">
            <div class="col text-right">
                <button id="adicionarTel" style="border-width:1px;outline: none !important;"><i class="bi bi-plus"></i></button>
            </div>
        </div> <br>
        <input type="text" id="enderecoInt" name="enderecoInt" style="display:none">
        <input type="text" id="telefoneInt" name="telefoneInt" style="display:none">
        <input type="text" id="enderecoIntMod" name="enderecoIntMod" style="display:none">
        <input type="text" id="telefoneIntMod" name="telefoneIntMod" style="display:none">
        <div class="row">
            <div class="col text-center">
                <button class="btn btn-outline-success" type="submit">Salvar mudanças</button> 
                <p id='alert' style="color:red"></p>
            </div>
        </div>
        <br>
    </form>
</div>
<script>
    $(document).ready(function() {
        let arrayend = [];
        let arraytel = [];
        /* eendereco e telefone foram declarados em imprime_endereco e imprime_telefone */
        for (let i = 1; i <= endereco; i++) {
            arrayend.push(i);
        }
        for (let i = 1; i <= telefone; i++) {
            arraytel.push(i);
        }
        document.getElementById('enderecoInt').value = JSON.stringify(arrayend);
        document.getElementById('telefoneInt').value = JSON.stringify(arraytel);
        document.getElementById('enderecoIntMod').value = JSON.stringify(arrayend);
        document.getElementById('telefoneIntMod').value = JSON.stringify(arraytel);
        document.getElementById('form').addEventListener('submit', function(e) {
            let idade = document.getElementById('idade').value;
            if (idade < 0 || idade > 150) {
                e.preventDefault();
                document.getElementById('alert').innerHTML='A idade deve estar entre 0 e 150';
            }
        });
        $('#adicionarEnd').click(function(e) {
            e.preventDefault();
            endereco += 1;
            let aux = JSON.parse(document.getElementById('enderecoIntMod').value);
            aux.push(endereco);
            document.getElementById('enderecoIntMod').value = JSON.stringify(aux);
            let append = `
            <div id="end${endereco}">
                <br><br>
                <div class="card">
                    <div class="card-header" style="background-color: #EBFAEB;">
                        <strong>Endereço nº${endereco}</strong>
                    </div>
                    <div class="card-body" style="border-radius:5px;">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="rua">Rua</label>
                                <input type="text" class="form-control-md" size="60%" maxlength="80" required id="rua" name="rua${endereco}">
                            </div>
                            <div class="col-sm-2">
                                <label for="numero">Número</label>
                                <input type="number" style="width:59.1%" required id="numero" name="numero${endereco}">
                            </div>
                            <div class="col-sm-4">
                                <label for="bairro">Bairro</label>
                                <input type="text" class="form-control-md" size="30%" maxlength="30" required id="bairro" name="bairro${endereco}">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="excluirEnd" style="border-width:1px; margin-top:0.5%; outline: none !important;" id="excluirEnd${endereco}"><i class="bi bi-trash" ></i></button> <br>
            </div>`;
            $('#endereco_form').append(append);
        });


        $('#adicionarTel').click(function(e) {
            e.preventDefault();
            telefone += 1;
            let aux = JSON.parse(document.getElementById('telefoneIntMod').value);
            aux.push(telefone);
            document.getElementById('telefoneIntMod').value = JSON.stringify(aux);
            let append = `
            <div id="tel${telefone}">
                <br><br>
                <div class="card">
                    <div class="card-header" style="background-color: #EBF0FF;">
                        <strong>Telefone n°${telefone}</strong>
                    </div>
                    <div class="card-body" style="border-radius:5px;">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="ddd">DDD</label>
                                <input type="text" class="form-control-md" style="width:30%;" maxlength="4" required id="ddd" name="ddd${telefone}">
                            </div>
                            <div class="col-sm-4">
                                <label for="telefone">Telefone</label>
                                <input type="tel" class="form-control-md" minlength="8" maxlength="9" id="telefone" name="telefone${telefone}">
                            </div>
                            <div class="col-sm-4">
                                <label for="tipo" style="margin-left:15%">Tipo</label>
                                <select name=tipo${telefone} class="form-select" required id="tipo">
                                    <option value="F">Fixo</option>
                                    <option value="C">Celular</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="excluirTel" style="border-width:1px; margin-top:0.5%;outline: none !important;" id="excluirTel${telefone}"><i class="bi bi-trash"></i></button>
            </div> <br>
            `;
            $('#telefone_form').append(append);
        });

        $(document).on('click', '.excluirEnd', function(e) {
            e.preventDefault();
            id = $(this).attr('id');
            id = id.split('excluirEnd')[1];
            arrModificado = JSON.parse(document.getElementById('enderecoIntMod').value);
            arrOriginal = JSON.parse(document.getElementById('enderecoInt').value);
            if (arrModificado.includes(Number(id)) && !arrOriginal.includes(Number(id))) {
                arrModificado = arrModificado.filter(item => item != id);
                id = "end" + id;
                $('#' + id).remove();
                document.getElementById('enderecoIntMod').value = JSON.stringify(arrModificado);
            } else if (arrModificado.includes(Number(id)) && arrOriginal.includes(Number(id))) {
                let tamanhoOriginal = 0;
                for (let i of arrOriginal) {
                    tamanhoOriginal++;
                }
                if (tamanhoOriginal > 1) {
                    if (confirm('Deseja realmente excluir definitivamente este endereço?')) {
                        let endereco_selecionado = document.getElementById('idEndereco' + id).value;
                        $.ajax({
                            url: "deletando_selecionados.php",
                            type: "POST",
                            data: {
                                endereco_selecionado: endereco_selecionado
                            },
                            success: function() {
                                arrModificado = arrModificado.filter(item => item != id);
                                arrOriginal = arrOriginal.filter(item => item != id);
                                id = "end" + id;
                                $('#' + id).remove();
                                document.getElementById('enderecoIntMod').value = JSON.stringify(arrModificado);
                                document.getElementById('enderecoInt').value = JSON.stringify(arrOriginal);
                            }
                        })
                    }
                }
            }
        });

        $(document).on('click', '.excluirTel', function(e) {
            e.preventDefault();
            id = $(this).attr('id');
            id = id.split('excluirTel')[1];
            arrModificado = JSON.parse(document.getElementById('telefoneIntMod').value);
            arrOriginal = JSON.parse(document.getElementById('telefoneInt').value);
            if (arrModificado.includes(Number(id)) && !arrOriginal.includes(Number(id))) {
                arrModificado = arrModificado.filter(item => item != id);
                id = "tel" + id;
                $('#' + id).remove();
                document.getElementById('telefoneIntMod').value = JSON.stringify(arrModificado);
            } else if (arrModificado.includes(Number(id)) && arrOriginal.includes(Number(id))) {
                let tamanhoOriginal = 0;
                for (let i of arrOriginal) {
                    tamanhoOriginal++;
                }
                if (tamanhoOriginal > 1) {
                    if (confirm('Deseja realmente excluir definitivamente este telefone?')) {
                        let telefone_selecionado = document.getElementById('idTelefone' + id).value;
                        $.ajax({
                            url: "deletando_selecionados.php",
                            type: "POST",
                            data: {
                                telefone_selecionado: telefone_selecionado
                            },
                            success: function() {
                                arrModificado = arrModificado.filter(item => item != id);
                                arrOriginal = arrOriginal.filter(item => item != id);
                                id = "tel" + id;
                                $('#' + id).remove();
                                document.getElementById('telefoneIntMod').value = JSON.stringify(arrModificado);
                                document.getElementById('telefoneInt').value = JSON.stringify(arrOriginal);
                            }
                        })
                    }
                }
            }
        });
    });
</script>
</body>

</html>