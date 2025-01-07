<?php
    const API_URL = "https://whenisthenextmcufilm.com/api";
    #Inicializar una nueva sesión de cURL; ch = cURL handle
    $ch = curl_init(API_URL);
    //Indicar que queremnos recibir el resultado de la petición y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /*Ejecutar la petición 
    y guardar la respuesta 
    en una variable
    */
    $result = curl_exec($ch);
    //una alternativa sería utilizar $result = file_get_contents(API_URL)
    //solo si quieres hacer un GET de una API

    //Decodificar la respuesta JSON
    $data = json_decode($result, true);

    //Cerrar la sesión de cURL
    curl_close($ch);

    //por si queremos ver los datos de la API
    //var_dump($data);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Próxima pelicula de MARVEL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>
<main>
    <hgroup>
        <h1>La próxima película de Marvel:</h1>
    </hgroup>

    <section>
        <img src="<?= $data["poster_url"]; ?>" width="200" alt="Poster de <?= $data["title"]; ?>" style="border-radius: 16px"/>
    </section>
    <hgroup>
        
        <h2><?= $data["title"]; ?> se estrena en: <?= $data["days_until"]; ?> días.</h2>
        <h6>Fecha de estreno: <?= $data["release_date"]; ?></h6><br>
        <p>La siguiente película de Marvel es: <?= $data["following_production"]["title"]; ?></p>
    </hgroup>
</main>

<style>
:root {
    color-scheme: light dark;
    font-family: Arial, Helvetica, sans-serif;

}
img {
    margin: 0;
}
section {
    display: flex;
    justify-content: center;
    text-align: center;

}
hgroup {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}
body {
    display: grid;
    place-content: center;
}
</style>