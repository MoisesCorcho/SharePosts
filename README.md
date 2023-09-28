# MiniFrameworkMVC

Este proyecto es una aplicación web con funcionalidades básicas que permiten a los usuarios registrarse y acceder al sistema. Una vez dentro, pueden realizar operaciones CRUD en publicaciones que se muestran en la pantalla principal. Es importante destacar que todas las publicaciones son visibles para todos los usuarios, independientemente de quién las haya creado. Sin embargo, solo los propietarios de una publicación tienen la capacidad de actualizarla o eliminarla.

Es un proyecto creado bajo un "mini-framework" creado por mi en php bajo el patron MVC.

El flujo de trabajo para el uso de este framework consta de:
- Crear un controlodar (dentro de la ruta app/controladores)
- Crear un modelo (dentro de la carpeta app/models) para que el controlador pueda comunicarse con la base de datos 
- crear vistas (dentro de la ruta app/models)


Para configurar tu proyecto, sigue estos pasos:

## Configuración de la Base de Datos

En el archivo `app/config/config.php`, establece la configuración de tu base de datos, la URL y el nombre de tu sitio:

## Configuración de la Ruta del Proyecto

En el archivo .htaccess dentro de la carpeta public, establece la ruta del proyecto en YOUR_PROJECT_PATH.
Usé XAMPP para la realizacion de este proyecto, con lo cual, en YOUR_PROJECT_PATH iria la ruta de tu proyecto luego de 
la carpeta htdocs


![Texto Alternativo](../public/img/Screenshots/Shareposts1.png)
![Texto Alternativo](../public/img/Screenshots/Shareposts2.png)
![Texto Alternativo](../public/img/Screenshots/Shareposts3.png)
![Texto Alternativo](../public/img/Screenshots/Shareposts4.png)
![Texto Alternativo](../public/img/Screenshots/Shareposts5.png)
![Texto Alternativo](../public/img/Screenshots/Shareposts6.png)

