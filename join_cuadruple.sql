SELECT l.titulo, g.nombre as genero, a.nombre as autor
FROM libros l
inner join generos_libros gl on l.id = gl.id_libro
inner join genero g on g.id = gl.id_genero
left join autores a on a.id = l.id_autor
where l.titulo like '%prueba%'