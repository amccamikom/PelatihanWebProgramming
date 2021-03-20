<?php
    include_once __DIR__ . '/helper.php';
    include_once __DIR__ . '/database/students.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $keyMissing = validate_array_keys($_POST, [
            'nim', 'nama', 'no_hp', 'alamat'
        ]);

        if (count($keyMissing) > 0) {
            die(implode(', ', $keyMissing) . ' belum ada!');
        }

        if (! createStudent($_POST)) {
            die('Oops, sepertinya ada error!');
        }

        header('Location: /');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Data Mahasiswa Baru</h3>
    <form method="post" action="">
        <table>
            <tr>
                <td>NIM</td>
                <td>:
                    <input type="text" name="nim" placeholder="XX.XX.XXXX" required>
                </td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:
                    <input type="text" name="nama" placeholder="Nama Mahasiswa" required>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:
                    <input type="text" name="alamat" placeholder="Alamat" required>
                </td>
            </tr>
                <td>Nomor HP</td>
                <td>:
                    <input type="text" name="no_hp" placeholder="No Handphone" required>
                </td>
            </tr>
            <tr>
                <td colspan=2>
                    <button type="submit">Simpan</button>
                    <button type="reset">Reset</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>