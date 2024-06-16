# REQUISITOS DEL SISTEMA
Este documento describe los requerimientos para Aplicación web para gestión hotelera especificando qué funcionalidad ofrece y de qué forma.

## Descripción General

El proyecto tiene como objetivo desarrollar un sistema de gestión hotelera web o PMS.
Esta aplicación estará diseñada para ofrecer una solución para la gestión de reservas, clientes y habitaciones para hoteles de todos los tamaños y categorías. El enfoque principal es hacer que el sistema sea lo más intuitivo y fácil de usar para los trabajadores del hotel.

El sistema permitirá que los hoteles se suscriban al servicio y que obtengan una cuenta de administrador personalizada.
Desde esta cuenta, el administrador del hotel podrá gestionar el acceso para el resto del personal, y también acceder a las diversas funciones del sistema.

Los recepcionistas podrán realizar sus diferentes tareas como gestionar reservas, hacer el check-in y check-out de clientes, así como introducir y actualizar la información de los clientes de ser necesario.
El personal de limpieza podrá actualizar el estado de las habitaciones una vez limpias. Además, el sistema incluirá funciones para crear los usuarios de nuevos empleados, así como un apartado de Tarifas donde crearlas y gestionarlas.

Mi objetivo final con este proyecto es proporcionar una herramienta fácil de usar e intuitiva, que cubra las necesidades esenciales para ayudar a los hoteles, en especial a sus trabajadores, y a mejorar su eficiencia.


## Funcionalidades

Las principales funcionalidades de la aplicación son:

Gestión de reservas: los actores principales serán los recepcionistas del hotel y podrán añadir nuevas reservas y gestionar las ya existentes. También podrán cancelarlas.

Registro de clientes: los recepcionistas podrán añadir nuevos clientes y modificar la información de aquellos que ya estén en el sistema.

Realizar check-in y check-out: los recepcionistas modificarán cuando un cliente se haya marchado o llegado al hotel cambiando el estado de este y confirmando la materialización de la reserva.

Gestión de habitaciones: los recepcionistas deben poder asignar, ver el estado, modificar a quién le toca cada habitación y además el personal de limpieza también pueden cambiar el estado a sucio, disponible, bloqueada, etc.

Administración de personal: en este apartado la cuenta con permisos de administrador que usa el hotel se encargará de asignar nuevos usuarios a los trabajadores que se incorporen y asignarles su rol de recepción o pisos.

Generación de facturas: esta funcionalidad se activará automaticamente cuando hagamos el check-out de una reserva.

Crear y aplicar servicios: todos los hoteles tendrán un apartado propio de servicios en los que como puede variar tanto por ejemplo un hotel con servicio lavandería podrá añadir que tiene ese servicio con su precio correspondiente y después usarlo en facturación, esto lo hará el gestor. En lo que a su uso respecta eso lo llevarán los trabajadores del hotel, el añadir el consumo de los distintos servicios del hotel.

## Requisitos no funcionales
Todas las contraseñas de usuarios y administradores deben ser transmitidas de forma encriptada durante el proceso de inicio de sesión para proteger contra riesgos de seguridad.

## Tipos de usuarios
Entre los distintos tipos de usuarios que pueden acceder al sistema tenemos:

1. Administrador del hotel:
 - Tendrá acceso completo al sistema.
 - Podrá gestionar las configuraciones del hotel.
 - Tendrá la capacidad de añadir y gestionar los usuarios asignando roles y permisos.
 - Podrá crear nuevos perfiles a los empleados que se incorporen, ...
2. Recepcionistas:
 - Podrán acceder a las funciones relacionadas con gestión de reservas y clientes.
 - Serán capaces de realizar check-in y check-out de los clientes.
 - Podrán acceder a la información de los clientes y actualizarla.
 - No tendrán acceso a la configuración del hotel.
3. Personal de limpieza:
 - Tendrán acceso limitado para actualizar el estado de las habitaciones una vez limpias.
 - No podrán acceder a las funciones de gestión de reservas o clientes.

## Evaluación de la viabilidad técnica del proyecto

### Hardware requerido
Para llevar a cabo mi proyecto, a nivel hardware será necesario contar con un servidor web en el que poder alojar mi aplicación web. También necesitaré conexión a internet estable para poder realizar cualquier cambio o actualización necesaria al proyecto ya que es web.

Por el lado de los usuarios, necesitarán un ordenador con conexión a internet, ya que a diferencia de algunas apps instalables que existen al ser una aplicación web precisa de acceso a internet para usarla.

### Software
A nivel desarrollo necesitaré el framework de Laravel, lo he elegido porque ya estoy más familiarizado con él, tiene una comunidad bastante activa y cuenta con una extensa documentación que me ayudará a la hora de encontrarme con problemas durante el desarrollo.
El usuario que utilice la aplicación web no tiene grandes requisitos, al ser una aplicación web el sistema operativo que utilice no debería ser un gran problema. El único factor a tener en cuenta es la compatibilidad de la aplicación con ciertos navegadores, Mozilla, Edge y Chrome son las opciones más seguras para que la aplicación funcione de forma correcta.

