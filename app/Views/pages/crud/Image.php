<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $session = \Config\Services::session();

        if($session->getFlashdata('failed'))
        {
            echo '
            <div class="alert alert-failed">'.$session->getFlashdata("failed").'</div>
            ';
        }
    ?>
    <form method="POST" entctype="multipart/form-data" action="<?php echo base_url('/public/crud_test/image'); ?>">
        <input type="file" name="image">
        <input type="submit" name="submit">
    </form>
</body>
</html>