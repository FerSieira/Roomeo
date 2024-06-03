# Fase de implementación

> Nesta fase debes implementar o teu proxecto ou prototipo, programando todo o referido a código, ficheiros de configuración, bases de datos, etc.

> Podes enlazar ficheiros do teu proxecto subidos a src ou poñer aquí anacos do código que consideras importantes. Tamén podes explicar ferramentas, frameworks, librerías e demáis utilidades que empregas no desenvolvemento do código.

> Esta fase non ten tanto peso documental e baséase en deixar reflexado aquí o elaborado e creado na carpeta src.

> Tamén podes especificar se é precisa alguna configuración concreta (do IDE, de máquinas virtuais, librerías de terceiros, ferramenta de compilación empregada: Maven, Ant, Gradle...) para poder traballar no desenvolvemento e calquera outro aspecto relacionado directamente coa implementación que levas a cabo.

# Carpetas importantes del proyecto:

- [Controladores](/src/app/Http/Controllers/)
Aquí tenemos los controladores donde se encuentran los métodos que hacen la mayoría de las funcionalidades de la aplicación.

- [Modelos](/src/app/Models/)
En esta carpeta podemos encontrar los distintos modelos.

- [Migraciones](src/database/migrations/)
Los archivos para la creación de las diversas tablas de las base de datos mediante migraciones se encuentran en esta carpeta.

- [Vistas](src/resources/views/)
Dentro de esta carpeta tenemos una serie de carpetas para las distintas vistas de la aplicación. Cada blade (index, create, show y edit) se encuentra dentro de su carpeta correspondiente y después tendríamos el layout donde está el app.blade.php, que es el que proporciona el formato al resto de vistas.

- [Rutas](src/routes/web.php)
En este archivo se puede encontrar cómo se manejan las rutas de la aplicación.

# Herramientas, frameworks y librerías:

- Laravel Breeze es una utilidad que implementa autenticación para proyectos Laravel que en el caso de Roomeo es necesario para el log-in de los Empleados.
Nos crea las vistas necesarias para el proceso de autenticación y los controladores necesarios para manejar estas funcionalidades.
Son fácilmente reconocibles en la aplicación, ya que muchos de sus archivos o carpetas autogeneradas tienen la palabra Auth.

- Bootstrap CSS lo he utilizado para hacer que la aplicación sea más responsiva. Consiste en un framework que proporciona una serie de componentes y utilidades CSS y Javascript que hacen más sencillo el proceso de creación de interfaces.

Ofrece utilidades de todo tipo, como barras de navegación, formularios y botones, así como una nomenclatura que nos ayuda a que todo el proyecto sea más homogéneo y mantenible. Por ejemplo el utilizar mb3 para todos los divs hará que cojan el CSS de la clase mb3 que aplica margen inferior de 16 px. 

