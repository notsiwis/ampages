<?php
// Verificar si se ha cargado el archivo sin errores
if ($_FILES['archivoPdf']['error'] === UPLOAD_ERR_OK) {
    $archivo = $_FILES['archivoPdf'];

    // Carpeta de destino donde se almacenarán los archivos
    $directorioDestino = 'uploads/';

    // Asegurarse de que la carpeta de destino exista
    if (!file_exists($directorioDestino)) {
        mkdir($directorioDestino, 0777, true);  // Crear la carpeta si no existe
    }

    // Generar un nombre único para el archivo
    $nombreArchivo = uniqid() . "_" . basename($archivo['name']);

    // Ruta completa para guardar el archivo
    $rutaDestino = $directorioDestino . $nombreArchivo;

    // Mover el archivo cargado a la carpeta de destino
    if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
        echo "¡Archivo cargado con éxito!";
    } else {
        echo "Error al mover el archivo.";
    }
} else {
    echo "Error en la carga del archivo. Código de error: " . $_FILES['archivoPdf']['error'];
}
?>
