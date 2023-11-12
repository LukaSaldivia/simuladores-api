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
 ![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/LukaSaldivia/simuladores-api?style=for-the-badge)
 ![Static Badge](https://img.shields.io/badge/PHP-8A66E2?style=for-the-badge&logo=php&logoColor=white)
 ![Static Badge](https://img.shields.io/badge/pendiente-ffaa00?style=for-the-badge&label=Promoci%C3%B3n)
 ![GitHub last commit (branch)](https://img.shields.io/github/last-commit/LukaSaldivia/simuladores-api/main?style=for-the-badge)


</div>

***

## 👷‍♂️👷‍♂️ Descripción del proyecto

Este proyecto tiene como objetivo crear una API de los episodios subidos a Youtube🔴 de Los Simuladores con fines educativos.

La API proporciona acceso a capítulos, temporadas y elenco de la serie.

Desarrollado con el patrón de diseño MVC.

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
- GET `/chapters`: Devuelve los capítulos de la serie:
```json
[
    {
        "idcap": "3Ru6sHh7IPw",
        "nombrecap": "Los Disimuladores",
        "descripcion": "Descripción del capítulo complementaria",
        "temporada": 8,
        "cast": [
            {
                "idcast": 4,
                "nombrecast": "Lautaro",
                "apellido": "Zjilstra"
            },
            {
                "idcast": 6,
                "nombrecast": "Federico",
                "apellido": "D'Elía"
            }
        ]
    },
...
]
```

| query-param | descripción                                                                                                                                                   |
|------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `page`     | Devuelve la página de resultados definida. Acepta números enteros positivos, en caso contrario (o si no se define), `page` valdrá 1 (5 elementos por página)                         |
| `sort`     | Recibe como valor una propiedad para la búsqueda y delvolver los resultados ordenados de forma ascendente según la propiedad establecida                      |
| `order`    | Recibe como valor "ASC" o "DESC" y varía el orden de forma ascendente o descendente de devolver los resultados según la propiedad `sort`                      |
| `season`   | Recibe como valor la Id de una temporada y devuelve todos los capítulos de la temporada establecida (si season es menor a cero, devuelve todos los capítulos) |

- GET `/chapters/:ID`: Devuelve un capítulo establecido por `:ID`
- DELETE `/chapters/:ID`: Elimina el capítulo según el `:ID` proporcionado
- POST `/chapters`: Agrega un nuevo capítulo. <br>
```json
{
  "idcap": "IdDelVideoDeYoutube",
  "nombrecap": "Nombre del capítulo",
  "descripcion": "Descripción del capítulo",
  "temporada": "ID_SEASON",
  "cast": "1,2,3,...,N" // (son los ID de cada actor/actriz)
}
```

- PUT `chapters/:ID`: Actualiza un capítulo según la `:ID`
```json
{
  "nombrecap": "Nombre del capítulo",
  "descripcion": "Descripción del capítulo",
  "temporada": "ID_SEASON",
  "cast": "1,2,3,...,N" // (son los ID de cada actor/actriz)
}
```

### /seasons
- GET `/seasons`: Devuelve los datos de las temporadas
```json
[
    {
        "idtemp": 8,
        "nombretemp": "Extra"
    },
...
]
```

 | query-param | descripción                                                                                                                                                   |
|------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `page`     | Devuelve la página de resultados definida. Acepta números enteros positivos, en caso contrario (o si no se define), `page` valdrá 1 (5 elementos por página)                          |
| `sort`     | Recibe como valor una propiedad para la búsqueda y delvolver los resultados ordenados de forma ascendente según la propiedad establecida                      |
| `order`    | Recibe como valor "ASC" o "DESC" y varía el orden de forma ascendente o descendente de devolver los resultados según la propiedad `sort`                      |



- GET `/seasons/:ID`: Devuelve los datos de una temporada
- DELETE `/seasons/:ID`: Elimina la temporada (y sus respectivos capítulos) según el `:ID` proporcionado
- POST `/season`: Agrega una nueva temporada.
```json
{
  "nombretemp": "Nombre de la temporada"
}
```
- PUT `seasons/:ID`: Actualiza una temporada según la `:ID`
```json
{
  "nombretemp": "Nombre de la temporada"
}
```


### /cast
- GET `/cast`: Devuelve los datos del elenco de la serie
```json
[
    {
        "idcast": 1,
        "nombrecast": "Luka",
        "apellido": "Saldivia"
    },
...
]
```

 | query-param | descripción                                                                                                                                                   |
|------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------|
| `page`     | Devuelve la página de resultados definida. Acepta números enteros positivos, en caso contrario (o si no se define), `page` valdrá 1 (5 elementos por página)                            |
| `sort`     | Recibe como valor una propiedad para la búsqueda y delvolver los resultados ordenados de forma ascendente según la propiedad establecida                      |
| `order`    | Recibe como valor "ASC" o "DESC" y varía el orden de forma ascendente o descendente de devolver los resultados según la propiedad `sort`                      |


- GET `/cast/:ID`: Devuelve los datos del actor/actriz
- DELETE `/cast/:ID`: Elimina el actor/actriz según el `:ID` proporcionado
- POST `/cast`: Agrega un nuevo/a actor/actriz al elenco.
```json
{
  "nombrecast": "Nombre del actor/actriz",
  "apellido": "Apellido del actor/actriz"
}
```
- PUT `cast/:ID`: Actualiza un intérprete según la `:ID`
```json
{
  "nombrecast": "Nombre del actor/actriz",
  "apellido": "Apellido del actor/actriz"
}
```
