<?php

/**
 * Created by PhpStorm.
 * User: NirV
 * Date: 18/06/2017
 * Time: 17:13
 */
class DBConnect
{
    private $connect;

    public function  __construct($dbName)
    {
        $this->connect=mysqli_connect('localhost','root','',$dbName);
        $this->connect->set_charset("utf8");
        if(mysqli_connect_errno($this->connect))
        {
            echo 'Failed to connect';
        }
    }

    public function returnMySqli()
    {
        return $this->connect;
    }


    public function createTableView($titleHtmlViewName,$tableName,$tableViewName,$buttonViewName,$TableArrayKeyValues,$typeArray,$pKey)
    {

        $sql = 'SELECT * 
		FROM '.$tableName.'';

        $query = mysqli_query($this->connect, $sql);

        if (!$query) {
            die ('SQL Error: ' . mysqli_error($this->connect));
        }

?>
<html>
<head>
    <style>
label{display:inline-block;width:100px;margin-bottom:10px;}
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <title><?php echo $titleHtmlViewName; ?></title>

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
    <caption class="title"><?php echo $tableViewName; ?></caption>
    <thead>
    <tr>
<?php
    foreach ($TableArrayKeyValues as $x=>$x_value)
    {
        echo "<th>" .$x_value."</th>";
    }
?>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_array($query))
    {
        echo '<tr>';

             foreach ($TableArrayKeyValues as $x=>$x_value)
             {
                 echo '<td>' .$row[''.$x.''].'</td>';
             }
		echo '</tr>';
    }
  ?>
</tbody>
<tfoot>
</tfoot>
</table>
</head>
<body>
<h1></h1>
<h1></h1>
<div style="position: absolute; left: 200px; top: 50px;">


        <?php
        $index=0;
        foreach ($TableArrayKeyValues as $x=>$x_value)
        {
            if ($x!=$pKey)
            {
                echo "<input type=".$typeArray[$index]." name=".$x."/>";
                echo "<label> ".$x_value." </label>";
                echo "<br />";
                $index++;
            }
        }

        ?>
        <input type="submit" onclick="insert($tableName)" value ='<?php echo $buttonViewName; ?>' />


</div>

</body>
</html>
<?php
        function insert($tableName){

            foreach ($TableArrayKeyValues as $x=>$x_value) {
                if ($x != $pKey)
                {
                    $columns = implode(", ",$x);
                    $values  = implode(", ", $x_values);
                }
            }
            $query = "INSERT INTO $tableName ($columns) VALUES ($values)";
            mysqli_query($this->connect, $query);
            if(mysqli_affected_rows($this->connectt) > 0){
                echo "<p>Employee Added</p>";
                echo "<a href='index.php'>Go Back</a>";
            } else {
                echo "Employee NOT Added<br />";
                echo mysqli_error ($this->connect);
            }
        }
    }
}