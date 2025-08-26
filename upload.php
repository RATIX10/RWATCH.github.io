<?php
$uploadDir = 'videa/';

// Kontrola, či bol súbor odoslaný
if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['video']['tmp_name'];
    $fileName = basename($_FILES['video']['name']);
    $destPath = $uploadDir . $fileName;

    // Kontrola, či už súbor s rovnakým názvom existuje
    if (file_exists($destPath)) {
        echo 'Súbor s týmto názvom už existuje. Skúste prosím premenovať súbor.';
    } else {
        // Presunutie súboru
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            echo 'Video bolo úspešne nahrané!';
        } else {
            echo 'Chyba pri nahrávaní súboru.';
        }
    }
} else {
    echo 'Žiaden súbor nebol vybraný, alebo došlo k chybe pri nahrávaní.';
}

echo '<br><a href="index.php">Späť na hlavnú stránku</a>';
?>
