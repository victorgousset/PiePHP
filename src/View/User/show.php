<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0,maximum- scale=1.0,minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Show</title>
</head>
<body>

<h1>SHOW LIST OF USERS</h1>

<?php

//var_dump($scope[0][1]['email']);

$nbr_user = count($scope[0]);

for($i = 0; $i < $nbr_user; $i++)
{
    echo $scope[0][$i]['email'];
    $id = $i + 1;
    echo " <a href='/PiePHP/user/details/$id'>Details</a><br>";
}

?>
</body>
</html>