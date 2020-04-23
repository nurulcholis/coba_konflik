<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 750px;
            border-collapse: collapse;
            margin: 50px auto;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #3498db;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <?php

    $header = [
        'x', 'y'
    ];

    $array = [
        [
            'x' => 40,
            'y' => 50
        ],
        [
            'x' => 60,
            'y' => 40
        ],
        [
            'x' => 45,
            'y' => 58
        ],
        [
            'x' => 30,
            'y' => 80
        ],
    ];

    $sum = [];

    $table = '<table>';
    $table .= '<tr>';
    $table .= '<th>NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>';
    foreach ($header as $k => $head) {
        $data_header[] = $head;
        $sum[$k] = $head;
        $table .= '<th>' . $head . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>';
    }
    $table .= '<th>GAP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>';
    $table .= '<th>%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>';
    $table .= '</tr>';

    $gap_total = 0;
    $persen_total = 0;
    foreach ($array as $k => $v) {
        $table .= '<tr>';
        $table .= '<td>' . ($k + 1) . '</td>';
        foreach ($header as $k2 => $hd) {
            $table .= '<td>' . $v[$hd] . '</td>';
            $temp[$k][] = $v[$hd];
            $sum[$k2] = (int) $sum[$k2] + $v[$hd];
        }
        $gap_total += ($temp[$k][1] - $temp[$k][0]);
        $temp2[$k] = $temp[$k][1];
        $table .= '<td>' . ($temp[$k][1] - $temp[$k][0]) . '</td>';
        $table .= '<td>' . round((($temp[$k][1] - $temp[$k][0]) / $temp[$k][0]) * 100, 2) . '</td>';
        $table .= '<tr>';
    }

    $table .= '<tr>';
    $table .= '<td>TOTAL</td>';

    foreach ($sum as $k => $v) {
        $table .= '<td>' . $v . '</td>';
        if ($k == 0) {
            $persen_total = $v;
        }
    }

    $table .= '<td>' . $gap_total . '</td>';
    $table .= '<td>' . round($gap_total / $persen_total * 100, 2) . '</td>';


    $table .= '</tr></table>';

    echo $table;


    $array_saw = [
        [
            'c1' => 150,
            'c2' => 15,
            'c3' => 2,
            'c4' => 2,
            'c5' => 3
        ],
        [
            'c1' => 500,
            'c2' => 200,
            'c3' => 2,
            'c4' => 3,
            'c5' => 2
        ],
        [
            'c1' => 200,
            'c2' => 10,
            'c3' => 3,
            'c4' => 1,
            'c5' => 3
        ],
        [
            'c1' => 350,
            'c2' => 100,
            'c3' => 3,
            'c4' => 1,
            'c5' => 2
        ],
    ];

    $label = array_keys($array_saw[0]);

    $array_minimal = [];
    $arr_min = [];
    foreach ($array_saw as $k => $v) {
        foreach ($label as $k2 => $v2) {
            $array_minimal[$k][] = $v[$v2];
        }

        echo min($array_minimal[$k]) . '<br>';
    }

    //echo json_encode($array_minimal);






    ?>
</body>

</html>