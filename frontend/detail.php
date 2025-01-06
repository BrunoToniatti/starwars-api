<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/detail.css">
    <title>Detalhes do Filme</title>
</head>
<body>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const filmId = urlParams.get('id');

        fetch(`http://localhost/starwars/backend/index.php/api/films?menu=films&id=${filmId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erro na resposta da API: ${response.status}`);
            }
            return response.json(); 
        })
        .then(data => {
            const film = data.result;  
            const properties = film.properties;  

            function calculateDateDifference(dataLancamento) {
                const hoje = new Date();
                const lancamento = new Date(dataLancamento);

                // Calculando a diferença em anos, meses e dias
                let ano = hoje.getFullYear() - lancamento.getFullYear();
                let mes = hoje.getMonth() - lancamento.getMonth();
                let dias = hoje.getDate() - lancamento.getDate();

                if (dias < 0) {
                    mes--;
                    dias += new Date(hoje.getFullYear(), hoje.getMonth(), 0).getDate(); // Ajusta os dias para o mês anterior
                }
            
                if (mes < 0) {
                    ano--;
                    mes += 12; // Ajusta os meses para o ano anterior
                }
            
                return `${ano} anos, ${mes} meses e ${dias} dias`;
            }

            document.querySelector('.cabecalho h1').innerHTML = properties.title || 'Título não disponível';
            document.querySelector('.informacao-filme').innerHTML = `
                <p><strong>Episódio:</strong> ${properties.episode_id}</p>
                <p><strong>Sinopse:</strong> ${properties.opening_crawl || 'Não disponível'}</p>
                <p><strong>Data de Lançamento:</strong> ${new Date(properties.release_date).toLocaleDateString('pt-BR') || 'Não informada'}</p>
                <p><strong>Diretor:</strong> ${properties.director || 'Não informado'}</p>
                <p><strong>Produtores:</strong> ${properties.producer || 'Não informados'}</p>
                <p><strong>Idade:</strong> ${properties.idade || 'Idade não calculada'}</p>
            `;                
            

            function getFilmInformations(id, title) {
                if (title == 'Personagens'){
                    menu = 'people'
                }else if (title == 'Planetas'){
                    menu = 'planets'
                }else if (title == 'Naves'){
                    menu = 'starships'
                }else if (title == 'Espécies'){
                    menu = 'species'
                }

                return fetch(`http://localhost/starwars/backend/index.php/api/films?menu=${menu}&id=${id}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`Erro ao buscar personagem ID ${id}: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => data.result.properties.name)
                    .catch(error => {
                        console.error('Erro ao buscar nome do personagem:', error);
                        return 'Nome não disponível';
                    });
            }

            function createTable(title, items, urlPrefix) {
                // Inicializando o conteúdo da tabela
                let tableContent = `<h3>${title}:</h3><br><table><tr><th>Nome</th><th>Detalhes</th></tr>`;
                        
                // Mapeando os itens para obter as promessas de nomes
                const fetchPromises = items.map(itemUrl => {
                    const itemId = itemUrl.split('/').pop(); // Obtendo o ID do item
                    return getFilmInformations(itemId, title).then(name => {
                        // Retorna a linha formatada
                        return `<tr><td>${name}</td><td><a href="${urlPrefix}${itemId}" target="_blank">Ver Detalhes</a></td></tr>`;
                    });
                });
            
                // Após todas as promessas serem resolvidas
                Promise.all(fetchPromises)
                    .then(rows => {
                        // Adiciona as linhas à tabela
                        tableContent += rows.join('') + '</table>';
                        // Atualiza o DOM com a tabela completa
                        document.querySelector('.adicionais-filme').innerHTML += tableContent;
                    })
                    .catch(error => {
                        console.error('Erro ao criar tabela:', error);
                    });
            }
            
            // Chama as funções de tabela para cada seção
            createTable('Personagens', properties.characters || [], 'details_personagem.php?id=');
            createTable('Planetas', properties.planets || [], 'details_planeta.php?id=');
            createTable('Naves', properties.starships || [], 'details_nave.php?id=');
            createTable('Espécies', properties.species || [], 'details_especie.php?id=');

            document.querySelector('.adicionais-filme').innerHTML = charactersTable + planetsTable + starshipsTable + speciesTable;
        })
        .catch(error => {
            console.error('Erro ao buscar dados:', error);
        });
    </script>

    <div class="cabecalho">
        <h1>&nbsp;</h1>
        <p><a href="index.php">Voltar para o catálogo de filmes</a></p>
    </div>

    <div class="container">
        <div class="informacao-filme">
        </div>
        <br>
        <hr>
        <br>
        <div class="adicionais-filme">
        </div>
    </div>
</body>
</html>
