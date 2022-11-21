<!--LOGO-->
<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="README/logo.png" alt="Logo" width="220" height="80">
  </a>

  <h3 align="center">Rediseño Portal del Estudiante</h3>

  <p align="center">
    <a href="https://github.com/eliasercs/portal-estudiante"><strong>Explora la documentación »</strong></a>
  </p>
</div>

<!--TABLA DE CONTENIDO-->
<details>
  <summary>Tabla de Contenido</summary>
  <ol>
    <li>
      <a href="#about-the-project">Sobre el proyecto</a>
      <ul>
        <li><a href="#built-with">Tecnologías utilizadas</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">¿Cómo empezar?</a>
      <ul>
        <li><a href="#prerequisites">Prerequisitos</a></li>
        <li><a href="#installation">Instalación</a></li>
      </ul>
    </li>
    <li><a href="#usage">Uso</a></li>
    <li><a href="#roadmap">Características</a></li>
    <li><a href="#license">Licencia</a></li>
  </ol>
</details>

## Sobre el proyecto

> El portal del estudiante es una plataforma institucional utilizada por los estudiantes con motivos académicos. La versión actual desplegada a producción para todos los usuarios cuenta con graves problemas en su diseño, asociado a la interfaz de usuario, entre sus problemas destaca en que su interfaz no es adaptable a distintas resoluciones de pantalla, lo que en ocasiones suele generar problemas en la experiencia de usuario, obligando a ellos buscar otras soluciones alternativas poco intuitivas. Nuestra propuesta de proyecto busca resolver esa necesidad.

### Tecnologías utilizadas

* Laravel 8
* SQL Server 2019

## ¿Cómo empezar?

### Pre-requisitos

Para que este proyecto funcione en instancia de desarrollo es necesario contar con las siguientes herramientas:

* PHP 7.3 o superior.
* Laravel 8
* SQL Server 2019
* Composer

Adicionalmente, es necesario elaborar un archivo de variables de entorno con la siguiente configuración: 

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:G6hLJpPqKyDiaN5kHNvIHaqTFP3Jqeo9n8l7MYWiRsk=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=sqlsrv
DB_HOST=127.0.0.1
DB_PORT=1433
DB_DATABASE=nombre_database
DB_USERNAME=
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME="Usuario asignado por Mailtrap"
MAIL_PASSWORD="Contraseña asignada por Mailtrap"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="Correo de su preferencia"
MAIL_FROM_NAME="Nombre de correo de su preferencia"

```

Algunos módulos requieren de una configuración asignada por Mailtrap, el cual es un servicio de correo SMTP implementado como prueba en funcionalidades que lo requieran.

### Instalación

Los módulos de Laravel necesitan ser instaladas en el directorio clonado, para ello debe utilizar el siguiente comando:

```bash
> composer install
```

El proyecto ya cuenta con un modelo de base de datos, una vez implementado, puede migrar dicho modelo a SQL Server utilizando el comando:

```bash
> php artisan migrate
```

## Uso

Una vez completados los pasos descritos en pre-requisitos e instalación, ya puede proceder a ejecutar el proyecto con el comando:

```bash
> php artisan serve
```

## Características

A continuación se describen las principales rutas para acceder mediante el navegador.

| Método | Ruta | Descripción | Autenticación |
| --- | --- | --- | --- |
| GET | / | Corresponde a la vista principal del proyecto. A través de ella el estudiante puede iniciar sesión. | No |
| GET | /register | Vista generada con la finalidad de registrar usuarios a la plataforma. | No |
| GET | /home | Vista generada para el estudiante que ya pudo iniciar sesión a su cuenta | Sí |
| GET | /inscripcion | Módulo y vista que permite al estudiante inscribir cursos asociados a su carrera. | Sí |
| GET | /course/delete | Módulo y vista que permite al estudiante continuar con el proceso de eliminación de cursos. | Sí |
| GET | /Academico | Módulo y vista que permite al estudiante verificar y obtener acceso a información académica. | Sí |
| GET | /Asistente | Módulo y vista que permite al estudiante generar una solicitud con algún asistente social de la institución. | Sí |
| GET | /Solicitudes | Módulo y vista que permite al estudiante generar solicitudes de renuncia y/o suspención académica. | Sí |

## Licencia