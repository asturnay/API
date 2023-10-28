<?php

app()->get('/', function () {
    response()->json(['message' => 'Congrats!! You\'re on Leaf API']);
});
// Consultar todos los datos (Metodo Get)
app()->get('/contactos', 'ContactosController@index');
// Consultar un dato por su id (Metodo Get)
app()->get('/contactos/{id}', 'ContactosController@Consultar');
// Agrega un dato a la BD (Metodo Post)
app()->post('/contactos', 'ContactosController@Agregar');
// Elimina un dato de la base de datos (Metodo Delete)
app()->delete('/contactos/{id}', 'ContactosController@Eliminar');
// Actualiza un dato de la base de datos (Metodo Put)
app()->put('/contactos/{id}', 'ContactosController@Actualizar');
