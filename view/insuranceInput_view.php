<?php

//Block below for fetch data

$id= filter_input(INPUT_GET, 'id');
if(isset($id)){
    $insurance=getInsurance($id);
}

//Block below for update
$submitted = filter_input(INPUT_POST,'btnUpdate');
if(isset($submitted)){
    $name = filter_input(INPUT_POST,'name');
    updateInsurance($id, $name);
    header("location:index.php?menu=i");
}
?>

<form  method="post">
    <fieldset>
        <legend>Update Insurance</legend>
        <input type="text" name="name" value="<?php echo $insurance['name_class'];?>">
        <input type="submit"name="btnUpdate" value="updateInsurance" >
    </fieldset>
</form>

