<?php

$server = 'localhost';
$port = 3306;
$database = 'test';
$username = 'root';
$password = '';

$connection = mysqli_connect($server, $username, $password, $database, $port);

if (! $connection) {
    throw new RuntimeException('Koneksi database gagal: ' . mysqli_connect_error());
}