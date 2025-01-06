<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhe de </title>
    <link rel="stylesheet" href="css/personagem.css">
</head>
<body>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const naveId = urlParams.get('id');
        fetch(`http://localhost/starwars/backend/index.php/api/films?menu=starships&id=${naveId}`)
        .then(response => {
            if(!response.ok){
                throw new Error(`Erro na resposta da API: ${response.status}`)
            }

            return response.json();
        })
        .then(data => {
            const nave = data.result;
            const nave_propriedades = nave.properties;

            document.querySelector('title').innerHTML += nave_propriedades.name;
            document.querySelector('.container h1').innerHTML = nave_propriedades.name;
            document.querySelector('.container h2').innerHTML += nave_propriedades.passengers;
        })
    </script>
    <div class="container">
        <h1></h1>
        <h2>Quantidade de passageiros: </h2>
    </div>
</body>
</html>