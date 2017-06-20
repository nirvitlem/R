<?php
include('./DBConnect.php');
echo "<link rel='stylesheet' type='text/css' href='http://localhost/formcss.css' />";
echo "<link rel='stylesheet' type='text/css' href='http://localhost/buttoncss.css' />";
echo "<link rel='stylesheet' type='text/css' href='http://localhost/tablecss.css' />";
$DBC = new DBConnect('secmandb');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_GET['t'] == 'inWeeks') {

        $tArray = array("id" => "ID", "week_name" => "שם שבוע", "startdate" => "תאריך התחלה", "enddate" => "תאריך סיום", "text" => "הערות", "workingdays" => "ימי פעילות");
        $typeArray = array("int", "date", "date", "text", "text");
        $pKey = "id";
        $DBC->createTableView('הוסף שבועות', 'weeks', "שבועות", "הוסף שבוע", $tArray, $typeArray, $pKey);
    }else
        if ($DBC->insert($_GET['t'])==1)
        {
            echo "<label> תקין </label>";
            ?>
            <a href="http://localhost">עמוד ראשי</a>


            <?php
        } else  echo "<label> לא תקין</label>";

}
else
{
    ?>
    <form  action="http://localhost/index.php?t=inWeeks" method="post">
        <br>
        <br>
        <br>
        <br>
        <br>
        <button type="submit"  name="weeks" value="">טבלת שבועות </button>

    </form>
    <?php
}

?>
