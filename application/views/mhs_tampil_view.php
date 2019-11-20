<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>Tampil Mahasiswa</h1>
            <div class="col-md-12">
                <p>First Name: <?php echo $firstname;?> and Last Name: <?=$lastname?></p>
                <ul>
                <?php foreach($arrhobby as $hobby) { ?>
                    <li><?=$hobby?></li>
                <?php } ?>
                </ul> 
            </div>
        </div>
    </div>

</body>

</html>