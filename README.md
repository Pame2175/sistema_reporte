# Sistema de Reporte de Maltrato Animal (SMA2023)

<p align="center">
  <img src="https://www.php.net/images/logos/php-logo.svg" alt="PHP Logo" width="100"/>
  <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/JavaScript-logo.png" alt="JavaScript Logo" width="80"/>
  <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo-shadow.png" alt="Bootstrap Logo" width="80"/>
  <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/CSS3_logo_and_wordmark.svg" alt="CSS Logo" width="80"/>
</p>
## Descripción

SMA2023 es un sistema diseñado para facilitar la denuncia y seguimiento de casos de maltrato animal. Utilizando tecnologías como PHP, JavaScript, Bootstrap y CSS, este sistema permite a los usuarios reportar incidentes de manera independiente y a los administradores gestionar y visualizar los reportes a través de un mapa interactivo y gráficos estadísticos.

## Características

### Funcionalidades para Usuarios

- **Reporte Independiente**: Los usuarios pueden reportar incidentes de maltrato animal proporcionando detalles y ubicación.
- **Formulario de Reporte**: Uso de formularios intuitivos y accesibles para facilitar la denuncia.

### Funcionalidades para Administradores

- **Visualización en Mapa**: Los administradores pueden ver los reportes en un mapa interactivo con geolocalización.
- **Gestión de Reportes**: Capacidad para gestionar y actualizar el estado de los reportes (atendidos, no atendidos).
- **Estadísticas y Gráficos**: Visualización de datos a través de gráficos estadísticos para analizar los reportes atendidos y no atendidos.

## Tecnologías Utilizadas

- **PHP**: Para la lógica del servidor y manejo de la base de datos.
- **JavaScript**: Para la interactividad y funcionalidades dinámicas en el cliente.
- **Bootstrap**: Para el diseño y la maquetación responsiva del sistema.
- **CSS**: Para el estilo y la personalización visual del sitio.
- **Geolocalización**: Para la localización y mapeo de los reportes.

## Estructura del Proyecto

- **datatables/DataTable**: Contiene archivos relacionados con la visualización de datos en tablas.
- **db**: Directorio con los scripts de la base de datos.
- **estilo**: Archivos de estilo CSS.
- **sistema**: Lógica principal del sistema.
- **usuario**: Funcionalidades y vistas para los usuarios.
- **conexion.php**: Archivo de conexión a la base de datos.
- **index.php**: Punto de entrada principal del sistema.
- **sistema_reporte2023.sql**: Script SQL para la creación de la base de datos.

## Instalación

1. **Clona el repositorio:**

    ```sh
    https://github.com/Pame2175/sistema_reporte.git
    cd SMA2023
    ```

2. **Configura la Base de Datos:**

    - Importa el archivo `sistema_reporte2023.sql` en tu servidor de base de datos (MySQL).

3. **Configura el Archivo de Conexión:**

    - Edita `conexion.php` con los detalles de tu base de datos.

4. **Instala las Dependencias:**

    - Asegúrate de tener instalado un servidor local (XAMPP, WAMP, etc.).
    - Coloca el proyecto en el directorio `htdocs` (o equivalente) de tu servidor local.

## Uso

1. **Acceso al Sistema:**

    - Navega a `http://localhost/Sistema_reporte` en tu navegador web.

2. **Funciones de Usuario:**

    - Completa el formulario de reporte para enviar un nuevo incidente.

3. **Funciones de Administrador:**

    - Inicia sesión como administrador para acceder al panel de gestión.
    - Visualiza y gestiona los reportes en el mapa y revisa las estadísticas.

## Contribuciones

¡Las contribuciones son bienvenidas! Por favor, sigue los pasos a continuación para contribuir:

1. Realiza un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature/nueva-caracteristica`).
3. Realiza tus cambios y haz un commit (`git commit -am 'Añadir nueva característica'`).
4. Haz push a la rama (`git push origin feature/nueva-caracteristica`).
5. Abre un Pull Request.


## Contacto

Para cualquier pregunta o sugerencia, puedes contactarme a través de pamegonza.98.pg@gmail.com.

