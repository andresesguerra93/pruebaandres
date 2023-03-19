<?php
// Conexión a la base de datos
$host = "localhost";
$user = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener los datos enviados por el formulario
$nombre = $_POST["nombre"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$sexo = $_POST["sexo"];
$estatura = $_POST["estatura"];
$peso = $_POST["peso"];


// Calcular la serie de Fibonacci más cercana por debajo de la estatura
function fibonacci($n) {
	if ($n == 0) {
		return 0;
	} else if ($n == 1) {
		return 1;
	} else {
		return fibonacci($n - 1) + fibonacci($n - 2);
	}
}

$serie_fibonacci = 1;
while (fibonacci($serie_fibonacci) <= $estatura) {
	$serie_fibonacci++;
}
$serie_fibonacci--;

// Calcular la recomendación de salud
$edad = date_diff(date_create($fecha_nacimiento), date_create('today'))->y;

if ($edad < 18) {
	$recomendacion = "Hola $nombre, eres " . ($sexo == 'M' ? 'un' : 'una') . " joven muy saludable, te recomiendo salir a jugar al aire libre durante $serie_fibonacci horas diarias";
} else {
	$anio_nacimiento = substr($fecha_nacimiento, 0, 4);
	$x = round(sqrt(substr($anio_nacimiento, -2)), 2);
	$recomendacion = "Hola $nombre, eres " . ($sexo == 'M' ? 'un' : 'una') . " persona muy saludable, te recomiendo comer " . ($peso < 30 ? 'menos' : 'más') . " y salir a correr $x km diarios";
}

// Insertar los datos en la tabla pacientes
$sql = "INSERT INTO pacientes (nombre, fecha_nacimiento, sexo, estatura, peso, recomendacion) VALUES ('$nombre', '$fecha_nacimiento', '$sexo', $estatura, $peso, '$recomendacion')";

if ($conn->query($sql) === TRUE) {
	echo "Registro exitoso";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


