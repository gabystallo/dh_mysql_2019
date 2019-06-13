#los géneros con "qué porcentaje de películas pertenece a ese género"

select genres.name, (count(movies.id) / (select count(*) from movies as m) * 100) as porcentaje

from genres left join movies on genres.id = movies.genre_id

group by genres.name