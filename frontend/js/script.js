$(document).ready(function() {
    // Carregar lista de filmes
    $.get('/backend/index.php/api/films', function(data) {
        const films = JSON.parse(data);
        let html = '';

        films.forEach(film => {
            html += `
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">${film.properties.title}</h5>
                            <p class="card-text">Lançamento: ${film.properties.release_date}</p>
                            <a href="details.php?id=${film.uid}" class="btn btn-primary">Ver Detalhes</a>
                        </div>
                    </div>
                </div>
            `;
        });

        $('#film-list').html(html);
    });
});
