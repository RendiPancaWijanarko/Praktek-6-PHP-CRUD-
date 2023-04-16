<?php
// Periksa apakah parameter email dan password kosong
switch (true) {
  case (empty($_GET['email']) && empty($_GET['password'])):
    $message = 'Email dan Password tidak boleh kosong!';
    break;
  case (empty($_GET['email'])):
    $message = 'Email tidak boleh kosong!';
    break;
  case (empty($_GET['password'])):
    $message = 'Password tidak boleh kosong!';
    break;
  default:
    $message = 'Terjadi kesalahan!';
    break;
}
?>

<!-- Tampilkan pesan kesalahan -->
<div class="center">
  <p><?php echo $message; ?></p>
</div>
