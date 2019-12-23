<?php

require_once("includes/database.php");

$database = Database::getInstance();
$connection = $database->getConnection();

$result = $connection->query("SELECT * FROM ad");

$xml = new SimpleXMLElement("<root />");
$ads = $xml->addChild("ads");

while ($row = $result->fetch_assoc()) {
    $ad = $ads->addChild("ad");
    $ad->addChild("CreatedOn", $row["created_on"]);
    $ad->addChild("NumOfViews", $row["num_of_views"]);
    $ad->addChild("Name", $row["name"]);
    $ad->addChild("Description", $row["description"]);
    $ad->addChild("Price", $row["price"]);
}

header("Content-type: text/xml");
print $xml->asXML();

?>
