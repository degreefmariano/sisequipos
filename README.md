<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistema de Equipos Informáticos

## Descripción

Este proyecto es una aplicación web monolítica desarrollada en Laravel que gestiona el ciclo de vida de los equipos informáticos desde su ingreso a un taller de reparación hasta su entrega al cliente. Permite registrar la información del equipo, realizar un seguimiento del proceso de reparación, generar tickets de ingreso y emitir reportes en formato PDF.

## Requisitos del Sistema

- Servidor web: Apache, Nginx o similar
- Base de datos: MySQL, PostgreSQL o compatible
- PHP: Versión compatible con Laravel >= 9.0 (verificar la documentación oficial de Laravel)
- Composer: Para la gestión de dependencias
- Node.js y npm: Para la gestión de assets (si se utilizan frameworks de front-end como Vue o React)

## Instalación

Sigue estos pasos para instalar y configurar el proyecto:

1. Clona el repositorio:

   ```bash
   git clone https://github.com/degreefmariano/sisequipos.git
   ```

2. Ingresa al proyecto:

   ```bash
   cd sisequipos
   ```

3. Instala las dependencias:

   ```bash
   composer install
   npm install
   ```

4. Copia el archivo **.env.example** a **.env** y configura tus variables de entorno, especialmente las relacionadas con la base de datos:

   ```bash
   cp .env.example .env
   ```

5. Genera la clave de la aplicación:

   ```bash
   php artisan key:generate
   ```

6. Migra la base de datos

   ```bash
   php artisan migrate
   ```

7. Inicia el servidor de desarrollo:

   ```bash
   php artisan serve
   ```

# Uso

## Endpoints

La API ofrece los siguientes endpoints:

<ul>
  <li><h3>API</h3></li>
  <ul>
      <li><b>Ruta:</b> POST <i>api/equipos</i></li>
      <li><b>Descripción:</b> Obtiene una lista de equipos.</li>
  </ul>
  <ul>
      <li><b>Ruta:</b> POST <i>api/servicios</i></li>
      <li><b>Descripción:</b> Obtiene una lista de servicios.</li>
  </ul>
</ul>

<ul>
  <li><h3>Web</h3></li>
  <ul>
      <li><b>Ruta:</b> POST <i>/equipos</i></li>
      <li><b>Descripción:</b> Gestión de equipos.</li>
  </ul>
  <ul>
      <li><b>Ruta:</b> POST <i>/servicios</i></li>
      <li><b>Descripción:</b> Gestión de servicios</li>
  </ul>
  <ul>
      <li><b>Ruta:</b> POST <i>/reportes</i></li>
      <li><b>Descripción:</b> Gestión de reportes</li>
  </ul>
</ul>

## Modelo de Objetos

El modelo de objetos sigue una estructura básica:

<ul>
  <li><b>Equipo: </b> Representa un equipo informático con atributos como serie, marca, modelo, etc. y tiene una relación de uno a muchos con <b>Servicio.</b></li>
  <li><b>Servicio: </b> Representa un servicio de reparación con atributos como fecha de ingreso, estado, etc.</li>
  <li><b>Usuario: </b> Representa un usuario del sistema con roles y permisos.</li>
</ul>

Las relaciones se definen como sigue:

<ul>
  <li><b>Equipo: </b> tiene muchos <b>Servicio</b></li>
  <li><b>Servicio: </b> pertenece a <b>Equipo</b></li>
</ul>

## Estilo de Código

El proyecto sigue el estilo de código de PSR-12 y las mejores prácticas recomendadas por la comunidad Laravel.

## Arquitectura

El proyecto sigue una arquitectura MVC (Model-View-Controller) típica de Laravel:

<ul>
  <li><b>Models: </b> Definición de las entidades y sus relaciones.</li>
  <li><b>Controllers: </b> Gestión de la lógica de negocio y las operaciones CRUD.</li>
  <li><b>Routes: </b> Definición de los endpoints de la API.</li>
</ul>

## Conocimiento Funcional

Este proyecto es una aplicación web monolítica desarrollada en Laravel que gestiona el ciclo de vida de los equipos informáticos desde su ingreso a un taller de reparación hasta su entrega al cliente. Permite registrar la información del equipo, realizar un seguimiento del proceso de reparación, generar tickets de ingreso y emitir reportes en formato PDF.

<hr>

- [Linkedin Autor](https://linkedin.com/in/mariano-de-greef).  

- [Email Autor](mailto:degreefmariano@gmail.com).
