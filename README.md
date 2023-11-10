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
> [!note]  
> (Las solicitudes y respuestas están en formato **JSON**)


Los endpoints disponibles son:

### /chapters
- ${\color{lightgreen}GET}$  `/chapters`: Devuelve los capítulos de la serie
- ${\color{lightgreen}GET}$  `/chapters/:ID`: Devuelve un capítulo establecido por `:ID`
- ${\color{lightgreen}GET}$  `/chapters?page=2`: Devuelve la página 2 (establecido por `page`) de los capítulos de la serie (5 capítulos por página)
- ${\color{lightgreen}GET}$  `/chapters?sort=:PROPIEDAD&order=ASC|DESC`: Devuelve los capítulos ordenados según la propiedad establecida en `sort` y en orden ascendente o descendente según `order`
- ${\color{lightgreen}GET}$  `/chapters?season=:ID_SEASON`: Devuelve los capítulos de la temporada (establecida por `ID_SEASON`)
- ${\color{red}DELETE}$  `/chapters/:ID`: Elimina el capítulo según el `:ID` proporcionado
- ${\color{yellow}POST}$  `/chapters`: Agrega un nuevo capítulo. <br>
```json
{
  "idcap": "IdDelVideoDeYoutube",
  "nombrecap": "Nombre del capítulo",
  "descripcion": "Descripción del capítulo",
  "temporada": "ID_SEASON",
  "cast": "1,2,3,...,N" (son los ID de cada actor/actriz),
}
```

- ${\color{lightblue}PUT}$ `chapters/:ID`: Actualiza un capítulo según la `:ID`
```json
{
  "nombrecap": "Nombre del capítulo",
  "descripcion": "Descripción del capítulo",
  "temporada": "ID_SEASON",
  "cast": "1,2,3,...,N" (son los ID de cada actor/actriz),
}
```

### /seasons
- ${\color{lightgreen}GET}$  `/seasons`: Devuelve los datos de las temporadas
- ${\color{lightgreen}GET}$  `/seasons/:ID`: Devuelve los datos de una temporada
- ${\color{lightgreen}GET}$  `/seasons?page=2`: Devuelve la página 2 (establecido por `page`) de las temporada de la serie (5 temporadas por página)
- ${\color{lightgreen}GET}$  `/seasons?sort=:PROPIEDAD&order=ASC|DESC`: Devuelve las temporadas ordenadas según la propiedad establecida en `sort` y en orden ascendente o descendente según `order`
- ${\color{red}DELETE}$  `/seasons/:ID`: Elimina la temporada (y sus respectivos capítulos) según el `:ID` proporcionado
- ${\color{yellow}POST}$  `/season`: Agrega una nueva temporada.
```json
{
  "nombretemp": "Nombre de la temporada"
}
```
- ${\color{lightblue}PUT}$ `seasons/:ID`: Actualiza una temporada según la `:ID`
```json
{
  "nombretemp": "Nombre de la temporada"
}
```


### /cast
- ${\color{lightgreen}GET}$  `/cast`: Devuelve los datos del elenco de la serie
- ${\color{lightgreen}GET}$  `/cast/:ID`: Devuelve los datos del actor/actriz
- ${\color{lightgreen}GET}$  `/cast?page=2`: Devuelve la página 2 (establecido por `page`) de los intérpretes de la serie (5 por página)
- ${\color{lightgreen}GET}$  `/cast?sort=:PROPIEDAD&order=ASC|DESC`: Devuelve al cast ordenado según la propiedad establecida en `sort` y en orden ascendente o descendente según `order`
- ${\color{red}DELETE}$  `/cast/:ID`: Elimina el actor/actriz según el `:ID` proporcionado
- ${\color{yellow}POST}$  `/cast`: Agrega un nuevo/a actor/actriz al elenco.
```json
{
  "nombrecast": "Nombre del actor/actriz",
  "apellido": "Apellido del actor/actriz"
}
```
- ${\color{lightblue}PUT}$  `cast/:ID`: Actualiza un intérprete según la `:ID`
```json
{
  "nombrecast": "Nombre del actor/actriz",
  "apellido": "Apellido del actor/actriz"
}
```
