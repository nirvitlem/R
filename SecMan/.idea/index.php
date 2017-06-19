<?php
include('./DBConnect.php');

$DBC = new DBConnect('secmandb');
$tArray = array("id" => "ID", "week_name" => "שם שבוע", "startdate" => "תאריך התחלה", "enddate" => "תאריך סיום", "text" => "הערות", "workingdays" => "ימי פעילות");
$typeArray = array("int", "date", "date", "text", "text");
$pKey = "id";
$DBC->createTableView('הוסף שבועות', 'weeks', "שבועות", "הוסף שבוע", $tArray, $typeArray, $pKey);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($DBC->insert($_GET['t'])==1)
    {
        echo "<label> תקין </label>";
?>
        <a href="http://localhost">עמוד ראשי</a>


        <?php
    } else  echo "<label> לא תקין</label>";

}

else {

}

?>
