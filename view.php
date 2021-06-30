<html>
    <head>
        <title>Haiku-Fi</title>
        <style>
            body{
		        background-image: url('haiku.jpg');
	        }
            .mai{
                margin: auto;
                width: 75%;
                align-items: center;
                padding : 5px 15px 5px 15px;
            }
            .text{
                font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                text-align: justify;
                width: auto;
                padding: 10px 10px 10px 10px;
                font-size: 150px;
            }
            .grid{
                display: grid;
                grid-template-columns: auto auto;
            }
            .rows{
                margin: auto;
                margin-top: 10px;
                width: 50%;
                border: 4px solid lightcoral;
                border-radius: 20px;
                padding: 20px;
                font-size: 30px;
                background-color: rgba(255, 242, 223,0.6);
            }
            .rows:hover{
                background-color: rgba(255, 242, 223,1);
            }
            #uname{
                font-style: italic;
                text-align: right;
            }
            .head{
                font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                text-align: center;
                width: auto;
                margin: 10px auto;
                background-color: rgba(255, 242, 223,0.6); 
                font-weight: bolder; 
                font-size: 75px;
		        border: 4px solid lightcoral;
		        border-radius: 20px;
	        }
            h4{
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            padding: 25px;
            margin: auto;
            width: 90%;
            font-size: xx-large;
            text-decoration: underline overline 5px coral;
            }
        </style>
    </head>
    <body>
        <div class="mai">
        <div class ="head">Haikus</div>
        <?php
            $host = '';
            $user = '';
            $pwd = '';
            $dbname = '';
            $tablename = '';
            $conn = mysqli_connect($host,$user,$pwd,$dbname) or die(mysqli_error($conn));
            $query = "SELECT * FROM ".$tablename.";";
            $res = mysqli_query($conn, $query);
            $r = mysqli_num_rows($res);
            echo "<div class = \"grid\">";
            if(!$r){
                echo "<br><div class="."text".">Nothing to display.</div>";
            }
            else{
                while($ent = mysqli_fetch_array($res)){
                    echo "<div class="."rows".">".$ent['H_id'].".  \"".$ent['Line1'].",<br>".$ent['Line2'].",<br>".$ent['Line3'].".\"<br>"."<p id="."uname".">-".$ent['Uname']."</div>";
                }
            }
            echo "</div>";
        ?>
        <br>
            <h4>Click <a href="/haiku/index.html">Here</a> to return </h4>
        </div>
    </body>
</html>