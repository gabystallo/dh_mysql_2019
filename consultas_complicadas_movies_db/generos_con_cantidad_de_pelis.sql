select genres.name, count(movies.id) as cantidad_de_pelis
from genres left join movies on genres.id = movies.genre_id
group by genres.name