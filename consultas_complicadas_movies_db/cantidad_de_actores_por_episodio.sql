select series.title as serie, seasons.number as temporada, episodes.title as episodio, count(actors.id) as cantidad_de_actores
from series
inner join seasons on series.id = seasons.serie_id
inner join episodes on seasons.id = episodes.season_id
inner join actor_episode on episodes.id = actor_episode.episode_id
inner join actors on actor_episode.actor_id = actors.id
group by series.title, seasons.number, episodes.title