<?php


function getAllPatient() {
    $link = new PDO('mysql:host=localhost;dbname=prakpw220191', 'root', '');
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'SELECT * FROM patient p JOIN insurance i ON i.id = p.insurance_id;';
    $result = $link->query($query);
    $link = null;
    return $result;
}

function addPatient($medrecnum, $citid, $name, $address, $birthp, $birdate, $insuranceid) {
    $link = new PDO('mysql:host=localhost;dbname=prakpw220191', 'root', '');
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = 'INSERT INTO patient(med_record_number, citizen_id_number, name, address, birth_place, birth_date, insurance_id) VALUES(?, ?, ?, ?, ?, ?, ?)';
    $statement = $link->prepare($query);
    $statement->bindParam(1, $medrecnum, PDO::PARAM_STR);
    $statement->bindParam(2, $citid, PDO::PARAM_STR);
    $statement->bindParam(3, $name, PDO::PARAM_STR);
    $statement->bindParam(4, $address, PDO::PARAM_STR);
    $statement->bindParam(5, $birthp, PDO::PARAM_STR);
    $statement->bindParam(6, $birdate, PDO::PARAM_STR);
    $statement->bindParam(7, $insuranceid, PDO::PARAM_STR);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}

function getPatient($rekmed)
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM patient WHERE med_record_number = ?";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $rekmed, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetch();
    $link = null;
    return $result;
}

function deletePatient($rekmed)
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "DELETE FROM patient WHERE med_record_number = ?";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $rekmed, PDO::PARAM_STR);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}

function updatePatient($citid, $name, $address, $birthp, $birdate, $insurance,$medrecnum)
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "UPDATE patient SET citizen_id_number = ?, name = ?, address = ?, birth_place = ?, birth_date = ?, insurance_id = ? WHERE med_record_number = ?";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $citid, PDO::PARAM_STR);
    $statement->bindParam(2, $name, PDO::PARAM_STR);
    $statement->bindParam(3, $address, PDO::PARAM_STR);
    $statement->bindParam(4, $birthp, PDO::PARAM_STR);
    $statement->bindParam(5, $birdate, PDO::PARAM_STR);
   // $statement->bindParam(6, $phone_number, PDO::PARAM_STR);
    $statement->bindParam(6, $insurance, PDO::PARAM_INT);
    $statement->bindParam(7, $medrecnum, PDO::PARAM_STR);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}
?>