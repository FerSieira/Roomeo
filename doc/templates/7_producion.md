# Fase de produción

# Manual técnico e de administración

### Información relativa á instalación ou despregamento:

* Se precisas dun servicio, como unha base de datos, servidor, servicios na nube... indica os pasos a seguir para poder despregar/instalar o teu sistema.
* Especifica o software necesario e a súa posta a punto (SO, servidores, etc).
* Configuración inicial seguridade: devasa, control usuarios, rede.
* Se fora o caso, explica o proceso de carga inicial de datos na base de datos ou migración de datos xa existentes noutros formatos.
* Alta de usuarios dos sistemas necesarios.

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

* Copias de seguridade do sistema.
* Para las copias de seguridad en mi caso puedo contratar este servicio con DigitalOcean o Forge. Aunque también existe la posibilidad de hacer copias de seguridad manualmente.
* Los usuarios serán gestionados por el administrador de la base de datos o desde la propia aplicación por el gerente.
* La seguridad en cuanto a las contraseña es que tendrán un hash para estar mejor protegidas.

### Información relativa ó matemento do sistema

* Los usuarios podrán llamarnos para comunicarnos sus incidencias e intentaremos prestarles ayuda telefónica, que de no se suficiente pasaría a ser ayuda en físico desplazandonos a su ubicación.

# Manual de usuario

### Formación de usuarios 
* No se requerirá una formación de los usuarios ya que la aplicación busca ser intuitiva y deberían poder adaptarse a ella con facilidad.

### Instrucións iniciais
* Elabora un manual breve coa información necesaria para o uso da aplicación.

### FAQ

* Elabora unha serie de preguntas e respostas habituais a modo de axuda para os usuarios.

# Protección de datos de carácter persoal

* Se almacenas datos persoais e/ou de carácter sensible, debes especificar como deberás comunicar, almacenar e xestionar a información.