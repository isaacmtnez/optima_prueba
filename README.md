# Sistema de Fichaje

## Instrucciones para ejecutar el proyecto

1. Clona el repositorio.
2. Importa el archivo `sql/create_database.sql` en tu base de datos MySQL.
3. Importa el archivo `sql/insert_data.sql` para añadir datos de prueba.
4. Configura la conexión a la base de datos en `config/database.php`.
5. Abre el archivo `public/index.html` en tu navegador para acceder a la interfaz de usuario.
6. Usa las páginas HTML para registrar fichajes, consultar el historial y obtener el resumen mensual.

## Justificación de las decisiones técnicas

- **PDO**: Utilizado para la conexión a la base de datos por su seguridad y manejo de excepciones.
- **Estructura del proyecto**: Organizada en carpetas para separar la lógica de negocio y facilitar el mantenimiento.
- **Páginas HTML**: Creación de páginas HTML (`index.html`, `fichar.html`, `historial.html`, `resumen.html`) para facilitar la comprensión y uso del sistema.
