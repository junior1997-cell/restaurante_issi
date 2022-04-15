<?php if (empty($_POST["search"])) {
    echo "[]";
    exit();
}
$dbem = pg_connect("host=localhost user=postgres password=1234567890 dbname=nombres");
if (!$dbem) {
    echo "Error, Problemas al conectar con el servidor del Emisor";
    exit();
}
$input = $_POST['search'];
$select = pg_query("select  * from nombres where nombre LIKE '%$input%'");
while ($row = pg_fetch_array($select)) {
    $response[] = ["value" => $row['idnombre'], "label" => $row['nombre']];
}
echo json_encode($response);
