<?php
if (isset($_COOKIE['variable_cookie'])){
    echo 'Variabel cookiesnya "variable_cookie" nilainya adalah ' .$_COOKIE['variable_cookie'];
} else {
    echo "Variabel cookiesnya belum diterapkan";
}
?>
