
<?php   
include('verifica_login.php');
include('includes/db.php');
include('includes/fundo.php');
?>
<<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Acervo</title>
    <link rel="stylesheet" href="style/gerenciar.css">
    <style>
        .content {
            margin-left: 20px;
            padding: 10px;
            width: 70%;
            height: 500px;
            
        }
    </style>
</head>
<body onload="loadPage('cadastrar_livro.php')"> <!-- Chama a função ao carregar a página -->
    <div class="container">
        <!-- Menu -->
        <div class="menu">
            <button onclick="loadPage('cadastrar_livro.php')" class="btn">Cadastrar</button>
            <button onclick="loadPage('atualizar_livro.php')" class="btn">Atualizar</button>
            <button onclick="loadPage('buscar.php')" class="btn">Buscar</button>
            <button onclick="loadPage('arquivar_livro.php')" class="btn">Arquivar</button>
        </div>

        <!-- Área para carregar o conteúdo -->
        <div class="content" id="content">
            Selecione uma opção para visualizar o conteúdo.
        </div>
    </div>

    <script>
        function loadPage(page) {
            const contentDiv = document.getElementById('content');
            contentDiv.innerHTML = '<p>Carregando...</p>';

            // Faz a requisição para carregar o conteúdo
            fetch(page)
                .then(response => response.text())
                .then(html => {
                    contentDiv.innerHTML = html;
                })
                .catch(error => {
                    contentDiv.innerHTML = `<p>Erro: ${error.message}</p>`;
                });
        }
    </script>
</body>
</html>
