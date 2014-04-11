<?php
require_once dirname(__FILE__) . '/util/auth.php';
require_once dirname(__FILE__) . '/util/import.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Person (User: <?php echo $_SESSION['username'] ?>)</title>
    </head>
    <body>
        <?php
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
                        <input name="id" type="text" readonly value="<?php echo $person->getId(); ?>" />
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
