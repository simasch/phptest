<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hello</title>
    </head>
    <body>
        <?php
        require_once 'Hello.php';
        
        // put your code here
        $hello = new Hello();
        $hello->sayHello("Simon");
        ?>
    </body>
</html>
