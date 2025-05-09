<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
<p align="center">

    # Sistema de Reserva de Citas Médicas

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Sistema web desarrollado en Laravel para gestionar reservas de citas médicas de manera eficiente. Este sistema está diseñado para ser utilizado por **Administradores** y **Secretarias** para gestionar pacientes, doctores, consultorios, horarios y citas médicas.

---

## Características Principales

### Roles de Usuario
El sistema tiene dos roles principales:
- **Administrador:** Tiene acceso completo al sistema, incluyendo la gestión de usuarios (secretarias), doctores, consultorios, horarios y citas médicas.
- **Secretaria:** Puede gestionar pacientes, agendar citas médicas, ver historiales clínicos y generar reportes.

Los **Doctores** y **Pacientes** no tienen acceso al sistema como usuarios con inicio de sesión. Su información se gestiona a través de los roles de Administrador y Secretaria.

---

### Módulos del Sistema

#### 1. **Módulo de Inicio de Sesión**
- Sistema de autenticación para **Administradores** y **Secretarias**.
- Panel de administración personalizado según el rol del usuario.
- Recuperación de contraseña mediante preguntas de seguridad:
  - Los usuarios pueden restablecer su contraseña respondiendo a preguntas de seguridad configuradas durante el registro.
  - Proceso seguro y fácil de usar para recuperar el acceso en caso de olvido de credenciales.

#### 2. **Módulo de Usuarios**
- **Listado de usuarios:** Visualización de todos los usuarios registrados.
- **Registro de usuarios:** Creación de nuevas cuentas para secretarias.
- **Actualización de usuarios:** Edición de datos de usuarios existentes.
- **Eliminación de usuarios:** Desactivación de cuentas.
- **Buscador de usuarios:** Filtro rápido por nombre, correo o rol.
- **Reporte de usuarios:** Generación de reportes en formato Excel y PDF.
- **Paginación:** Navegación entre páginas para grandes listados.

#### 3. **Módulo de Pacientes**
- **Listado de pacientes:** Visualización de todos los pacientes registrados.
- **Registro de pacientes:** Creación de nuevos registros de pacientes.
- **Visor de datos:** Detalles completos de cada paciente.
- **Actualización de pacientes:** Edición de datos personales o médicos.
- **Eliminación de pacientes:** Eliminación lógica de registros.
- **Buscador de pacientes:** Filtro rápido por nombre, DNI o fecha de registro.
- **Reporte de pacientes:** Generación de reportes en formato Excel y PDF.
- **Paginación:** Navegación entre páginas para grandes listados.

#### 4. **Módulo de Doctores**
- **Listado de doctores:** Visualización de todos los doctores registrados.
- **Registro de doctores:** Creación de nuevos registros de doctores.
- **Visor de datos:** Detalles completos de cada doctor (especialidad, consultorio, horario).
- **Actualización de doctores:** Edición de datos profesionales.
- **Eliminación de doctores:** Eliminación lógica de registros.
- **Buscador de doctores:** Filtro rápido por nombre, especialidad o consultorio.
- **Reporte de doctores:** Generación de reportes en formato Excel y PDF.
- **Paginación:** Navegación entre páginas para grandes listados.

#### 5. **Módulo de Consultorios**
- **Listado de consultorios:** Visualización de todos los consultorios disponibles.
- **Registro de consultorios:** Creación de nuevos consultorios.
- **Visor de datos:** Detalles completos de cada consultorio.
- **Actualización de consultorios:** Edición de datos (nombre, ubicación, etc.).
- **Eliminación de consultorios:** Eliminación lógica de registros.
- **Buscador de consultorios:** Filtro rápido por nombre o ubicación.
- **Reporte de consultorios:** Generación de reportes en formato Excel y PDF.
- **Paginación:** Navegación entre páginas para grandes listados.

#### 6. **Módulo de Horarios**
- **Listado de horarios:** Visualización de todos los horarios disponibles.
- **Registro de horarios:** Asignación de horarios a doctores.
- **Visor de datos:** Detalles completos de cada horario (día, hora, doctor).
- **Actualización de horarios:** Edición de horarios asignados.
- **Eliminación de horarios:** Eliminación lógica de registros.
- **Validaciones:**
  - Evita horarios repetidos.
  - Verifica la disponibilidad de doctores.
  - Restringe días no laborables.
- **Calendario de atención:** Visualización gráfica de horarios de doctores.
- **Reporte de horarios:** Generación de reportes en formato Excel y PDF.
- **Paginación:** Navegación entre páginas para grandes listados.


