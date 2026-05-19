# 🎓 EduPlus X - Plataforma Educativa

Sistema de gestión educativa con reserva de profesores, calificaciones, anuncios y consultas en tiempo real.

---

## 🛠️ **Requisitos Previos**

| Requisito | Versión |
|-----------|---------|
| **PHP** | 8.2+ |
| **Node.js** | 18+ |
| **Composer** | Última |
| **MySQL** | 5.7+ |

---

## 📦 **Instalación**

```bash
# 1. Clonar o descargar el proyecto
cd c:\xampp\htdocs\prueba

# 2. Instalar dependencias PHP
composer install

# 3. Instalar dependencias Node.js
npm install

# 4. Copiar archivo de configuración
copy .env.example .env

# 5. Generar clave de aplicación
php artisan key:generate

# 6. Crear base de datos (importar eduplusx.sql en MySQL)
# Ejecutar en phpMyAdmin o MySQL:
# mysql -u root -p < eduplusx.sql
```

---

## ⚙️ **Configuración**

Edita `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eduplusx
DB_USERNAME=root
DB_PASSWORD=
```

Ejecuta migraciones:
```bash
php artisan migrate
```

---

## 🚀 **Comandos para Inicializar**

```bash
# En una terminal - Servidor Laravel (backend)
php artisan serve

# En otra terminal - Compilar assets (Vite)
npm run dev

# Para producción - Compilar optimizado
npm run build
```

**Acceder:** `http://localhost:8000`

---

## 📂 **Estructura Principal**

```
app/
├── Models/           → Alumno, Profesor, Cursos, Notas, Reserva...
├── Http/Controllers/ → Controladores
└── Providers/        → Servicios

resources/
├── views/           → Templates Blade
├── css/             → Tailwind CSS
└── js/              → JavaScript/Vue

database/
├── migrations/      → Cambios de BD
└── seeders/         → Datos iniciales
```

---

## 📚 **Stack Tecnológico**

- **Backend:** Laravel 11 + Livewire 3
- **Frontend:** Tailwind CSS + Bootstrap 5
- **ORM:** Eloquent
- **Assets:** Vite
- **Auth:** Jetstream + Sanctum
- **Calendar:** FullCalendar
- **Icons:** Font Awesome
