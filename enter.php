<htmL>
    <head>
        <title>Haiku</title>
    </head>
    <style>
        body{
		    background-image: url('haiku.jpg');
	    }
        h1 {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            padding: 15px;
            font-size: 150px;
            width: 90%;
            margin: auto;
            border: 8px solid lightcoral;
            border-radius: 20px;
            background-color: rgba(255,242,223,0.6);
        }
        h4 {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            padding: 25px;
            margin: auto;
            width: 90%;
            font-size: xx-large;
            text-decoration: underline overline 5px coral;
        }
    </style>
</html>
<?php
$uname = $_POST['uname'];
$haiku = $_POST['haiku'];
$err;

if(str_word_count($haiku,0) != 17){
    if(str_word_count($haiku,0) < 17){
        $err = "Not enough words to be a Haiku.";        
    }
    if(str_word_count($haiku,0) > 17){
        $err = "More words than what can be considered a Haiku.";
    }
    echo "<h1>".$err."</h1>";
    echo "<h4><a href = 'index.html'>Go Back</a></h4>";

}

else{
    $host = '';
    $user = '';
    $pwd = '';
    $dbname = '';
    $tablename = '';
    $conn = mysqli_connect($host,$user,$pwd,$dbname) or die(mysqli_error($conn));
    $words = str_word_count($haiku,1,"\'");
    $line1 = $words[0]." ".$words[1]." ".$words[2]." ".$words[3]." ".$words[4];
    $line2 = $words[5]." ".$words[6]." ".$words[7]." ".$words[8]." ".$words[9]." ".$words[10]." ".$words[11];
    $line3 = $words[12]." ".$words[13]." ".$words[14]." ".$words[15]." ".$words[16];

    mysqli_escape_string($conn, $line1);
    $query = "INSERT INTO ".$tablename." VALUES ('".$uname."','".mysqli_escape_string($conn, $line1)."','".mysqli_escape_string($conn, $line2)."','".mysqli_escape_string($conn, $line3)."')";
    $s = mysqli_query($conn,$query);

    if(!$s){
        echo "<h1>Save Failed!! Retry</h1>";
        echo "<br><h4>"."<a href='/haiku/enter.html'> Go Back </a>"."</h4><br>";
    }
    else {
        echo "<h1>Save Successfull!!!</h1>";
        echo "<br><h4>"."<a href='/haiku/index.html'> Home </a>"."</h4><br>";
    }
}
?>