#### 7. **Módulo de reservas**

- **Listado de citas:** Visualización de todas las citas agendadas.
- **Registro de citas:** Agendamiento de nuevas citas médicas.
- **Visor de datos:** Detalles completos de cada cita (paciente, doctor, fecha, hora).
- **Buscador de citas:** Filtro rápido por paciente, doctor o fecha.
- **Reporte de citas:**
  - Generación de reportes de todas las citas.
  - Generación de reportes por rango de fechas.
- **Calendario de citas:** Visualización gráfica de citas médicas.
- **Paginación:** Navegación entre páginas para grandes listados.

#### 8. **Módulo de Historial Clínico**
- **Listado de historiales:** Visualización de todos los historiales clínicos.
- **Registro de historiales:** Creación de nuevos registros médicos.
- **Visor de datos:** Detalles completos de cada historial clínico.
- **Actualización de historiales:** Edición de datos médicos.
- **Eliminación de historiales:** Eliminación lógica de registros.
- **Buscador de historiales:** Filtro rápido por paciente o fecha.
- **Reporte de historiales:** Generación de reportes en formato Excel y PDF.
- **Paginación:** Navegación entre páginas para grandes listados.

---

## Instalación

Para instalar y ejecutar este proyecto en tu entorno local, sigue estos pasos:

Clona el repositorio:
git clone https://github.com/LeomerNeroz/Sistema-Reserva-Citas-Medicas-Laravel.git
cd Sistema-Reserva-Citas-Medicas-Laravel

Instala las dependencias de Composer:
composer install

Configura el archivo .env:
Copia el archivo .env.example a .env

cp .env.example .env

Edita el archivo .env y configura las variables de la base de datos:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario_mysql
DB_PASSWORD=tu_contraseña_mysql

Genera la clave de aplicación:

php artisan key:generate

Ejecuta las migraciones y seeders:

php artisan migrate --seed
php artisan db:seed --class=SecurityQuestionsSeeder

Accede al sistema:
Abre http://localhost en tu navegador.
Usa las credenciales predeterminadas:

admin@admin.com
12345678

secretaria@admin.com
12345678

## Acerca del Proyecto

Este sistema fue desarrollado utilizando **Laravel**, un framework de PHP moderno y robusto que facilita la creación de aplicaciones web escalables. Laravel proporciona herramientas poderosas como:
- Un sistema de rutas simple y rápido.
- Migraciones de base de datos para gestionar cambios estructurales.
- Autenticación integrada para manejar roles de usuario (Administrador y Secretaria).
- Generación de reportes en Excel y PDF mediante bibliotecas como Laravel Excel.

## Recursos Útiles

Si eres nuevo en Laravel o en las tecnologías utilizadas en este proyecto, estos recursos pueden ayudarte a familiarizarte:
- [Documentación oficial de Laravel](https://laravel.com/docs)
- [Laracasts](https://laracasts.com): Tutoriales en video sobre Laravel y PHP moderno.
- [Laravel Excel](https://laravel-excel.com): Biblioteca para generar archivos Excel y CSV.
- [PDF Libraries](https://github.com/barryvdh/laravel-dompdf): Herramienta para generar PDFs en Laravel.

## Agradecimientos

Este proyecto no habría sido posible sin el apoyo de las siguientes herramientas y bibliotecas de código abierto:

- **[AdminLTE](https://adminlte.io):** Plantilla de administración utilizada para el diseño del panel de control.
- **[Laravel Excel](https://laravel-excel.com):** Biblioteca para generar reportes en formato Excel.
- **[DOMPDF](https://github.com/barryvdh/laravel-dompdf):** Herramienta para generar archivos PDF.
- **[Font Awesome](https://fontawesome.com):** Iconos utilizados en todo el sistema.
- **[Bootstrap](https://getbootstrap.com):** Framework CSS utilizado para el diseño responsivo.
- **[jQuery](https://jquery.com):** Biblioteca JavaScript para simplificar interacciones frontend.
- **[BootstrapMade](https://bootstrapmade.com):** Plantilla base utilizada para el diseño frontend del sistema.


## Licencia

Este proyecto está bajo la licencia [Creative Commons Attribution 4.0 International (CC BY 4.0)](https://creativecommons.org/licenses/by/4.0/).  
©

Esta obra está licenciada bajo [CC BY 4.0](https://creativecommons.org/licenses/by/4.0/?ref=chooser-v1).  
<img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1" alt="">  
<img style="height:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1" alt="">

Para más detalles, consulta el archivo [LICENSE](LICENSE).

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
