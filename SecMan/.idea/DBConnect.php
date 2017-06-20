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
    private $TableArrayKeyValuesClass;
    private $pKeyClass;

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

        $this->TableArrayKeyValuesClass= $TableArrayKeyValues;
        $this->pKeyClass = $pKey;
        $sql = 'SELECT * 
		FROM '.$tableName.'';

        $query = mysqli_query($this->connect, $sql);

        if (!$query) {
            die ('SQL Error: ' . mysqli_error($this->connect));
        }

?>
<html>
<head>
    <br>
    <br>
    <br>
    <style>
        label{display:inline-block;width:100px;margin-bottom:10px;}
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <div>
    <?php  echo "<link rel='stylesheet' type='text/css' href='http://localhost/formcss.css' />"; ?>

    <form action="index.php?t=<?php echo $tableName ?>" method="post">
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
        <input type="submit"   value ='<?php echo $buttonViewName; ?>' />

    </form>
    </div>
    <title><?php echo $titleHtmlViewName; ?></title>

     <?php  echo "<link rel='stylesheet' type='text/css' href='http://localhost/tablecss.css' />"; ?>

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
<body>
<h1></h1>
<h1></h1>

<form action="http://localhost">
    <br>
    <br>
    <br>
    <br>
    <br>
    <button type="submit"  >דף ראשי </button>

</form>


</body>
</html>
<?php

    }
    public function insert($tableName){

        /* var_dump($_POST);
        echo $_POST["week_name/"]; */
        $columns ="";
        $values="";
        foreach ($this->TableArrayKeyValuesClass as $x=>$x_value) {
            if ($x != $this->pKeyClass)
            {
                $columns .=$x.", ";
                $values  .="'".$_POST[$x."/"]."', ";
            }
        }
        $columns=rtrim($columns,", ");
        $values=rtrim($values,", ");
        /* var_dump($columns);
        var_dump($values);*/
        $query = "INSERT INTO $tableName ($columns) VALUES ($values)";
        /*var_dump($query);*/
        mysqli_query($this->connect, $query);
        if(mysqli_affected_rows($this->connect) > 0){
            return 1;
        } else {
           /* var_dump(mysqli_error ($this->connect));*/
            return 0;
        }
    }
}