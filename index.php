<?php
include_once 'db_function/insurance_func.php';
include_once 'db_function/patient_func.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Rumah Sakit</title>

    <script src="alert.js"></script>
    <script src="patient.js"></script>
</head>

<body>
    <div class="page">
        <header align="center">
            <h2>Rumah Sakit</h2>
        </header>
        <nav>
            <ul>
                <li><a href="?menu=p">Patient</a></li>
                <li><a href="?menu=i">Insurance</a></li>
            </ul>
        </nav>
        <main>
            <?php
            $targetMenu = filter_input(INPUT_GET, 'menu');
            switch ($targetMenu) {
                case 'p':
                    include_once 'view/patient_view.php';
                    break;
                case 'i':
                    include_once 'view/insurace_view.php';
                    break;
                case 'iu':
                    include_once 'view/insuranceInput_view.php';
                    break;
                case 'pu':
                    include_once 'view/patientInput_view.php';
                    break;
                default;
            }
            ?>
        </main>
        <footer>Pemrograman Web 2 &copy;2019</footer>
    </div>
</body>


</html>