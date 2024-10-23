<?php
session_start();
$userloginid = $_SESSION["userid"] = $_GET['userlogid'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>User Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

    <style>
        body {
            background-image: url('images/library.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding-top: 20px;
        }

        .innerdiv {
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .leftinnerdiv {
            float: left;
            width: 25%;
            padding-right: 20px;
        }

        .rightinnerdiv {
            float: right;
            width: 75%;
            padding-left: 20px;
        }

        .innerright {
            padding: 20px;
            background-color: #e8f5e9;
            border-radius: 8px;
        }

        .greenbtn {
            display: block;
            width: 100%;
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .greenbtn:hover {
            background-color: #45a049;
        }

        .icons {
            margin-right: 10px;
            vertical-align: middle;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #f1f1f1;
            border-bottom: 1px solid #ddd;
        }

        td a {
            color: #4caf50;
            font-weight: bold;
        }

        td a:hover {
            color: #2e7d32;
        }

        input[type="text"], 
        input[type="number"], 
        input[type="file"], 
        select {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        ::placeholder {
            color: #bbb;
        }

        .imglogo {
            margin-bottom: 20px;
            width: 100px;
            height: auto;
        }

        .portion {
            display: none;
        }

        @media screen and (max-width: 768px) {
            .leftinnerdiv, .rightinnerdiv {
                width: 100%;
                padding: 0;
            }

            .greenbtn {
                width: 100%;
            }

            input[type="text"], 
            input[type="number"], 
            input[type="file"], 
            select {
                width: 100%;
            }
        }
    </style>

    <body>
        <?php
        include("data_class.php");
        ?>

        <div class="container">
            <div class="innerdiv">
               

                <div class="leftinnerdiv">
                    <br>
                    <button class="greenbtn" onclick="openpart('myaccount')">
                        <img class="icons" src="images/icon/profile.png" width="30px" height="30px"/> My Account
                    </button>
                    <button class="greenbtn" onclick="openpart('requestbook')">
                        <img class="icons" src="images/icon/book.png" width="30px" height="30px"/> Request Book
                    </button>
                    <button class="greenbtn" onclick="openpart('issuereport')">
                        <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px"/> Book Report
                    </button>
                    <a href="index.php">
                        <button class="greenbtn">
                            <img class="icons" src="images/icon/logout.png" width="30px" height="30px"/> LOGOUT
                        </button>
                    </a>
                </div>

                <div class="rightinnerdiv">   
                    <div id="myaccount" class="innerright portion" style="<?php if(!empty($_REQUEST['returnid'])) { echo 'display:none'; } ?>">
                        <button class="greenbtn">My Account</button>
                        <?php
                        $u = new data;
                        $u->setconnection();
                        $u->userdetail($userloginid);
                        $recordset = $u->userdetail($userloginid);
                        foreach ($recordset as $row) {
                            $name = $row[1];
                            $email = $row[2];
                            $type = $row[4];
                        }
                        ?>
                        <p><u>Person Name:</u> <?php echo $name ?></p>
                        <p><u>Person Email:</u> <?php echo $email ?></p>
                        <p><u>Account Type:</u> <?php echo $type ?></p>
                    </div>
                </div>

                <div class="rightinnerdiv">   
                    <div id="issuereport" class="innerright portion" style="display:none;">
                        <button class="greenbtn">BOOK RECORD</button>
                        <?php
                        $userloginid = $_SESSION["userid"];
                        $u = new data;
                        $u->setconnection();
                        $u->getissuebook($userloginid);
                        $recordset = $u->getissuebook($userloginid);
                        $table = "<table><tr><th>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th><th>Return</th></tr>";
                        foreach ($recordset as $row) {
                            $table .= "<tr>";
                            $table .= "<td>{$row[2]}</td>";
                            $table .= "<td>{$row[3]}</td>";
                            $table .= "<td>{$row[6]}</td>";
                            $table .= "<td>{$row[7]}</td>";
                            $table .= "<td>{$row[8]}</td>";
                            $table .= "<td><a href='otheruser_dashboard.php?returnid={$row[0]}&userlogid={$userloginid}'><button class='btn btn-primary'>Return</button></a></td>";
                            $table .= "</tr>";
                        }
                        $table .= "</table>";
                        echo $table;
                        ?>
                    </div>
                </div>

                <div class="rightinnerdiv">   
                    <div id="return" class="innerright portion" style="<?php if(!empty($_REQUEST['returnid'])) { echo ''; } else { echo 'display:none'; } ?>">
                        <button class="greenbtn">Return Book</button>
                        <?php
                        $returnid = $_REQUEST['returnid'] ?? null;
                        if ($returnid) {
                            $u = new data;
                            $u->setconnection();
                            $u->returnbook($returnid);
                        }
                        ?>
                    </div>
                </div>

                <div class="rightinnerdiv">   
                    <div id="requestbook" class="innerright portion" style="display:none;">
                        <button class="greenbtn">Request Book</button>
                        <?php
                        $u = new data;
                        $u->setconnection();
                        $u->getbookissue();
                        $recordset = $u->getbookissue();
                        $table = "<table><tr><th>Image</th><th>Book Name</th><th>Book Author</th><th>Branch</th><th>Price</th><th>Request</th></tr>";
                        foreach ($recordset as $row) {
                            $table .= "<tr>";
                            $table .= "<td><img src='uploads/{$row[1]}' width='100px' height='100px' style='border:1px solid #333333;'></td>";
                            $table .= "<td>{$row[2]}</td>";
                            $table .= "<td>{$row[4]}</td>";
                            $table .= "<td>{$row[6]}</td>";
                            $table .= "<td>{$row[7]}</td>";
                            $table .= "<td><a href='requestbook.php?bookid={$row[0]}&userid={$userloginid}'><button class='btn btn-primary'>Request</button></a></td>";
                            $table .= "</tr>";
                        }
                        $table .= "</table>";
                        echo $table;
                        ?>
                    </div>
                </div>

            </div>
        </div>

        <script>
            function openpart(section) {
                var portions = document.getElementsByClassName('portion');
                for (var i = 0; i < portions.length; i++) {
                    portions[i].style.display = 'none';
                }
                document.getElementById(section).style.display = 'block';
            }
        </script>
    </body>
</html>
