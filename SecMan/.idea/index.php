<html>
<head>
    <style>
        label{display:inline-block;width:100px;margin-bottom:10px;}
    </style>


    <title>הוסף שבועות</title>
</head>
<body>

<form method="post" action="process.php">
    <label>שבוע מספר</label>
    <input type="int" name="week_name" />
    <br />
    <label>תאריך התחלה</label>
    <input type="date" name="statdate" />
    <br />
    <label>תאריך סיום</label>
    <input type="date" name="enddate" />
    <br />
    <label>הערות</label>
    <input type="text" name="text" />
    <br />
    <label>ימי עבודה</label>
    <input type="text" name="workingdays" />
    <br />
    <input type="submit" value="הוסף שבוע">
</form>



</body>
</html>