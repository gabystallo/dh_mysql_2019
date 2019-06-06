SELECT l.titulo, a.nombre
FROM libros l left join autores a on l.id_autor = a.id