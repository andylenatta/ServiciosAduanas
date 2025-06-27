<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patente = trim($_POST['patente']);
    $marca = trim($_POST['marca']);
    $modelo = trim($_POST['modelo']);
    $anio = trim($_POST['anio']);
    $nombre_conductor = trim($_POST['nombre_conductor']);
    $rut_pasaporte = trim($_POST['rut_pasaporte']);
    $acompanantes = trim($_POST['acompanantes']);
    $fecha_salida = $_POST['fecha_salida'];
    $fecha_regreso = $_POST['fecha_regreso'];
    $motivo_viaje = $_POST['motivo_viaje'];

    try {
        $sql = "INSERT INTO vehiculos 
                (patente, marca, modelo, anio, nombre_conductor, rut_pasaporte, acompanantes, fecha_salida, fecha_regreso, motivo_viaje)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $patente,
            $marca,
            $modelo,
            $anio,
            $nombre_conductor,
            $rut_pasaporte,
            $acompanantes,
            $fecha_salida,
            $fecha_regreso,
            $motivo_viaje
        ]);

        $mensaje = "Vehículo registrado con éxito.";
        header("Location: registro.php?exito=" . urlencode($mensaje));
        exit;
    } catch (PDOException $e) {
        $mensaje = "Error al registrar vehículo: " . $e->getMessage();
        header("Location: registro.php?error=" . urlencode($mensaje));
        exit;
    }
} else {
    header("Location: registro.php");
    exit;
}

