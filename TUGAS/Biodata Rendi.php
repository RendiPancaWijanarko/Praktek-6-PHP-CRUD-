<!DOCTYPE html>
<html>
<head>
    <title>Biodata</title>
    <style>
        /* Styling untuk tampilan program */
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        form {
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: 500px;
        margin: 0 auto;
        justify-content: center;
        background-color: #f2f2f2;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        position: relative;
        }

        form:before {
        content: "";
        position: absolute;
        top: -5px;
        right: -5px;
        bottom: -5px;
        left: -5px;
        z-index: -1;
        background: linear-gradient(-45deg, #00ffff, #ff00ff, #00ffff, #ff00ff);
        background-size: 400% 400%;
        animation: gradient 7s ease infinite;
        border-radius: 10px;
        }

        @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #666;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php
    // Deklarasi variabel kosong untuk menyimpan data biodata
    $biodata = array();

    // Cek apakah tombol submit ditekan
    if (isset($_POST["submit"])) {
        // Ambil data dari form dan masukkan ke dalam variabel biodata
        $biodata["nama"] = $_POST["nama"];
        $biodata["email"] = $_POST["email"];
        $biodata["alamat"] = $_POST["alamat"];
        $biodata["tanggal_lahir"] = $_POST["tanggal_lahir"];
        $biodata["tempat_lahir"] = $_POST["tempat_lahir"];

        // Simpan biodata ke dalam session
        session_start();
        if (!isset($_SESSION["biodata"])) {
            $_SESSION["biodata"] = array();
        }
        array_push($_SESSION["biodata"], $biodata);
    }
    ?>

    <form method="post">
        <h1>Form Biodata</h1>

        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat" required></textarea>

        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" required>

        <input type="submit" name="submit" value="Simpan Biodata">
    </form>

    <?php
    // Cek apakah ada data biodata yang tersimpan di session
    if (isset($_SESSION["biodata"])) {
        // Tampilkan tabel dengan data biodata
        echo "<table>";
        echo "<tr>";
        echo "<th>Nama</th>";
        echo "<th>Email</th>";
        echo "<th>Alamat</th>";
        echo "<th>Tanggal Lahir</th>";
        echo "<th>Tempat Lahir</th>";
        echo "</tr>";
        foreach ($_SESSION["biodata"] as $biodata) {
            echo "<tr>";
            echo "<td>".$biodata["nama"]."</td>";
            echo "<td>".$biodata["email"]."</td>";
            echo "<td>".$biodata["alamat"]."</td>";
            echo "<td>".$biodata["tanggal_lahir"]."</td>";
            echo "<td>".$biodata["tempat_lahir"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
    </body>
</html>
