<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhe de Personagem</title>
    <link rel="stylesheet" href="css/personagem.css">
</head>
<body>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const peopleId = urlParams.get('id');
        fetch(`http://localhost/starwars/backend/index.php/api/films?menu=people&id=${peopleId}`)
        .then(response => {
            if(!response.ok){
                throw new Error(`Erro na resposta da API: ${response.data}`)
            }

            return response.json();
        })
        .then(data => {
            const pessoa = data.result;
            const propriedades = pessoa.properties;

            function getPlanetName(url){
                const planeta_cod = url.split('/').pop()

                return fetch(`http://localhost/starwars/backend/index.php/api/films?menu=planets&id=${planeta_cod}`)
                .then(response => {
                    if (!response.ok){
                        throw new Error(`Erro ao buscar nome do planeta: ${response.status}`)
                    }
                    return response.json();
                })

                .then(data => data.result.properties.name)
                .catch(error => {
                    console.error('Erro ao buscas nome do planeta');
                    return 'Nome não disponivel'
                })
            }

            document.querySelector('.container h1').innerHTML = propriedades.name || 'Nome não encontrado';
            document.querySelector('.container h2').innerHTML += propriedades.birth_year || 'Data de Nascimento não encontrada';
            getPlanetName(propriedades.homeworld).then(planetName => {
                document.querySelector('.container p').innerHTML = `Planeta: ${planetName}`;
            });

        })
    </script>
    <div class="container">
        <h1></h1>
        <h2>Data Nascimento: </h2>
        <p>Planeta: </p>
    </div>
</body>
</html>