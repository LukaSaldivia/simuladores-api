<div align="center">
<pre>

...........█████╗.██████╗.██╗...........................................................
..........██╔══██╗██╔══██╗██║...........................................................
█████╗....███████║██████╔╝██║....█████╗.................................................
╚════╝....██╔══██║██╔═══╝.██║....╚════╝.................................................
..........██║..██║██║.....██║...........................................................
..........╚═╝..╚═╝╚═╝.....╚═╝...........................................................
........................................................................................
███████╗██╗███╗...███╗██╗...██╗██╗......█████╗.██████╗..██████╗.██████╗.███████╗███████╗
██╔════╝██║████╗.████║██║...██║██║.....██╔══██╗██╔══██╗██╔═══██╗██╔══██╗██╔════╝██╔════╝
███████╗██║██╔████╔██║██║...██║██║.....███████║██║..██║██║...██║██████╔╝█████╗..███████╗
╚════██║██║██║╚██╔╝██║██║...██║██║.....██╔══██║██║..██║██║...██║██╔══██╗██╔══╝..╚════██║
███████║██║██║.╚═╝.██║╚██████╔╝███████╗██║..██║██████╔╝╚██████╔╝██║..██║███████╗███████║
╚══════╝╚═╝╚═╝.....╚═╝.╚═════╝.╚══════╝╚═╝..╚═╝╚═════╝..╚═════╝.╚═╝..╚═╝╚══════╝╚══════╝

API RESTful desarrollada con fin educativo para la carrera TUDAI
 </pre>
 ![Lenguaje: PHP](https://img.shields.io/badge/Lenguaje-PHP-8A66E2)
 ![Promoción](https://img.shields.io/badge/Promoción-pendiente-ffaa00)
</div>






***

## 👷‍♂️👷‍♂️ Descripción del proyecto

Este proyecto tiene como objetivo crear una API de los episodios subidos a Youtube🔴 de Los Simuladores con fines educativos.

La API proporciona acceso a capítulos, temporadas y elenco de la serie.

***
## :busts_in_silhouette: Integrantes:
+ Lautaro Zijlstra  -> `zij.lauta@gmail.com`
+ Luka Saldivia  -> `saldivialuka@gmail.com`
***
## 📮 API
>**Nota:** (Las solicitudes y respuestas están en formato **JSON**)

Los endpoints disponibles son:

### /chapters
- GET `/chapters`: Devuelve los capítulos de la serie
- GET `/chapters/:ID`: Devuelve un capítulo establecido por `:ID`
- GET `/chapters?page=2`: Devuelve la página 2 (establecido por `page`) de los capítulos de la serie (5 capítulos por página)
- GET `/chapters?sort=:PROPIEDAD&order=ASC|DESC`: Devuelve los capítulos ordenados según la propiedad establecida en `sort` y en orden ascendente o descendente según `order`
- GET `/chapters?season=:ID_SEASON`: Devuelve los capítulos de la temporada (establecida por `ID_SEASON`)
- DELETE `/chapters/:ID`: Elimina el capítulo según el `:ID` proporcionado
- POST `/chapters`: Agrega un nuevo capítulo. <br>
```
{
  "idcap": "IdDelVideoDeYoutube",
  "nombrecap": "Nombre del capítulo",
  "descripcion": "Descripción del capítulo",
  "temporada": "ID_SEASON",
  "cast": "1,2,3,...,N" (son los ID de cada actor/actriz),
}
```

- PUT `chapters/:ID`: Actualiza un capítulo según la `:ID`
```
{
  "nombrecap": "Nombre del capítulo",
  "descripcion": "Descripción del capítulo",
  "temporada": "ID_SEASON",
  "cast": "1,2,3,...,N" (son los ID de cada actor/actriz),
}
```

### /seasons
- GET `/seasons`: Devuelve los datos de las temporadas
- GET `/seasons/:ID`: Devuelve los datos de una temporada
- GET `/seasons?page=2`: Devuelve la página 2 (establecido por `page`) de las temporada de la serie (5 temporadas por página)
- GET `/seasons?sort=:PROPIEDAD&order=ASC|DESC`: Devuelve las temporadas ordenadas según la propiedad establecida en `sort` y en orden ascendente o descendente según `order`
- POST `/season`: Agrega una nueva temporada.
```
{
  "nombretemp": "Nombre de la temporada"
}
```
- PUT `seasons/:ID`: Actualiza una temporada según la `:ID`
```
{
  "nombretemp": "Nombre de la temporada"
}
```


### /cast
- GET `/cast`: Devuelve los datos del elenco de la serie
- GET `/cast/:ID`: Devuelve los datos del actor/actriz
- GET `/cast?page=2`: Devuelve la página 2 (establecido por `page`) de los intérpretes de la serie (5 por página)
- GET `/cast?sort=:PROPIEDAD&order=ASC|DESC`: Devuelve al cast ordenado según la propiedad establecida en `sort` y en orden ascendente o descendente según `order`
- POST `/cast`: Agrega un nuevo/a actor/actriz al elenco.
```
{
  "nombrecast": "Nombre del actor/actriz",
  "apellido": "Apellido del actor/actriz"
}
```
- PUT `cast/:ID`: Actualiza un intérprete según la `:ID`
```
{
  "nombrecast": "Nombre del actor/actriz",
  "apellido": "Apellido del actor/actriz"
}
```
