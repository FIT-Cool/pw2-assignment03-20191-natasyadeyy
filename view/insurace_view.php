<?php
$submit = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submit)) {
    $id = filter_input(INPUT_POST, 'txtId');
    $name = filter_input(INPUT_POST, 'txtName');
    addInsurance($id, $name);
}
$deleteCommand = filter_input(INPUT_GET, 'delcom');
if (isset($deleteCommand) && $deleteCommand == 1) {
    $id = filter_input(INPUT_GET, 'id');
    deleteInsurance($id);
}
?>
<div align="right"><a href="index.php"><button name="back" value="Back">Back</button></a></div>
<form method="post" id="usrform">
    <fieldset>
        <legend>New Insurance</legend>
        <label for="txtNameIdx" class="form-label"></label>

        <b>ID</b><br>
        <input type="text" id="txtNameIdx" name="txtId" placeholder="ID" autofocus required class="form-input" size="80"><br><br>
        <b>Class Name</b><br>
        <input type="text" id="txtNameIdx" name="txtName" placeholder="Class Name" autofocus required class="form-input" size="80"><br><br>
        <br>

        <input type="submit" name="btnSubmit" value="addInsurance" class="button-primary">
    </fieldset>
</form>

<table class="display" border="1px">
    <thead>
        <tr>
            <th>ID</th>
            <th>Class Name</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $asuransi = getAllInsurance();
        foreach ($asuransi as $asuransii) {
            echo '<tr>';
            echo '<td>' . $asuransii['id'] . '</td>';
            echo '<td>' . $asuransii['name_class'] . '</td>';
            echo '<td><button onclick="deleteInsurance(' . $asuransii['id'] . ')">Delete</button><button onclick="updateInsurance(' . $asuransii['id'] . ')">Update</button> </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>