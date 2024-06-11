# Fase de produción

# Manual técnico e de administración

### Información relativa á instalación ou despregamento:

Para poder desplegar mi aplicación debemos seguir los siguientes pasos:

1. **Despligue del servidor:**
- Crear una instancia en DigitalOcean usando una imagen de Ubuntu 22.04.
- Configurar la instancia con la especificación 1vCPU, 1GB de RAM y 25 GB de disco.
- Crear un dominio o usar la dirección IP pública asignada.

2. **Configuración del software necesario:**
- Instalar y configurar el servidor web Nginx. Que en este caso Laravel Forge hará la mayoría del trabajo.
- Configurar MySQL como sistema gestor de base de datos.
- Instalar PHP y otras dependencias que precisemos para arrancar Laravel.

3. **Despliegue de la aplicación:**
- Clonar el repositorio de GitLab en el servidor.
- En el código de la migración de empleados asegurarse de tener un usuario inicial con el que poder entrar a la aplicación.
- Ejecutar este script de despligue:
```bash
cd /home/forge/default/src
git pull origin main
composer install --no-interaction --prefer-dist --optimize-autoloader
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

chown -R forge:www-data /home/forge/default/src
chmod -R 775 /home/forge/default/src/storage /home/forge/default/src/bootstrap/cache 
```

### Información relativa á administración do sistema, é dicir, tarefas que se deberán realizar unha vez que o sistema estea funcionando, como por exemplo

* Para las copias de seguridad en mi caso puedo contratar este servicio con DigitalOcean o Forge. Aunque también existe la posibilidad de hacer copias de seguridad manualmente.
* Los usuarios serán gestionados por el administrador de la base de datos o desde la propia aplicación por el gerente.
* La seguridad en cuanto a las contraseña es que tendrán un hash para estar mejor protegidas.

### Información relativa ó matemento do sistema

* Los usuarios podrán llamarnos para comunicarnos sus incidencias e intentaremos prestarles ayuda telefónica, que de no ser suficiente pasaría a ser ayuda en físico desplazándonos a su ubicación.

# Manual de usuario

### Formación de usuarios 
* No se requerirá una formación de los usuarios ya que la aplicación busca ser intuitiva y deberían poder adaptarse a ella con facilidad.

### Instrucións iniciais

Inicia sesión con tu correo y contraseña proporcionados por tu superior.

En el apartado Reservas podrás crear, modificar, ver y eliminar reservas. También podrás realizar el check-in y check-out pulsando el botón correspondiente en este índice.
El personal del departamento de pisos podrá ir a este índice y pulsar el botón Limpiar una vez hayan hecho check-out para cambiar el estado de las habitaciones.

En el apartado habitaciones se podrá modificar el estado de las habitaciones así como modificar información acerca de estas o en caso de reformas en el hotel y que se aumente la cantidad de habitaciones podrán añadir más habitaciones.

En el apartado Clientes podrán consultar los clientes y acompañantes que se encuentran en dos subapartados distintos.

En el apartado Servicios podrán crear un nuevo servicio o desactivar uno que el hotel haya dejado de prestar.

Reservas Servicios será el apartado donde se realizarán la reserva de servicios como por ejemplo si un huésped desea utilizar el servicio de lavandería o utilizar el spa si este fuese de pago.

En facturas podrán revisar las facturas de las reservas una vez esta se haya finalizado.

En el caso de los usuarios administradores también podrán entrar a los apartados Tarifas y Empleados donde podrán modificar o crear nuevas tarifas. Y en el caso del apartado Empleados será donde el administrador de de alta a nuevos trabajadores para que puedan usar el sistema y modificar sus datos si por ejemplo desean cambiar su contraseña.

### FAQ

**¿Por qué no salen habitaciones cuando creo una habitación?**

Asegúrate de seleccionar primero las fechas y luego seleccionar el tipo de habitación.

**¿Cómo puedo cambiar mi contraseña?**

Esta función sólo se encuentra disponible para los usuarios con permisos de administrador. Contacta con tu superior para que te permita modificar tu contraseña. 

**¿Por qué no encuentro a un cliente en el listado de clientes?**

Prueba a buscar en la sección de Ver Acompañantes ya que el sistema realiza distinciones entre si un cliente se ha hospedado como cliente o como acompañante.

**¿Por qué no encuentro una habitación en el listado de habitaciones de reservas?**

Las habitaciones deben encontrarse en estado ‘libre’ si se encuentran ocupadas o sucias no aparecerán en el listado de habitaciones disponibles.

# Protección de datos de carácter persoal

* Se almacenas datos persoais e/ou de carácter sensible, debes especificar como deberás comunicar, almacenar e xestionar a información.