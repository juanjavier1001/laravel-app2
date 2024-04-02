
# Sistema de Asistencias 

![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/principal.png)

## Installation

### 1 Paso   
- Git clone

```bash
git clone https://github.com/juanjavier1001/laravel-app2.git
```
### 2 Paso   
#### Instalar Dependencias 

- composer install : Instalaremos con Composer, el manejador de dependencias para PHP, las dependencias definidos en el archivo composer.json.
Para ello abriremos una terminal en la carpeta del proyecto y ejecutaremos:
```bash
composer install
```
Vemos cómo se ha creado la carpeta vendor.

- npm install : También debemos instalar las dependencias de NPM definidas en el archivo package.json con:
```bash
npm install
```
Vemos cómo se ha creado la carpeta node_modules.

### 3 Paso   
- crear base de datos Mysql 
- nombre de la DB : asistencia-db

### 4 Paso   
#### Crear el archivo .env  

 Este archivo es necesario para configurar la conexión de la bd,el entorno del proyecto, motores para envio y recepción de correos etc . 
 Por cuestiones de seguridad tampoco se subió, necesitamos crearlo.

- Para crearlo podemos duplicar el archivo .env.example, renombrarlo a .env e incluir los datos de conexión de la base de datos que indicamos en el paso anterior.

![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/db.png)

### 5 Paso 
#### Generar una clave 
La clave de aplicación es una cadena aleatoria almacenada en la clave APP_KEY dentro del archivo .env

Para crear la nueva clave e insertarla automáticamente en el .env, ejecutaremos:

```bash
php artisan key:generate
```
### 6 (Ultimo Paso)
#### Ejecutar las migraciones y seeders
- con el siguiente comando 
```bash
php artisan migrate --seed
```

### Arrancar Aplicaccion
- Levantar el servidor de la db  
- Y ejecutar los siguientes comandos en la terminal 

```bash
php artisan serve
```

```bash
npm run dev
```


# Vista previa de la Aplicaccion

### Login
![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/Login.png)

### Register 
![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/Register.png)

### Usuarios 
![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/Usuario.png)

### Usuarios Roles  
![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/UsuarioRoles.png)

<!-- ### Miembros   
![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/Miembro.png)

### Miembros Show    
![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/MiembroShow.png)

### Miembros Edit    
![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/MiembroEdit.png)

### Miembros Update    
![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/MiembroUpdate.png)

### Miembros Delete     
![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/MiembroDelete.png) -->

### Crear Asistencia     
![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/CrearAsistencia.png)

### Roles     
![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/Roles.png)

### Reporte     
![](https://github.com/juanjavier1001/laravel-app2/blob/master/photos/Reporte.png)



## Authors

- [@juanjavier1001](https://www.github.com/juanjavier1001)

