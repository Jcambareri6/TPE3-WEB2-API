# Documentación de la API 
## Integrantes:

| Nombre                | Email                 |
|-----------------------|-----------------------|
| Cambareri Joaquín     | [joaquin.cambareri@eest3necochea.edu.ar](mailto:joaquin.cambareri@eest3necochea.edu.ar) |
| De la Penna Bruno     | [bdelapenna@gmail.com](mailto:bdelapenna@gmail.com) |

# Endpoints

## GET user/token/
-  El endpoint `GET/user/token` se utiliza para validar la autenticidad de un usuario mediante la presentación de un token. tiene una duración limitada, lo que significa que solo es válido durante un período específico de tiempo.
- #### Detalles del Endpoint
- **Método HTTP:** GET
- **Ruta:** `/user/token`
- #### Parámetros de la Solicitud
  Este endpoint requiere que se incluya el token en la URL o en la cabecera de la solicitud.
  #### Respuestas Posibles
-  1. **Éxito (200 OK):** Si el token es válido y aún está dentro de su período de vigencia, el servidor puede responder con un estado 200 OK, indicando que la validación fue exitosa.
   2. **Error de Autenticación (401 Unauthorized):** Si el token no es válido, expiró o no se proporcionó, el servidor puede devolver un estado 401 Unauthorized, indicando que la autenticación ha fallado.
  #### Ejemplo de Uso
     Para validar un usuario, se realizaría una solicitud GET a la ruta `/user/token` con el token correspondiente, y la respuesta indicará el resultado de la validación.
##  `GET /productos/ `
Este endpoint permite acceder a la colección completa de productos.
### Ejemplo de Respuesta:

```json
[
   {
       "ProductoID": 51,
       "Imagen": "",
       "NombreProducto": "Galactic 6.5",
       "Descripcion": "Último modelo de Galactic con cámara cuádruple, pantalla AMOLED de 6.5 pulgadas y batería de larga duración.",
       "Precio": 850,
       "Stock": 150,
       "IDmarca": 9,
       "Condicion": "usado"
   },
   // Otros productos 
]
  ```
## GET /productos/?order&sort
Este endpoint permite ordenar la colección de productos de manera ascendente o descendente según un campo específico.
### Parámetros de la Solicitud:

| Parámetro | Descripción |
|-----------|-------------|
| `order`   | Campo por el cual ordenar los productos (puede ser cualquier campo de la base de datos). |
| `sort`    | Dirección de la ordenación (por defecto, es descendente). Puede ser `asc` para ascendente o `desc` para descendente. |

**Valores por Defecto:**
- Si no se proporciona el parámetro `order` o el campo no existe en la base de datos , se ordenará por defecto por el campo `Precio`.
- Si no se proporciona el parámetro `sort`, la dirección de ordenación será por defecto descendente.

 ## GET /productos/?limit=&offset= : 
 Se permite establecer un limite(limit) de productos que se mostrara depende la pagina(offset) elegida.
 ### Ejemplo de Uso:
```plaintext
 /productos/?limit=5&page=2
```
  ## GET /productos/?filterBy=
  este endpoint permite filtrar la colección de productos según una condición especificada.
  ### Parámetros de la Solicitud:
| Parámetro   | Descripción                                              |
|-------------|----------------------------------------------------------|
| `filterBy`  | Condición por la cual filtrar los productos. Puede ser cualquier campo de la base de datos. |
### Ejemplo de Uso:
```plaintext
 /productos/?filterBy=Precio>1200
```
## GET /productos/:ID 
Se permite acceder a un determinado producto dado por su ID.
#### Respuestas Posibles
-  1. **Éxito (200 OK):** si el producto con el id existe;
   2. **(404 not found):** el producto con el id no existe;
### Ejemplo de Respuesta:
```plaintext
 /productos/51
```
```json

   {
       "ProductoID": 51,
       "Imagen": "",
       "NombreProducto": "Galactic 6.5",
       "Descripcion": "Último modelo de Galactic con cámara cuádruple, pantalla AMOLED de 6.5 pulgadas y batería de larga duración.",
       "Precio": 850,
       "Stock": 150,
       "IDmarca": 9,
       "Condicion": "usado"
   }
  ```
## GET /marcas :
Se permite acceder a la coleccion entera de marcas.
## GET /marcas/?order=&sort 
Se permite ordenar las marcas de manera descendente o ascendente y por un campo en especifico.
## GET /marcas/?limit=&offset= 
Se permite establecer un limite(limit) de marcas que se mostrara depende la pagina(offset) elegida.
## GET /marcas/:ID 
Se permite acceder a una determinada marca dada por su ID.

## POST
## Endpoint: `POST /productos`

Este endpoint permite agregar un nuevo producto. La acción se realiza mediante el cuerpo (BODY) de la solicitud POST. **Es importante destacar que se requiere validación mediante token para realizar esta acción.**

### Parámetros del Cuerpo (BODY):

Se deben proporcionar los detalles del nuevo producto en el cuerpo de la solicitud en formato JSON.

**Ejemplo del cuerpo de la solicitud:**

```json
{
  "NombreProducto": "Nuevo Producto",
  "Descripcion": "Descripción del nuevo producto",
  "Precio": 99.99,
  "Stock": 50,
  "IDmarca": 10,
  "Condicion": "nuevo"
}
```
## Posibles Respuestas:
 #### Éxito (201 Created)  : La solicitud de agregar el nuevo producto fue exitosa. El servidor responderá con un estado 201 Created y, posiblemente, con detalles adicionales sobre el producto recién creado.
 #### Error de Autenticación (401 Unauthorized): Si la validación del token falla, el servidor responderá con un estado 401 Unauthorized, indicando que la acción no está autorizada.

## POST /marcas:
Se permite agregar una nueva marca. Esta accion se realiza mediante el BODY de POSTMAN.

## PUT
## PUT /productos/:ID : 
Se permite actualizar un producto mediante su ID. Esta accion se realiza mediante el BODY de POSTMAN.
### Parámetros del Cuerpo (BODY):

Se deben proporcionar los detalles del nuevo producto en el cuerpo de la solicitud en formato JSON.

**Ejemplo del cuerpo de la solicitud:**

```json
{
  "NombreProducto": "Nuevo Producto",
  "Descripcion": "Descripción del nuevo producto",
  "Precio": 99.99,
  "Stock": 50,
  "IDmarca": 10,
  "Condicion": "nuevo"
}
```

 ## PUT /marcas/:ID :
 Se permite actualizar una marca mediante su ID. Esta accion se realiza mediante el BODY de POSTMAN.

## DELETE
## DELETE /productos/:ID : 
Se permite eliminar un producto mediante su ID.
### Ejemplo de Uso:
```plaintext
 /productos/51
```
