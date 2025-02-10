# Bancaya - Sistema de Gestión de Turnos Bancarios

## 📌  Descripción del Proyecto

Bancaya es una aplicación diseñada para optimizar la gestión de turnos en un banco, permitiendo a los clientes generar su turno de manera automática y a los asesores gestionar eficientemente la atención. La aplicación proporciona una interfaz intuitiva para la asignación de turnos, el seguimiento en tiempo real y la administración de clientes y asesores.

### El sistema permite:

Generar fichos de turno según el tipo de trámite.

Asignar turnos automáticamente a los asesores disponibles.

Mostrar el estado de los turnos en una pantalla en tiempo real.

Administrar clientes, asesores y trámites de manera eficiente.

## 🚀 Tecnologías Utilizadas

#### Bancaya está desarrollada con las siguientes tecnologías:

Laravel: Framework PHP para el backend.

WebSockets: Para la actualización en tiempo real de turnos.

Jetstream: Sistema de autenticación y gestión de usuarios.

Livewire: Para la construcción de interfaces dinámicas en tiempo real.

MySQL: Base de datos para almacenamiento de turnos y usuarios.

## ⚙️ Características Principales

__Autenticación de Usuarios (Clientes, Asesores, Administradores).__

__Generación de Turnos Automática con código único.__

__Asignación de Turnos a Asesores según disponibilidad.__

__Gestión de Estados de Turnos (Pendiente, Atendido, No Asistió).__

__Actualización en Tiempo Real con WebSockets y Livewire.__

__Panel de Administración para gestionar clientes, asesores y turnos.__

## 📌 Despliegue en VPS

El sistema será desplegado en un VPS, asegurando estabilidad y disponibilidad 24/7. Para ello se utilizarán herramientas como:

NGINX/Apache para el servidor web.

Supervisord para gestionar WebSockets.

MySQL para la base de datos.

PHP 8+ con Laravel Optimizado.

## 🔧 Instalación y Configuración

### Requisitos Previos

__PHP 8+__

__Composer__

__Node.js y NPM__

__MySQL__

# Pasos para la Instalación

# Clonar el repositorio
git clone https://github.com/SoyNar/BancaYaAppLaravel
cd bancaya

# Instalar dependencias
composer install
npm install && npm run build

# Configurar entorno
cp .env.example .env
php artisan key:generate

# Configurar base de datos en .env y luego ejecutar:
php artisan migrate --seed

# Ejecutar servidor
ohp artisan serve

Configuración de WebSockets y Supervisor

php artisan websockets:serve

Para asegurarse de que WebSockets siga ejecutándose en el VPS:

sudo apt install supervisor

Configurar Supervisor para mantener WebSockets activo.

📜 Licencia

Este proyecto está bajo la licencia MIT.

✨ Contribuciones

Las contribuciones son bienvenidas. Para ello, abre un Issue o envía un Pull Request.

📧 Contacto

Para cualquier consulta, puedes escribir narciris.tech@gmail.com

# BancaYaAppLaravel
