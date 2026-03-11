<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        table{
            width: 100%;
        }
        td{
            text-align: center
        }
    </style>
</head>
<body>
    <?php
        $students = [
            [
                "ID" => 1,
                "NAME" => "Jonh Deo",
                "CLASS" => "Four",
                "MARK" => 75,
                "GENDER" => 1,
            ],
             [
                "ID" => 2,
                "NAME" => "Max Ruln",
                "CLASS" => "Three",
                "MARK" => 85,
                "GENDER" => 2,
            ],
             [
                "ID" => 3,
                "NAME" => "Amold",
                "CLASS" => "Three",
                "MARK" => 55,
                "GENDER" => 2,
            ],
            [
                "ID" => 3,
                "NAME" => "Krish Star",
                "CLASS" => "Four",
                "MARK" => 69,
                "GENDER" => 1,
            ],
             [
                "ID" => 4,
                "NAME" => "Jonh Mike",
                "CLASS" => "Four",
                "MARK" => 60,
                "GENDER" => 1,
            ],
             [
                "ID" => 5,
                "NAME" => "Alex Jonh",
                "CLASS" => "Four",
                "MARK" => 55,
                "GENDER" => 2,
            ],
             [
                "ID" => 6,
                "NAME" => "My Jonh Rob",
                "CLASS" => "Five",
                "MARK" => 78,
                "GENDER" => 2,
            ],
             [
                "ID" => 7,
                "NAME" => "Asruid",
                "CLASS" => "Five",
                "MARK" => 85,
                "GENDER" => 2,
            ],
             [
                "ID" => 8,
                "NAME" => "Tes Qry",
                "CLASS" => "Six",
                "MARK" => 78,
                "GENDER" => 2,
            ],
             [
                "ID" => 9,
                "NAME" => "Big Jonh",
                "CLASS" => "Five",
                "MARK" => 55,
                "GENDER" => 1,
            ],
             [
                "ID" => 10,
                "NAME" => "Asruid",
                "CLASS" => "Five",
                "MARK" => 85,
                "GENDER" => 2,
            ]
        ]
    ?>
    <table>
        <th>ID</th>
        <th>NAME</th>
        <th>CLASS</th>
        <th>MARK</th>
        <th>GENDER</th>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['ID'] ?></td>
                    <td><?= $student['NAME']?></td>
                    <td><?= $student['CLASS'] ?></td>
                    <td><?= $student['MARK'] ?></td>
                    <td><?= $student['GENDER'] == 1  ? "Female" : "Male"  ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
</body>
</html>