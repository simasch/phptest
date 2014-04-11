<?php
require_once dirname(__FILE__) . '/util/auth.php';
require_once dirname(__FILE__) . '/util/import.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>People (User: <?php echo $_SESSION['username'] ?>)</title>
    </head>
    <body>

        <table>
            <?php
            $personController = new controller\PersonController();
            foreach ($personController->listPeople() as $key => $person) {
                ?>
                <tr>
                    <td><?php echo $person->getId(); ?></td>
                    <td><?php echo $person->getName(); ?></td>
                    <td><a href="controller/PersonController.php?function=editPerson&id=<?php echo $person->getId(); ?>">Edit</a></td>
                </tr>
                <?php
            }
            ?>
        </table>

        <form action="controller/PersonController.php?function=addPerson" method="post">
            <button type="submit">Add</button>
        </form>

        <p>
            <a href="logout.php">Logout</a>
        </p>

    </body>
</html>
