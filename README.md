#  Mini Task Manager

**Gestor de Tareas - Laravel CRUD**  
Desarrollo Web para Integración - Práctica 2  
Autor: Adonis Alegría (AVAV)

---

##  Descripción

Aplicación web para gestionar tareas con operaciones CRUD completas (Crear, Leer, Actualizar, Eliminar).

---

##  Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/avalegria-cmyk/U2Pract2_WEB_AlegriaAdonis.git

```

### 2. Instalar dependencias
```bash
composer install
```

### 3. Configurar archivo de entorno
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configurar base de datos
Edita el archivo `.env` con tus credenciales:
```env
DB_DATABASE=laravel_tasks
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

### 5. Crear la base de datos
En MySQL ejecuta:
```sql
CREATE DATABASE laravel_tasks;
```

### 6. Ejecutar migraciones
```bash
php artisan migrate
```

### 7. Iniciar el servidor
```bash
php artisan serve
```

### 8. Acceder a la aplicación
Abre tu navegador en: **http://localhost:8000**

---

##  Tecnologías Utilizadas

- **Laravel** 12.41.1
- **PHP** 8.4.0
- **MySQL**
- **Bootstrap** 5
- **Blade Templates**

---

##  Funcionalidades

Crear nuevas tareas  
Listar todas las tareas  
Editar tareas existentes  
Eliminar tareas  
Marcar tareas como completadas/pendientes  
Asignar fechas límite  
Validación de formularios  

---

##  Estructura Principal
```
app/
├── Http/Controllers/TaskController.php
├── Models/Task.php
resources/
├── views/
│   ├── layouts/app.blade.php
│   └── tasks/
│       ├── index.blade.php
│       ├── create.blade.php
│       └── edit.blade.php
routes/
└── web.php
database/
└── migrations/
```

---

## Autor

**Adonis Alegría**  
Variables del proyecto: `avav_*`

---

##  Notas

- El archivo `.env` no está incluido en el repositorio por seguridad
- Asegúrate de tener Composer y PHP instalados
- La aplicación usa sesiones basadas en archivos