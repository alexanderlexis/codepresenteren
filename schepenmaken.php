<script>
    function versturen() {
        var naam = document.getElementById("schipnaam").value;
        var lengte = document.getElementById("schiplengte").value;
        document.location = "schepenmaken.php?naam=" + naam + "&lengte=" + lengte;
    }
    
</script>

<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';
$db = 'ZeeslagNickAlex';

//ff testen

$conn = mysqli_connect($servername, $username, $password, $db);

if(isset($_GET['naam']) && isset($_GET['lengte'])) {
	$naam = $_GET['naam'];
	$lengte = $_GET['lengte'];
	insertSchip($conn, $naam, $lengte);
}


echo '<input type = "text" placeholder = "Hoe heet je schip?" id="schipnaam">';
echo '<input type = "text" placeholder = "Hoe lang is je schip?" id="schiplengte">';
echo '<input type = "button" value = "Versturen" onclick = versturen()> <br>';


function insertSchip($conn, $naam, $lengte) {
	$conn->query('INSERT INTO schepen (naam, lengte) VALUES ("'.$naam.'", '.$lengte.');');
}

function toonSchepen($conn) {
        $result = $conn->query('SELECT * FROM schepen');
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Je schip heet " . $row["naam"] . " en is " . $row["lengte"] . " plekken lang. <br>";
            }
        }
}

toonSchepen($conn);


?>
