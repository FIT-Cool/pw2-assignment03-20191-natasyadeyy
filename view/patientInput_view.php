<?php
$medrecnum= filter_input(INPUT_GET, 'id');
if(isset($medrecnum)){
    $patient=getPatient($medrecnum);
}

//Block below for update
$submitted = filter_input(INPUT_POST,'btnUpdate');
if(isset($submitted)){
    //$medrecnum = filter_input(INPUT_POST, 'txtMedRecNum');
    $citid = filter_input(INPUT_POST, 'txtCitid');
    $name = filter_input(INPUT_POST, 'txtName');
    $address = filter_input(INPUT_POST, 'txtAddress');
    $birthp = filter_input(INPUT_POST, 'txtBirpla');
    $birdate = filter_input(INPUT_POST, 'txtBirdate');
    $phone_number = filter_input(INPUT_POST, 'Phone');
    $insurance = filter_input(INPUT_POST, 'txtId');
    updatePatient( $medrecnum,$citid, $name, $address, $birthp, $birdate,$phone_number, $insurance);
    header("location:index.php?menu=p");
}

?>
<div align="right"><a href="index.php"><button name="back" value="Back">Back</button></a></div>
<form method="post" id="">
    <fieldset>
        <legend>Edit Patient</legend>
        <label for="txtNameIdx" class="form-label"></label>
<!--        <b>Medical Record</b><br>-->
<!--        <input type="text"  name="txtMedRecNum"  value="--><?php //echo $patient['med_record_number'];?><!--"><br><br>-->
         <b>Citizen ID Number</b><br>
        <input type="text"  name="txtCitid"  value="<?php echo $patient['citizen_id_number'];?>"><br><br>
        <b>Name</b><br>
        <input type="text"  name="txtName"  value="<?php echo $patient['name'];?>" ><br><br>
        <b>Address</b><br>
        <input type="text" name="txtAddress"  value="<?php echo $patient['address'];?>" ><br><br>
        <b>Birth Place</b><br>
        <input type="text" name="txtBirpla"  value="<?php echo $patient['birth_place'];?>"><br><br>
        <b>Birth Date</b><br>
        <input type="date" name="txtBirdate"  value="<?php echo $patient['birth_date'];?>" ><br><br>
<!--        <b>Phone</b><br>-->
<!--        <input type="text" name="Phone"  value="--><?php //echo $patient['phone_number'];?><!--" ><br><br>-->
        <b>Insurance</b><br>
        <input type="number"name="txtId"  value="<?php echo $patient['insurance_id'];?>" ><br><br>
        <br>
        <input type="submit" name="btnUpdate" value="Update Patient" class="button-primary">
    </fieldset>
</form>
