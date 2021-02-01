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

        if($session->getFlashdata('success'))
        {
            echo '
            <div class="alert alert-success">'.$session->getFlashdata("success").'</div>
            ';
        }
    ?>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th colspan='2'>Action</th>
        </tr>
    <?php
    if($validation){
        if($validation->getError('name'))
        {
            echo '<div class="alert alert-danger mt-2">'.$validation->getError('name').'</div>';
        }
    }

    if($user_data){
        foreach($user_data as $user){
        echo"
        <tr>
            <td>".$user['id']."</td>
            <td>".$user['name']."</td>
            <td><a href='".base_url('/public/crud_test/edit/'.$user['id'].'')."'>Edit</a></td>
            <td><a href='".base_url('/public/crud_test/delete/'.$user['id'].'')."'>Delete</a></td>
        </tr>
        ";
        }
    }
    ?>
    </table>
    <form action="<?php echo base_url('/public/crud_test/add_validation'); ?>" method="POST">
        <input type="text" name="name">
        <input type="submit" name="submit">
    </form>
</body>
</html>