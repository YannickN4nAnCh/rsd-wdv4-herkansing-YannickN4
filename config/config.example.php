<?php

// Haal de configuratie op
require_once 'config.php';

try {
    // Met behulp van PDO zetten we de connectie op, waarna we met setAttribute de manier van errormeldingen weergeven bepalen.
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Als er een PDOException optreedt, laten we een foutmelding zien.
    echo "Verbindingsfout: " . $e->getMessage();
    // Stop de scriptuitvoering als er een fout optreedt.
    die();
}
