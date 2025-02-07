<!DOCTYPE html>
<html>
<head>
    <title>Connexió MySQL</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "joan";
    $password = "queMm88/g62123";
    $dbname = "postslar11";

    // Crear connexió
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Comprovar connexió
    if ($conn->connect_error) {
        die("Connexió fallida: " . $conn->connect_error);
    }

    $sql = "SELECT id, name FROM users";
    $resultat = $conn->query($sql);

    if ($resultat->num_rows > 0) {
        while($fila = $resultat->fetch_assoc()) {
            echo "id: " . $fila["id"]. " - Nom: " . $fila["name"]. "<br>";
        }
    } else {
        echo "0 resultats";
    }
    
	

$conn->close();
?> 		
   
</body>
</html>