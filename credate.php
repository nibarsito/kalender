<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="kalender.css">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
</head>
<body>
    <form class="logwrap" action="credate.php" method="post">
        <input class="textin" type="date" name="datum"  require>
        <input class="textin" type="text" name="event" placeholder="eventbeskrivning" require>
        <input type="submit" value="klar" name="submit">
    </form>
    <?php
    //$_SESSION['userid'] = $userid;
    $userid = 111;
   
    $conn = new mysqli('localhost', 'root','','kalender');
    $conn->set_charset("utf8");
    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }  

         $datum = $_POST['datum'];
        $event = $_POST['event'];
        if (empty($event)) {
            echo"eventbeskrivning saknas";
        }elseif($datum == 0000-00-00) {
            echo"datum saknas";
        }else{
        $sql = "INSERT INTO events(event,datum,userid) VALUES ('$event','$datum','$userid')";
        
        $conn->query($sql);
echo "<form action='events.php'>
    <input type='submit' value='event tillagt'>
</form>";
        }
        
     
     
     
    ?>
</body>
</html>