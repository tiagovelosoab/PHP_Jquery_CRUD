<?php
include "funcoes.php";
imprime_cabecalho("Inserção");

?>
<div class="container">
    <h1 style="text-align:center">Inserir novos Contatos</h1> <br>
    <a href="home.php">Voltar a página inicial</a>
    <br><br>
    <form id="form" method="post" action="inserindo.php">
        <div class="card">
            <div class="card-header" style="background-color: #FFFFE6;">
                <strong>Pessoa</strong>
            </div>
            <div class="card-body" style="border-radius:5px;">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="nome">Nome Completo</label>
                        <input class="form-control-md" size="45%" type="text" maxlength="50" required id="nome" name="nome">
                    </div>
                    <div class="col-sm-3">
                        <label style="margin-left:10%" for="idade">Idade</label>
                        <input style="width:40%;" class="form-control-md" required type="number" id="idade" name="idade">
                    </div>
                    <div class="col-sm-3">
                        <label for="sexo">Sexo</label>
                        <select class="form-select" name="sexo" required id="sexo">
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div id="endereco_form">
            <div id="end1">
                <br><br>
                <div class="card" id="end1">
                    <div class="card-header" style="background-color: #EBFAEB;">
                        <strong>Endereço nº1</strong>
                    </div>
                    <div class="card-body" style="border-radius:5px;">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="rua">Rua</label>
                                <input class="form-control-md" size="60%" type="text" maxlength="80" required id="rua" name="rua1">
                            </div>
                            <div class="col-sm-2">
                                <label for="numero">Número</label>
                                <input type="number" style="width:59.1%" required id="numero" name="numero1">
                            </div>
                            <div class="col-sm-4">
                                <label for="bairro">Bairro</label>
                                <input class="form-control-md" size="30%" type="text" maxlength="30" required id="bairro" name="bairro1">
                            </div>
                        </div>
                    </div>
                </div>
                <button style="border-width:1px; margin-top:0.5%; outline: none !important;" class="excluirEnd" id="excluirEnd1"><i class="bi bi-trash"></i> </button> <br>
            </div>
        </div>
        <div class="row">
            <div class="col text-right">
                <button style="border-width:1px;outline: none !important;" id="adicionarEnd"><i class="bi bi-plus"></i></button>
            </div>
        </div>
        <div id="telefone_form">
            <div id="tel1">
                <br><br>
                <div class="card">
                    <div class="card-header" style="background-color: #EBF0FF;">
                        <strong>Telefone n°1</strong>
                    </div>
                    <div class="card-body" style="border-radius:5px;">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="ddd">DDD</label>
                                <input class="form-control-md" style="width:30%;" type="text" maxlength="4" required id="ddd" name="ddd1">
                            </div>
                            <div class="col-sm-4">
                                <label for="telefone">Telefone</label>
                                <input class="form-control-md" type="tel" minlength="8" maxlength="9" id="telefone" name="telefone1">
                            </div>
                            <div class="col-sm-4">
                                <label style="margin-left:15%" for="tipo">Tipo</label>
                                <select name="tipo1" class="form-select" required id="tipo">
                                    <option value="F">Fixo</option>
                                    <option value="C">Celular</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button style="border-width:1px; margin-top:0.5%;outline: none !important;" class="excluirTel" id="excluirTel1"><i class="bi bi-trash"></i></button> <br>
            </div>
        </div>
        <div class="row">
            <div class="col text-right">
                <button style="border-width:1px; outline: none !important;" id="adicionarTel"><i class="bi bi-plus"></i></button>
            </div>
        </div>
        <br><br>
        <input type="text" id="enderecoInt" name="enderecoInt" style="display:none">
        <input type="text" id="telefoneInt" name="telefoneInt" style="display:none">
        <div class="row">
            <div class="col text-center">
                <button class="btn btn-outline-primary" type="submit">Enviar</button>
                <p id='alert' style="color:red"></p>
            </div>
        </div>
        <br>
    </form>
</div>
<script>
    $(document).ready(function() {
        let endereco = 1;
        let telefone = 1;
        let arrayend = [1];
        let arraytel = [1];
        document.getElementById('enderecoInt').value = JSON.stringify(arrayend);
        document.getElementById('telefoneInt').value = JSON.stringify(arraytel);
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
            let aux = JSON.parse(document.getElementById('enderecoInt').value);
            aux.push(endereco);
            document.getElementById('enderecoInt').value = JSON.stringify(aux);
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
                                <input class="form-control-md" size="60%" type="text" maxlength="80" required id="rua" name="rua${endereco}">
                            </div>
                            <div class="col-sm-2">
                                <label for="numero">Número</label>
                                <input type="number" style="width:59.1%" required id="numero" name="numero${endereco}">
                            </div>
                            <div class="col-sm-4">
                                <label for="bairro">Bairro</label>
                                <input class="form-control-md" size="30%" type="text" maxlength="30" required id="bairro" name="bairro${endereco}">
                            </div>
                        </div>
                    </div>
                </div>
                <button style="border-width:1px; margin-top:0.5%; outline: none !important;" class="excluirEnd" id="excluirEnd${endereco}"><i class="bi bi-trash"></i></button> <br>
            </div>`;
            $('#endereco_form').append(append);
        });
        $(document).on('click', '.excluirEnd', function(e) {
            e.preventDefault();
            let aux = JSON.parse(document.getElementById('enderecoInt').value);
            if (aux.length >= 2) {
                let id = $(this).attr('id');
                id = id.split('excluirEnd')[1];
                aux = aux.filter(item => item != id);
                id = "end" + id;
                $('#' + id).remove();
                document.getElementById('enderecoInt').value = JSON.stringify(aux);
            }
        });
        $('#adicionarTel').click(function(e) {
            e.preventDefault();
            telefone += 1;
            let aux = JSON.parse(document.getElementById('telefoneInt').value);
            aux.push(telefone);
            document.getElementById('telefoneInt').value = JSON.stringify(aux);
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
                                <input class="form-control-md" style="width:30%;" type="text" maxlength="4" required id="ddd" name="ddd${telefone}">
                            </div>
                            <div class="col-sm-4">
                                <label for="telefone">Telefone</label>
                                <input class="form-control-md" type="tel" minlength="8" maxlength="9" id="telefone" name="telefone${telefone}">
                            </div>
                            <div class="col-sm-4">
                                <label style="margin-left:15%" for="tipo">Tipo</label>
                                <select name=tipo${telefone} class="form-select" required id="tipo">
                                    <option value="F">Fixo</option>
                                    <option value="C">Celular</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <button style="border-width:1px; margin-top:0.5%; outline: none !important;" class="excluirTel" id="excluirTel${telefone}"><i class="bi bi-trash"></i></button> <br>
            </div>
            `;
            $('#telefone_form').append(append);
        });
        $(document).on('click', '.excluirTel', function(e) {
            e.preventDefault();
            let aux = JSON.parse(document.getElementById('telefoneInt').value);
            if (aux.length >= 2) {
                let id = $(this).attr('id');
                id = id.split('excluirTel')[1];
                aux = aux.filter(item => item != id);
                id = "tel" + id;
                $('#' + id).remove();
                document.getElementById('telefoneInt').value = JSON.stringify(aux);
            }
        });
    });
</script>
</body>

</html>