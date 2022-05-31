<?php
    // verifies id number input if it is registered
    include('server.php');
    if (isset($_POST['s_submit'])) {
        $IDnum = $_POST["id"];
        // check if input id number is registered in database
        $idnum_check_query = "SELECT * FROM info WHERE id_number='$IDnum' LIMIT 1";
        $result = mysqli_query($db, $idnum_check_query);
        $match = mysqli_fetch_assoc($result);

        if ($match) { // if id number exists or has an id number match
            if ($match['id_number'] === $IDnum) {
                echo "VALID ID";
                $name = $match['name'];
                $address = $match['address'];
                $contact = $match['number'];
                $email = $match['email'];
                $prev_timein = $match['time_in'];
                echo "<p>
                <b>Name: </b>$name<br>
                <b>Address: </b>$address<br>
                <b>Contact: </b>$contact<br>
                <b>Email: </b>$email<br>
                <b>Previous Time In: </b>$prev_timein<br>
                </p>";
            }
        }
        else{
            echo "<p>ID Number not registered!</p>";
        }
    }
    if (isset($_POST['s_submit'])) {
        $IDnum = $_POST["id"];
        // check if input id number is registered in database
        $idnum_check_query = "SELECT * FROM info WHERE id_number='$IDnum' LIMIT 1";
        $result = mysqli_query($db, $idnum_check_query);
        $match = mysqli_fetch_assoc($result);
        
        if ($match) { // if id number exists or has an id number match
            if ($match['id_number'] === $IDnum) {
                echo "VALID ID";
                $name = $match['name'];
                $address = $match['address'];
                $contact = $match['number'];
                $email = $match['email'];
                $prev_timein = $match['time_in'];
                echo "<p>
                <b>Name: </b>$name<br>
                <b>Address: </b>$address<br>
                <b>Contact: </b>$contact<br>
                <b>Email: </b>$email<br>
                <b>Previous Time In: </b>$prev_timein<br>
                </p>";
            }
        }
        else{
            echo "<p>ID Number not registered!</p>";
        }
    }
?>
