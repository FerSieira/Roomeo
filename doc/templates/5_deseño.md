# DISEÑO

## Diseño del proyecto 

### Modelo conceptual del dominio de la aplicación y/o Diagrama de clases [usando UML, ConML, o lenguaje similar].

![Diagrama de clases](doc/img/UMLPMS.png)

### Casos de uso [descritos en fichas y/o mediante esquemas; deben incluír los actores (tipos de usuarios) implicados en cada caso de uso].

A continuación muestro los diagrama de casos de uso para los distintos actores junto con las fichas de las acciones en cada uno de los casos:

Diagrama: 
![Casos de Uso Diagrama](doc/img/CasosdeUso.png)

Fichas:
![Casos Uso 1](doc/img/CasoUso1.png)
![Casos Uso 2](doc/img/CasoUso2.png)
![Casos Uso 3](doc/img/CasoUso3.png)
![Casos Uso 4](doc/img/CasoUso4.png)

### Diseño de interfaces de usuarios.

- **Menú principal:**
![Dashboard](doc/img/Dashboard.png)
- **Reservas:**
![Reservas](doc/img/ReservasIndex.png)
- **Servicios:**
![Servicios](doc/img/Servicios.png)
- **Reserva de servicios:**
![RsvServicios](doc/img/RsvServicios.png)
- **Clientes:**
![Clientes](doc/img/Clientes.png)
- **Empleados:**
![Empleados](doc/img/Empleados.png)
- **Habitación:**
![Habitacion](doc/img/Habs.png)
- **Tipos de habitación:**
![Tipos Habitacion](doc/img/TiposHab.png)
- **Facturas:**
![Facturas](doc/img/Facturas.png)

### Diagrama de Base de Datos.

En cuanto a los diagramas de la base de datos, presento dos:

El primero es un diagrama entidad relación:

![Diagrama ER Chen](doc/img/DiagramaER.png)

Y el segundo es un diagrama general de la base de datos utilizando phpMyAdmin para generarlo:

![Diagrama BD](doc/img/DiagramaBD.png)


### Diagrama de despliegue

Este es el diagrama de despliegue de la aplicación. Tiene en cuenta que los usuarios se pueden conectar a la dirección URL desde móvil u ordenador, se conectarán al navegador web hosteado en un servidor donde Eloquent ORM y la aplicación se comunicarán con la base de datos.

![Diagrama de despliegue](doc/img/Despliegue.png)
