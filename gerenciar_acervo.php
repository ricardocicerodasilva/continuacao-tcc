<?php   
include('verifica_login.php');
include('includes/db.php');
include('includes/fundo.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Acervo</title>
    <!-- Inclusão do arquivo CSS externo -->
    <link rel="stylesheet" href="style/gerenciar.css">
    <style>
        .content {
            margin-left: 20px;
         
            padding: 10px;
            width: 70%;
            height: 500px;
            overflow-y: 50px;
        }
    </style>
</head>
<body onload="loadPage('listar_acervo.php')"> <!-- Chama a função ao carregar a página -->
    <div class="container">
        <!-- Menu -->
        <div class="menu">
            <button onclick="loadPage('listar_acervo.php')" class="btn">Listar Acervo</button>
            <button onclick="loadPage('reservar_livro.php')" class="btn">Reservar</button>
            <button onclick="loadPage('reservas_livro.php')" class="btn">Reservas</button>
        </div>

        <!-- Área para carregar o conteúdo -->
        <div class="content" id="content">
            Selecione uma opção para visualizar o conteúdo.
        </div>
    </div>

    <!-- Inclusão do arquivo JS -->
    <script>
        function loadPage(page) {
            const contentDiv = document.getElementById('content');

            // Exibe um carregando enquanto a página é carregada
            contentDiv.innerHTML = '<p>Carregando...</p>';

            // Faz a requisição para carregar o conteúdo
            fetch(page)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro ao carregar a página');
                    }
                    return response.text();
                })
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
