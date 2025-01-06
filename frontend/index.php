<?php
include '../backend/Database.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:,">
    <link rel="stylesheet" href="css/index.css">
    <title>Catálogo de Filmes</title>
</head>
<body>
    <h1>Catálogo de Filmes</h1>
    <div id="film-list"></div> 
    
    <script>
     fetch('http://localhost/starwars/backend/index.php/api/films?menu=films')
    .then(response => {
        if (!response.ok) {
            throw new Error('Erro na resposta da API: ' + response.statusText);
        }
        return response.text(); 
    })
    .then(responseText => {
        console.log("Resposta bruta da API:", responseText); 

       
        const jsonString = responseText.replace(/^Resposta da API externa: string\(\d+\)\s/, '');

        try {
            
            
            const parsedData = JSON.parse(jsonString);

            // console.log("Filmes:", parsedData.result);

            
            const filmListDiv = document.getElementById("film-list");

            
            function formataData(dateString) {
                const data = new Date(dateString);
                const dia = ("0" + data.getDate()).slice(-2); 
                const mes = ("0" + (data.getMonth() + 1)).slice(-2); 
                const ano = data.getFullYear();
                return `${dia}/${mes}/${ano}`;
            }

            parsedData.result.sort((a, b) => {
                const primeira_data = new Date(a.properties.release_date);
                const segunda_data = new Date(b.properties.release_date);
                return primeira_data - segunda_data;
            });

            parsedData.result.forEach(film => {
                const filmElement = document.createElement("div");
                filmElement.innerHTML = `
                    <h3>${film.properties.title}</h3>
                    <p><strong>Data de Lançamento:</strong> ${formataData(film.properties.release_date)}</p>
                    <a href="detail.php?id=${film.uid}">Link para mais informações</a>
                    <hr>
                `;
                filmListDiv.appendChild(filmElement);
            });
        } catch (error) {
            console.error("Erro ao tentar decodificar JSON:", error);
            console.log("Resposta completa da API:", responseText);
        }
    })
    .catch(error => {
        console.error("Erro ao buscar filmes:", error);
    });
    </script>
</body>
</html>
