function deleteInsurance(id) {
    var conf = window.confirm("anda yakin?");
    if (conf) {
        window.location = "index.php?menu=i&delcom=1&id=" + id;
    }
}

function updateInsurance(id) {
    window.location = "index.php?menu=iu&id=" + id;
}

function deletePatient(id) {
    var conf = window.confirm("Are you sure ?");
    if (conf) {
        window.location = "index.php?menu=p&delcom=1&id=" + id;
    }
}
function updatePatient(id) {
    window.location = "index.php?menu=pu&id=" + id;
}

