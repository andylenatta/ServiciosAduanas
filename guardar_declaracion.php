<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_viajero = trim($_POST['nombre_viajero']);
    $rut_pasaporte = trim($_POST['rut_pasaporte']);
    $alimentos = isset($_POST['alimentos']) ? 1 : 0;
    $plantas = isset($_POST['plantas']) ? 1 : 0;
    $mascotas = isset($_POST['mascotas']) ? 1 : 0;
    $detalles_producto = trim($_POST['detalles_producto']);

    $certificado_nombre = null;
    if (isset($_FILES['certificado']) && $_FILES['certificado']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

        $tmp_name = $_FILES['certificado']['tmp_name'];
        $nombre_archivo = basename($_FILES['certificado']['name']);
        $ruta_destino = $upload_dir . time() . "_" . $nombre_archivo;

        if (move_uploaded_file($tmp_name, $ruta_destino)) {
            $certificado_nombre = $ruta_destino;
        }
    }

    try {
        $sql = "INSERT INTO declaraciones 
                (nombre_viajero, rut_pasaporte, alimentos, plantas, mascotas, detalles_producto, certificado)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $nombre_viajero,
            $rut_pasaporte,
            $alimentos,
            $plantas,
            $mascotas,
            $detalles_producto,
            $certificado_nombre
        ]);
        $mensaje = "Declaración jurada enviada con éxito.";
        header("Location: declaracion.php?exito=" . urlencode($mensaje));
        exit;
    } catch (PDOException $e) {
        $mensaje = "Error al guardar declaración: " . $e->getMessage();
        header("Location: declaracion.php?error=" . urlencode($mensaje));
        exit;
    }
} else {
    header("Location: declaracion.php");
    exit;
}


