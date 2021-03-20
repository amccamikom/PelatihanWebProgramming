<?php 
    include_once __DIR__ . '/database/students.php';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (! array_key_exists('nim', $_POST)) {
            die('nim tidak ada!');
        }

        deleteStudent($_POST['nim']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            text-align: center;
        }
        .center {
            margin-left: auto;
            margin-right: auto;
        }

        .inline {
            display: inline-block;
        }
    </style>
</head>
<body>
    <h3>Data Mahasiswa</h3>
    <p>[<a href="create.php"> Tambah user </a>]</p>
    <table class="center" width="720" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th width="30">No.</th>
            <th width="30">NIM</th>
            <th width="50">Nama Lengkap</th>
            <th width="100">Alamat</th>
            <th width="30">Nomor HP</th>
            <th width="75">Kelola</th>
        </tr>
        <?php foreach (getStudents() as $i => $student): ?>
            <tr class="center">
                <td><?= $i + 1 ?></td>
                <td><?= $student['nim'] ?></td>
                <td><?= $student['nama'] ?></td>
                <td><?= $student['alamat'] ?></td>
                <td><?= $student['no_hp'] ?></td>
                <td>
                    <a href="edit.php?nim=<?= $student['nim'] ?>">
                        <button type="button">Edit</button>
                    </a>
                    <form method="post" action="" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        <input type="hidden" name="nim" value="<?= $student['nim'] ?>">
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>