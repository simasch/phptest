<?php include 'auth.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Person</title>
    </head>
    <body>
        <?php
        require_once 'controller/PersonController.php';
        require_once 'model/Person.php';

        $person = new \model\Person(NULL, NULL);

        $new = 1;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $personController = new controller\PersonController();
            $person = $personController->getPerson($id);
            $new = 0;
        }
        ?>

        <form action="controller/PersonController.php?function=savePerson&new=<?php echo $new ?>" method="post">
            <table>
                <tr>
                    <td>
                        <input name="id" type="text" value="<?php echo $person->getId(); ?>" />
                    </td>
                    <td>
                        <input name="name" type="text" value="<?php echo $person->getName(); ?>" />
                    </td>
                </tr>
            </table>

            <button type="submit">Save</button>
        </form>

    </body>
</html>
