<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>DB</title>
    </head>
    <body>
        <?php
        require_once 'jtaf/JtafDao.php';
        
        $jtafDao = new jtaf\JtafDao();
        $jtafDao->listSecurityUsers();
        ?>
    </body>
</html>
