<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Simpan data yang diinput ke variabel
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Cek apakah email dan password kosong
    if (empty($email)) {
        $_SESSION['error'] = "Email kosong";
        header("Location: halaman_error.php");
        exit;
    } elseif (empty($password)) {
        $_SESSION['error'] = "Password kosong";
        header("Location: halaman_error.php");
        exit;
    }

    // Cek apakah email dan password yang dimasukkan benar
    if ($email === 'rendi.wijanarko03@gmail.com' && $password === '12345') {
        // Set zona waktu ke Asia/Jakarta
        date_default_timezone_set('Asia/Jakarta');

        // Ambil informasi waktu saat ini
        $jam = date('H:i:s');
        $hari = date('l');
        $tanggal = date('d F Y');

        // Simpan data ke dalam session
        $_SESSION['email'] = $email;
        $_SESSION['time'] = "$jam pada hari $hari, tanggal $tanggal";
?>

    <!-- Tampilan informasi login -->
    <style>
      .center {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }
      .card {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
      }

      .card::after {
        content: "";
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        z-index: -1;
        background: linear-gradient(-45deg, #00ffcc, #ff00ff, #00ffcc, #ff00ff);
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

      .card h2,
      .card p {
        position: relative;
        z-index: 1;
      }

      .card h2 {
        color: #333;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
        text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
      }

      .card p {
        font-size: 16px;
        margin-bottom: 10px;
        text-align: center;
        text-shadow: 0 0 5px rgba(255, 255, 255, 0.5);
        color: white;
      }

      .email {
        color: #777;
      }

      .time {
        color: #fff;
        font-size: 18px;
        margin-top: 20px;
        text-align: center;
        text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
      }
    </style>

    <div class="center">
      <div class="card">
        <h2>Selamat datang, Rendi Wijanarko!</h2>
        <p>Email anda: rendi.wijanarko03@gmail.com</p>
        <hr>
        <p>Waktu login: <span class="time"><?php echo "$jam pada hari $hari, tanggal $tanggal"; ?></span></p>
      </div>
    </div>

    <?php
      // Tambahkan CSS untuk menyembunyikan form dan scroll bar
      echo "<style>body {overflow: hidden;}</style>";
    ?>
    
<?php
  } else {
    // Tampilkan pesan kesalahan jika akun yang dimasukkan tidak terdaftar
    echo "<div class='center'>";
    echo "<p>Maaf, akun tidak terdaftar!</p>";
    echo "</div>";
  }
}
?>

<!-- Form login -->
<style>
  .center {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 90vh;
  }
  form {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color: #f2f2f2;
  padding: 20px;
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

label {
  margin-bottom: 10px;
}

input[type='text'],
input[type='password'] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: none;
  border-radius: 5px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

button {
  padding: 10px;
  background-color: #00BEFC;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #005f79;
}
</style>

<div class="center">
  <form method="POST">
    <label for="email">Email:</label>
    <input type="text" name="email" id="email">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <button type="submit">Login</button>
  </form>
</div>