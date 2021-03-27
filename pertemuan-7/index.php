<?php 
    require_once __DIR__ . '/database/students.php';
    
    header('Content-type: application/json');

    echo json_encode([
        'message' => 'Hello world!'
    ]);
?>