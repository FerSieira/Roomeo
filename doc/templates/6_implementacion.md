# Fase de implementación

> Nesta fase debes implementar o teu proxecto ou prototipo, programando todo o referido a código, ficheiros de configuración, bases de datos, etc.

> Podes enlazar ficheiros do teu proxecto subidos a src ou poñer aquí anacos do código que consideras importantes. Tamén podes explicar ferramentas, frameworks, librerías e demáis utilidades que empregas no desenvolvemento do código.

> Esta fase non ten tanto peso documental e baséase en deixar reflexado aquí o elaborado e creado na carpeta src.

> Tamén podes especificar se é precisa alguna configuración concreta (do IDE, de máquinas virtuais, librerías de terceiros, ferramenta de compilación empregada: Maven, Ant, Gradle...) para poder traballar no desenvolvemento e calquera outro aspecto relacionado directamente coa implementación que levas a cabo.

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