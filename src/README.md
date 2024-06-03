# Sobre esta carpeta:

### `src/`

> Incluye en esta carpeta todo lo relativo al código de tu proyecto.

> En caso de utilizar un IDE, incluye el proyecto completo, con todas las carpetas y archivos y no solo el código fuente, facilitando así la apertura del proyecto en cualquier equipo. No te procupes por subir ficheros de más. Si utilizas un IDE, los ficheros compilados (como los .class de java) ya son marcados para ser ignorados por git.

> Si desarrollas varias aplicaciones o en varias plataformas, incluye en distintas carpetas cada una.

# Carpetas importantes del proyecto:

- [Controladores](/src/app/Http/Controllers/)
Aquí tenemos los controladores donde se encuentran los métodos que hacen la mayoría de funcionalidades de la aplicación.

- [Modelos](/src/app/Models/)
En esta carpeta podemos encontrar los distintos modelos.

- [Migraciones](src/database/migrations/)
Los archivos para la creación de las diversas tablas de las base de datos mediante migraciones se encuentran en esta carpeta.

- [Vistas](src/resources/views/)
Dentro de esta carpeta tenemos una serie de carpetas para las distintas vistas de la aplicación, cada blade (index, create, show y edit) se encuentra dentro de su carpeta correspondiente y despues tendríamos el layout donde esta el app.blade.php que es el que proporciona el formato al resto de vistas.

- [Rutas](src/routes/web.php)
En este archivo se puede encontrar como se manejan las rutas de la aplicación.