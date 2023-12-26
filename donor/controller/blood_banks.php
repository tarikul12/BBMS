<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Banks</title>
</head>
<body>

<?php

$bloodBanksJson = file_get_contents(__DIR__ . '/../Data/bloodBanks.json');
$bloodBanks = json_decode($bloodBanksJson, true);


echo '<h1>Blood Banks</h1>';
echo '<ul>';
foreach ($bloodBanks['blood_banks'] as $bank) {
    echo '<li>' . $bank . '</li>';
}
echo '</ul>';
?>

</body>
</html>
