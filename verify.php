<?php
    // verifies id number input if it is registered
    include("server.php");

    if (isset($_POST['s_submit'])) {
        $id_number = $_POST["id"];

        // check if input id number is registered in database
        $idnum_check_query = "SELECT * FROM info WHERE id_number='$IDnum' LIMIT 1";
        $result = mysqli_query($db, $idnum_check_query);
        $match = mysqli_fetch_assoc($result);
        
        if ($match) { // if id number exists or has an id number match
            if ($match['id_number'] === $IDnum) {
                array_push($errors, "ID number already exists");
            }
        }
        else{

        }
    }
?>
