<div align="center">
<h1>🕵️🕵️ API de Los Simuladores 🕵️🕵️</h1>
<h2>API desarrollada con fin educativo para la carrera TUDAI</h2>

![Captura de pantalla de la página](web-screen.png)

</div>

## Descripción del proyecto

Este proyecto tiene como objetivo crear una API de los episodios subidos a Youtube🔴 de Los Simuladores con fines educativos.

La API proporciona acceso a capítulos, temporadas y elenco de la serie.


## API
>**Nota:** (Las solicitudes y respuestas están en formato **JSON**)

Los endpoints disponibles son:

### GET 
>/chapters
- GET `/chapters`: Devuelve los capítulos de la serie
- GET `/chapters?page=2`: Devuelve la página 2 de los capítulos de la serie (si no está definido, se devuelve de la primer página) (5 capítulos por página)
- GET `/chapters?sort=:PROPIEDAD&order=ASC|DESC`: Devuelve los capítulos ordenados según la propiedad establecida en `sort` y en orden ascendente o descendente según `order`
- GET `/chapters/:ID`: Devuelve un capítulo
- GET `/chapters?season=:ID_SEASON`: Devuelve los capítulos de la temporada establecida (por ID_SEASON)
- 
>/seasons
- GET `/seasons`: Devuelve los datos de las temporadas
- GET `/seasons/:ID`: Devuelve los datos de una temporada
- GET `/seasons?sort=:PROPIEDAD&order=ASC|DESC`: Devuelve las temporadas ordenadas según la propiedad establecida en `sort` y en orden ascendente o descendente según `order`
>/cast
- GET `/cast`: Devuelve los datos del elenco de la serie
- GET `/cast/:ID`: Devuelve los datos del actor/actriz
- GET `/cast?sort=:PROPIEDAD&order=ASC|DESC`: Devuelve al cast ordenado según la propiedad establecida en `sort` y en orden ascendente o descendente según `order`
### POST
- POST `/chapter`: Agrega un nuevo capítulo a la serie. <br>
<sub>{ <br>
  **url**: www.youtube.com/watch?v=EXAMPLE, <br>
  **title**: "Nombre del capítulo", <br>
  **description**: "Descripción del capítulo", <br>
  **season**: "ID_SEASON", <br>
  **cast**: "1,2,3,...,N" (son los ID de cada actor/actriz), <br>
}</sub>
