<html>
    <head>
        <title>
            Ambil Tanggal
        </title>
    </head>
    <body>
        <?php
            date_default_timezone_set('Asia/Jakarta'); //set zona waktu
            echo date("m-F-Y, g:i:s a");
        ?>
    </body>
</html>
