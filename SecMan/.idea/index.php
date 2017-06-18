<?php
include 'database.php';

$sql = 'SELECT * 
		FROM weeks';

$query = mysqli_query($connect, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($connect));
}

?>
<html>
<head>
    <style>
        label{display:inline-block;width:100px;margin-bottom:10px;}
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <title>הוסף שבועות</title>

    <style type="text/css">
        body {
            font-size: 15px;
            color: #343d44;
            font-family: "segoe-ui", "open-sans", tahoma, arial;
            padding: 0;
            margin: 0;
        }
        table {
            margin: auto;
            font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
            font-size: 12px;
        }

        h1 {
            margin: 25px auto 0;
            text-align: center;
            text-transform: uppercase;
            font-size: 17px;
        }

        table td {
            transition: all .5s;
        }

        /* Table */
        .data-table {
            border-collapse: collapse;
            font-size: 14px;
            min-width: 537px;
        }

        .data-table th,
        .data-table td {
            border: 1px solid #e1edff;
            padding: 7px 17px;
        }
        .data-table caption {
            margin: 7px;
        }

        /* Table Header */
        .data-table thead th {
            background-color: #508abb;
            color: #FFFFFF;
            border-color: #6ea1cc !important;
            text-transform: uppercase;
        }

        /* Table Body */
        .data-table tbody td {
            color: #353535;
        }
        .data-table tbody td:first-child,
        .data-table tbody td:nth-child(4),
        .data-table tbody td:last-child {
            text-align: right;
        }

        .data-table tbody tr:nth-child(odd) td {
            background-color: #f4fbff;
        }
        .data-table tbody tr:hover td {
            background-color: #ffffa2;
            border-color: #ffff0f;
        }

        /* Table Footer */
        .data-table tfoot th {
            background-color: #e5f5ff;
            text-align: right;
        }
        .data-table tfoot th:first-child {
            text-align: left;
        }
        .data-table tbody td:empty
        {
            background-color: #ffcccc;
        }
    </style>
</head>
<h1></h1>
<h1></h1>
<table class="data-table">
    <caption class="title">שבועות</caption>
    <thead>
    <tr>
        <th>ID</th>
        <th>שם שבוע</th>
        <th>תאריך התחלה</th>
        <th>תאריך סיום</th>
        <th>הערות</th>
        <th>ימי פעילות</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_array($query))
    {
        echo '<tr>
					<td>'.$row['id'].'</td>
					<td>'.$row['week_name'].'</td>
					<td>'. date('F d, Y', strtotime($row['startdate'])) . '</td>
					<td>'. date('F d, Y', strtotime($row['enddate'])) . '</td>
					<td>'. $row['text'] . '</td>
					<td>'. $row['workingdays'] . '</td>
				</tr>';
    }?>
    </tbody>
    <tfoot>
    </tfoot>
</table>
</head>
<body>
<h1></h1>
<h1></h1>
<div style="position: absolute; left: 200px; top: 50px;">
<form method="post" action="process.php">

    <input type="int" name="week_name" />
    <label>שבוע מספר</label>
    <br />
    <input type="date" name="startdate" />
    <label>תאריך התחלה</label>
    <br />
    <input type="date" name="enddate" />
    <label>תאריך סיום</label>
    <br />
    <input type="text" name="text" />
    <label>הערות</label>
    <br />
    <input type="text" name="workingdays" />
    <label>ימי עבודה</label>
    <br />
    <input type="submit" value="הוסף שבוע">
</form>

</div>

</body>
</html>