### Interfaces de usuario

Las interfaces de usuario son el principal punto de mi proyecto. Al introducir la URL en el buscador la persona del hotel que esté intentando loguearse tendrá que introducir su nombre de usuario y contraseña que le ha dado el gestor del sistema en el hotel, que será el encargado de administrar las cuentas de los trabajadores del hotel.
Una vez dentro de la aplicación el usuario tendrá la interfaz de menú principal con la información principal para darse cuenta de un golpe de vista de la situación del hotel.
En en la cabecera tendrá los apartados de Reservas, Clientes, Habitaciones  y Facturación, en estos apartados podrán los usuarios gestionar esos aspectos de su hotel, con ciertas limitaciones dependiendo de sus privilegios en el sistema.

### Interfaces hardware

En lo que a mi sistema de gestión hotelera respecta, no habrá necesidad de interfaces hardware específicas. Aunque sería interesante la integración del sistema con dispositivos externos para el cobro como de punto de venta TPV o lectores de tarjeta.

### Interfaces software

Por ahora no necesito ninguna interfaz software ya que mi aplicación no se comunica con otro sistema o servicio externo.

## Análisis de riesgos e interesados

Creo que ya que estoy mezclando mi experiencia en turismo y programación sería adecuado utilizar para este apartado de riesgos algo que estudiamos en  el módulo de marketing que es un análisis DAFO en el que estudiamos las Debilidades, Amenazas, Fortalezas y Oportunidades que existen en nuestro proyecto y para todos aquellos aspectos negativos intentar paliarlos en menor o mayor medida.

En cuanto a las debilidades creo que dos de las debilidades principales son la experiencia limitada en el desarrollo de software, que si bien cuento con conocimientos básicos en programación puedo enfrentarme a ciertos problemas técnicos más adelante, para esto intentaré apoyarme en mi tutora para que ella me pueda guiar en aquellos puntos que yo no tenga tanto conocimiento además de toda la documentación que existe en la web. La otra debilidad es el tiempo de desarrollo limitado que podría llegar a ser insuficiente o no realizar todas las pruebas necesarias, por lo que intentaré ser conciso y hacer un programa que no abarque tantos puntos, cumpla unos objetivos alcanzables y adaptarme según vaya transcurriendo el proyecto.

Las fortalezas de este proyecto son por un lado que es un modelo de negocio muy escalable que podemos ir aumentando el gasto a la par que aumentan nuestros ingresos. Por otro lado está mi experiencia en el sector hotelero que me ayudará a comprender mejor las necesidades y desafíos específicos de los hoteles.

Desde el punto de vista de las oportunidades este es un mercado en auge en el que la demanda de PMS web y la transformación digital están a la orden del día, por ejemplo muchas empresas previamente reacias a cambiarse de tinta y papel a servicios web en mi empresa de FCT gracias a las ayudas económicas gubernamentales para la transformación digital de los negocios incentiva a estas empresas a dar el paso. 
Otra oportunidad es la diferenciación frente a la competencia, de alcanzar los estándares de sencillez e intuitividad que tengo en mente sería un claro factor diferencial frente a otros softwares existentes.

Por último las amenazas, una de ellas sería la resistencia al cambio, tanto en el caso de hoteles reacios a adoptar sistemas informáticos o aquellos que ya tengan uno y no quieran cambiarse. 
Otra amenaza son los cambios legislativos en el sector, ante los cuales debemos tener una aplicación flexible que pueda adaptarse fácilmente, considerando que la legislación suele cambiar con los cambios políticos.

## Actividades

1. Creación del proyecto Laravel.
2. Creación de las distintas tablas de la BD.
3. Diseño de las plantillas blade en Laravel para nosotros como Administradores de la aplicación.
4. Desarrollo de la funcionalidad para las distintas interfaces de administración.
5. Diseño de las interfaces para el administrador del hotel.
6. Desarrollo de la funcionalidad para las distintas interfaces de administración del hotel.
7. Diseño de las interfaces para los trabajadores del hotel.
8. Desarrollo de la funcionalidad de las interfaces para trabajadores del hotel.
9. Revisión y encriptación de campos vulnerables.

## Mejoras futuras 
Por ahora algunas de ellas serían, la integración del sistema con dispositivos de cobro para poder hacer el apartado de Facturación más eficaz y con mayor usabilidad.
Un apartado donde poder generar informes de ocupación.
La opción de que las tarifas se apliquen de forma automática en base a las fechas, ocupación y tipo de habitación seleccionados.
Integrar un sistema de generación de informes con el que poder analizar los datos que genera nuestro hotel.
