<?php
function trackOrder($apiKey, $waybillId, $offset = 1, $limit = 10) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://application.koombiyodelivery.lk/api/Allorders/users");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "apikey=$apiKey&waybillid=$waybillId&offset=$offset&limit=$limit");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    curl_close($ch);

    return json_decode($server_output, true);
}

header('Content-Type: application/json');
$apiKey = 'Your_API_Key'; // Replace with your API key
$waybillId = isset($_GET['waybillId']) ? $_GET['waybillId'] : '';
$trackingInfo = $waybillId ? trackOrder($apiKey, $waybillId) : [];
echo json_encode($trackingInfo);
?>
