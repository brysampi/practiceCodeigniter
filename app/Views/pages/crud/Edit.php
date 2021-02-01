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
    <form action="<?php echo base_url('/public/crud_test/edit_validation/'.$edit_data['id'].''); ?>" method="POST">
        <input type="text" value="<?php echo $edit_data['id'] ?>" readonly>
        <input type="text" name="name" value="<?php echo $edit_data['name'] ?>">
        <input type="submit" name="submit">
    </form>
</body>
</html>