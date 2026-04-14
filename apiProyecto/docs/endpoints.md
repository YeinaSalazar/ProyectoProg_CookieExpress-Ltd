# Endpoints API - Usuarios y Seguridad

## Reglas generales
- Todas las requests y responses usan JSON.
- Content-Type: application/json.
- Respuesta estándar: { ok, data } o { ok, error }.

## Roles
- 1 = administrador
- 2 = logística
- 3 = cliente

## Formato de respuesta
Éxito:
```json
{
  "ok": true,
  "data": { }
}

Error:
```json 
{
  "ok": false,
  "error": {
    "codigo": "VALIDACION",
    "mensaje": "..."
  }
}

## Modelo: Usuario
Campos devueltos por el API:
- id_usuario (int)
- nombre_usuario (string)
- correo (string)
- rol_id (int)
- casillero (string | null)

Nota: `password` nunca se devuelve en responses.


## Endpoints

POST /crearUsuario
Rol requerido: admin
Body JSON:
nombre_usuario
correo
password
rol_id
Respuesta: usuario creado

Nota: Si el rol es cliente (3), se genera casillero automático, si es otro rol casillero es null.

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
Respuesta: usuario + casillero

GET /getAllUsuarios
Rol requerido: admin
Respuesta: lista de usuarios + su respectivo casillero

POST /registroCliente
Público
Body JSON:
nombre_usuario
correo
password
Respuesta: usuario + casillero
{ ok: true, data: { mensaje, usuario, casillero } }

Nota: El backend genera el casillero automáticamente y en la respuesta se devuelve casillero.


POST /login
Público
Body JSON: correo, password
Respuesta: datos usuario (sin password) + Casillero.

POST /recuperarPassword
Público
Body JSON:
correo
Respuesta: mensaje genérico

POST /registroCliente
- Público
- Body JSON:
  - nombre_usuario
  - correo
  - password
- Respuesta:
  - ok=true
  - mensaje

POST /recuperarPassword
- Público
- Body JSON:
  - correo
- Respuesta:
  - mensaje genérico (no indica si el correo existe)


### NO IMPLEMENTADO

POST /resetPassword
Público
Body JSON:
token
password_nueva
Respuesta: ok
