<?php
require_once dirname(__FILE__) . '/util/auth.php';
require_once dirname(__FILE__) . '/util/import.php';

$person = new \model\Person(NULL, NULL);

$new = 1;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $personController = new controller\PersonController();
    $person = $personController->getPerson($id);
    $new = 0;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Person (User: <?php echo $_SESSION['username'] ?>)</title>
    </head>
    <body>

        <h1>Edit person</h1>

        <form action="controller/PersonController.php?function=savePerson&new=<?php echo $new ?>" method="post">
            <table>
                <tr>
                    <td>
                        <input name="id" type="text" readonly disabled="true" value="<?php echo $person->getId(); ?>" />
                    </td>
                    <td>
                        <input name="name" type="text" value="<?php echo $person->getName(); ?>" />
                    </td>
                    <td>
                        <button type="submit">Save</button>
                    </td>
                </tr>
            </table>
        </form>

    </body>
</html>
