<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $stockCars = [
            [
                "code   " => "002",
                "name" => "Volvo",
                "stock" => 22,
                "sold" => 18
            ],
            [
                "code" => "005",
                "name" => "BMW",
                "stock" => 15,
                "sold" => 13
            ],
            [
                "code" => "007",
                "name" => "Saab",
                "stock" => 5,
                "sold" => 2
            ],
            [
                "code" => "025",
                "name" => "Land Rover",
                "stock" => 17,
                "sold" => 15
            ],
        ];

    ?>

    <table style="width: 100%;" border="1">
        <thead>
            <th>Code</th>
            <th>Name</th>
            <th>Stock</th>
            <th>Sold</th>
        </thead>
        <tbody>
            <?php foreach($stockCars as $stockCar): ?>
                <tr>
                    <td><?= $stockCar["code"] ?></td>
                    <td><?= $stockCar["name"] ?></td>
                    <td><?= $stockCar["stock"] ?></td>
                    <td><?= $stockCar["sold"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>