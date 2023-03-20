# laravel-crud
Proyecto para la asignatura Tecnologías Avanzadas de Desarrollo usando Laravel para realizar las operaciones CRUD.


![UML](https://github.com/anmamebo/laravel-crud/blob/main/enunciado.png)

---
## INSTRUCCIONES AL CLONAR REPOSITORIO
---
### 1. Instalar dependencias

Instalaremos con Composer, el manejador de dependencias para PHP, las dependencias definidos en el archivo composer.json. Para ello abriremos una terminal **en la carpeta del proyecto** y ejecutaremos:

```
composer install
```

Vemos cómo se ha creado la carpeta **vendor**.

También debemos instalar las dependencias de NPM definidas en el archivo **package.json** con:

```
npm install
```

Y en esta ocasión vemos cómo se crea la carpeta **node_modules**.


### 2. Generar archivo .env

Por seguridad el archivo .env está excluido del repositorio, para generar uno nuevo se toma como plantilla el archivo .env.example para copiar este archivo en una nuevo escribe en tu terminal:

```
cp .env.example .env
```

### 3. Generar key

La **clave de aplicación** es una cadena aleatoria almacenada en la clave APP_KEY dentro del archivo **.env**. Notarás que también falta.

Para crear la nueva clave e insertarla automáticamente en el **.env**, ejecutaremos:

```
php artisan key:generate
```

### 4. Ejecutar migraciones

Por último, ejecutamos las migraciones para que se generen las tablas con:

```
php artisan migrate
```

Si tuvieramos que incluir o crear nuevas migraciones utilizaríamos:

```
php artisan migrate:refresh 
php artisan migrate:fresh  //borra y crea todas las tablas de nuevo
```

Con esto ya tendría que correr sin problemas la aplicación de Laravel que hemos clonado.

### 5. Lanzar proyecto

Ejecutar los comandos en diferentes terminales

```
npm run dev
```

```
php artisan serve
```

---
## FICHERO .SQL CON DATOS DE EJEMPLO
---

- [datos.sql](https://github.com/anmamebo/laravel-crud/blob/main/database/datos.sql)