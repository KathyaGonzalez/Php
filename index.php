<?php
echo '<h3>Mostrar Datos</h3>';

//Crear conexión
$server = "";
$user = "";
$pass = "";
$db = "final";
$conn = mysqli_connect($server, $user, $pass, $db);

//Verificar conexión
if (!$conn){
    die("Conexion fallida: " . mysqli_connect_error());
}
echo "<p>Conexion exitosa</p>";

// Consulta categoria
$consulta = "SELECT * FROM categoria";
$resultado = $conn->query($consulta);

// Imprimir registros de categorias
echo '<h2>Categoria</h2>';
echo "<table border=1><tr><td>Id</td><td>Nombre</td><td>Descripcion</td></tr>";
while($fila = $resultado->fetch_assoc()) {
    echo "<tr><td>" . $fila['id'] . "</td><td>" . $fila['nombre'] . "</td><td>" . $fila['descripcion'] . "</td></tr>";
}
echo "</table>";

// Consulta productos
$consulta = "SELECT p.id, p.nombre, p.precio, p.stock, c.nombre as nombre_categoria FROM producto as p inner join categoria as c on p.categoria_id = c.id;";
$resultado = $conn->query($consulta);

// Imprimir registros de productos
echo "<h2>Productos</h2>";
echo "<table border=1><tr><td>Id</td><td>Nombre</td><td>Precio</td><td>Stock</td><td>Categoria</td></tr>";
while($fila = $resultado->fetch_assoc()) {
    echo "<tr><td>" . $fila['id'] . "</td><td>" . $fila['nombre'] . "</td><td>" . $fila['precio'] . "</td><td>" . $fila['stock'] . "</td><td>" . $fila['nombre_categoria'] . "</td></tr>";
}
echo "</table>";
?>
