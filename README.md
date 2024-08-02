# Gestión de Ambientes

## Introducción

El proyecto "Gestión de Ambientes" tiene como objetivo principal facilitar a los instructores del SENA el proceso de enviar informes sobre los insumos presentes en los ambientes de enseñanza. Estos insumos incluyen elementos críticos como computadores, sillas, mesas, tableros, entre otros. La finalidad de estos informes es detectar de manera temprana cualquier daño o extravío de estos objetos, permitiendo una gestión eficiente de los recursos y asegurando un ambiente óptimo para el aprendizaje.

## Objetivos del Proyecto

- Desarrollar un sistema intuitivo y fácil de usar que permita a los instructores del SENA enviar informes de los insumos presentes en los ambientes de enseñanza.
- Agilizar el proceso de detección de daños o extravíos en los insumos mediante la implementación de un sistema de reportes eficiente.
- Mejorar la gestión de recursos al proporcionar una plataforma que facilite la comunicación entre los instructores y los encargados de mantenimiento para la pronta resolución de problemas.

## Alcances del Proyecto

- El sistema permitirá a los instructores registrar y enviar informes sobre los insumos presentes en los ambientes de enseñanza, incluyendo detalles como la cantidad, estado y ubicación de los mismos.
- Se desarrollará una interfaz intuitiva que permita a los usuarios navegar fácilmente por el sistema y enviar informes de manera rápida y eficiente.
- El sistema no incluirá funcionalidades avanzadas como programación de mantenimiento preventivo, gestión de inventario completo, o seguimiento de reparaciones específicas en los insumos. Estas funcionalidades podrán ser consideradas en futuras iteraciones del proyecto, pero estarán fuera del alcance inicial.

## Requerimientos del Sistema

### Requerimientos Funcionales

- **Registro de Insumos**: El sistema debe permitir a los instructores registrar los insumos presentes en los ambientes de enseñanza, incluyendo información como el tipo de insumo, cantidad, estado y ubicación.
- **Envío de Informes**: Los instructores deben poder enviar informes sobre los insumos detectando daños o extravíos a través de una interfaz intuitiva.
- **Gestión de Usuarios**: El sistema debe permitir la gestión de usuarios, incluyendo la creación, modificación y eliminación de cuentas de instructores y administradores.
- **Generación de Reportes**: Se debe proporcionar la capacidad de generar reportes que resuman la información enviada por los instructores, facilitando la toma de decisiones por parte de los encargados de mantenimiento.
- **Notificaciones**: El sistema debe enviar notificaciones a los encargados de mantenimiento cuando se envíen informes de daños o extravíos de insumos.
- **Autenticación y Seguridad**: Se requiere autenticación de usuarios para acceder al sistema, con medidas de seguridad adecuadas para proteger la información sensible.
- **Interfaz de Usuario Intuitiva**: El sistema debe contar con una interfaz de usuario amigable y fácil de usar, que permita a los instructores enviar informes de manera rápida y eficiente.
- **Compatibilidad con Dispositivos Móviles**: El sistema debe ser compatible con dispositivos móviles, permitiendo a los instructores enviar informes desde sus celulares mediante la lectura de códigos QR.

### Requerimientos No Funcionales

- **Rendimiento**: El sistema debe ser capaz de manejar múltiples usuarios concurrentes sin experimentar retrasos significativos en la respuesta.
- **Seguridad**: Se deben implementar medidas de seguridad para proteger los datos del sistema, incluyendo encriptación de datos, prevención de ataques de inyección SQL, entre otros.
- **Usabilidad**: La interfaz de usuario debe ser intuitiva y fácil de usar, incluso para usuarios con poca experiencia en sistemas informáticos.
- **Disponibilidad**: El sistema debe estar disponible la mayor parte del tiempo, con tiempos de inactividad mínimos para mantenimiento programado o actualizaciones.
- **Escalabilidad**: El sistema debe ser escalable para poder manejar un aumento en la cantidad de usuarios y datos sin comprometer su rendimiento.
- **Compatibilidad con Dispositivos**: El sistema debe ser compatible con una amplia variedad de dispositivos y navegadores web, incluyendo computadoras de escritorio, portátiles, tabletas y teléfonos móviles.
- **Mantenibilidad**: El código del sistema debe estar bien documentado y seguir las mejores prácticas de desarrollo para facilitar su mantenimiento y futuras actualizaciones.

## Tecnologías Utilizadas

### Lenguajes

- **HTML**: Utilizado para la estructura y contenido de las páginas web.
- **CSS**: Utilizado para el diseño y estilo de las páginas web.
- **JavaScript**: Utilizado para la lógica y funcionalidades interactivas en el lado del cliente.
- **PHP**: Utilizado para la lógica del servidor y la comunicación con la base de datos.

### Base de Datos

- **MySQL**: Utilizado como sistema de gestión de bases de datos para almacenar la información sobre los insumos, usuarios y otros datos relevantes del sistema.

### Patrón de Diseño

- **Modelo Vista Controlador (MVC)**: Patrón de diseño utilizado para separar la lógica de negocio, la presentación y el control de las acciones del usuario en tres componentes distintos, facilitando así la mantenibilidad y escalabilidad del sistema.

### Servidor Web

- **Apache**: Utilizado como servidor web para alojar y servir las páginas web y archivos del sistema.

Esta arquitectura sigue el patrón Modelo-Vista-Controlador (MVC), donde el cliente interactúa con la interfaz de usuario a través de un navegador web. La interfaz de usuario está compuesta por HTML, CSS y JavaScript, que se encargan de la presentación y la interactividad en el lado del cliente. El controlador, implementado en PHP, procesa las solicitudes del usuario, realiza la lógica del negocio y se comunica con la base de datos MySQL para recuperar o almacenar información. La base de datos MySQL almacena todos los datos del sistema, incluyendo información sobre los insumos, usuarios y otros datos relevantes. El servidor web Apache se encarga de servir las páginas web y de gestionar las solicitudes entre el cliente y el sistema.
