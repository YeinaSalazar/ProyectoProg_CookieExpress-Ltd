# Endpoints API - Usuarios y Seguridad

## Reglas generales
- Todas las requests y responses usan JSON.
- `Content-Type: application/json`.

## Roles
- 1 = administrador
- 2 = logística
- 3 = cliente

## Formato de respuesta
Éxito:
```json
{ "ok": true, "data": {} }

Error:
```json 
{ "ok": false, "error": { "code": "ERROR_CODE", "message": "Mensaje" } }


Endpoints
POST /crearUsuario
Rol requerido: admin
Body JSON:
nombre_usuario
correo
password
rol_id
Respuesta: usuario creado
PUT /actualizarUsuario
Rol requerido: admin o cliente (solo su propio id)
Body JSON:
id_usuario (obligatorio)
campos opcionales a actualizar
Respuesta: ok
DELETE /deleteUsuario/{id}
Rol requerido: admin
Respuesta: ok
GET /getbyIdUsuario/{id}
Rol requerido: admin
Respuesta: usuario
GET /getAllUsuarios
Rol requerido: admin
Respuesta: lista de usuarios
POST /registroCliente
Público
Body JSON:
nombre_usuario
correo
password
Respuesta: usuario + casillero
POST /login
Público
Body JSON:
correo
password
Respuesta: datos usuario (sin password)
POST /recuperarPassword
Público
Body JSON:
correo
Respuesta: mensaje genérico
POST /resetPassword
Público
Body JSON:
token
password_nueva
Respuesta: ok