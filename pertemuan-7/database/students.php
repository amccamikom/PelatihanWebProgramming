<?php

require_once __DIR__ . '/connection.php';

/**
 * Ambil semua data students.
 *
 * @return  array
 */
function getStudents() {
    global $connection;

    $sql = 'select * from mahasiswa';

    $statement = mysqli_prepare($connection, $sql);

    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);

    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

/**
 * Ambil data student berdasarkan nim.
 *
 * @param  string  $nim
 * @return  array
 */
function findStudent(string $nim) {
    global $connection;

    $sql = 'select * from mahasiswa where nim = ? limit 1';

    $statement = mysqli_prepare($connection, $sql);

    mysqli_stmt_bind_param($statement, 's', $nim);

    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);

    return mysqli_fetch_assoc($result);
}

/**
 * Tambah data student baru.
 * 
 * @param  array  $data  Data Input $_POST
 * @return  int  Affected rows
 */
function createStudent(array $data) {
    global $connection;

    $sql = 'insert into mahasiswa (nim, nama, alamat, no_hp)
            values (?, ?, ?, ?)';

    $statement = mysqli_prepare($connection, $sql);

    mysqli_stmt_bind_param(
        $statement, 'ssss', $data['nim'], $data['nama'], $data['alamat'], $data['no_hp']
    );

    mysqli_stmt_execute($statement);

    return mysqli_affected_rows($connection);
}

/**
 * Update data student berdasarkan nim.
 * 
 * @param  array  $data  Data Input $_POST
 * @return  int  Affected rows
 */
function updateStudent(array $data) {
    global $connection;

    $sql = 'update mahasiswa
            set nama = ?,
                alamat = ?,
                no_hp = ?
            where nim = ?';

    $statement = mysqli_prepare($connection, $sql);

    mysqli_stmt_bind_param(
        $statement, 'ssss', $data['nama'], $data['alamat'], $data['no_hp'], $data['nim']
    );

    mysqli_stmt_execute($statement);

    return mysqli_affected_rows($connection);
}

/**
 * Hapus data student berdasarkan nim.
 * 
 * @param  string  $nim
 * @return  int  Affected rows
 */
function deleteStudent(string $nim) {
    global $connection;

    $sql = 'delete from mahasiswa where nim = ?';

    $statement = mysqli_prepare($connection, $sql);

    mysqli_stmt_bind_param($statement, 's', $nim);

    mysqli_stmt_execute($statement);

    return mysqli_affected_rows($connection);
}
