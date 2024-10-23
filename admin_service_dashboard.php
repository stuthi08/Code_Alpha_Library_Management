<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        
        /* Add a dark overlay over the background image */
        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
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

        .alert {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
        }

        .alert-danger {
            background-color: #f2dede;
            color: #a94442;
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
</head>

<body>
    <?php
        include("data_class.php");

        $msg = "";

        if (!empty($_REQUEST['msg'])) {
            $msg = $_REQUEST['msg'];
        }

        if ($msg == "done") {
            echo "<div class='alert alert-success' role='alert'>Successfully Done</div>";
        } elseif ($msg == "fail") {
            echo "<div class='alert alert-danger' role='alert'>Failed</div>";
        }
    ?>
    <div class="overlay w-full h-full absolute top-0 left-0"></div>

    <div class="container">
        <div class="innerdiv">
            

            <div class="leftinnerdiv">
                <button class="greenbtn" onclick="openpart('addbook')">
                    <img class="icons" src="images/icon/book.png" width="30px" height="30px" /> ADD BOOK
                </button>
                <button class="greenbtn" onclick="openpart('bookreport')">
                    <img class="icons" src="images/icon/open-book.png" width="30px" height="30px" /> BOOK REPORT
                </button>
                <button class="greenbtn" onclick="openpart('bookrequestapprove')">
                    <img class="icons" src="images/icon/interview.png" width="30px" height="30px" /> BOOK REQUESTS
                </button>
                <button class="greenbtn" onclick="openpart('addperson')">
                    <img class="icons" src="images/icon/add-user.png" width="30px" height="30px" /> ADD STUDENT
                </button>
                <button class="greenbtn" onclick="openpart('studentrecord')">
                    <img class="icons" src="images/icon/monitoring.png" width="30px" height="30px" /> STUDENT REPORT
                </button>
                <button class="greenbtn" onclick="openpart('issuebook')">
                    <img class="icons" src="images/icon/test.png" width="30px" height="30px" /> ISSUE BOOK
                </button>
                <button class="greenbtn" onclick="openpart('issuebookreport')">
                    <img class="icons" src="images/icon/checklist.png" width="30px" height="30px" /> ISSUE REPORT
                </button>
                <a href="index.php">
                    <button class="greenbtn">
                        <img class="icons" src="images/icon/book.png" width="30px" height="30px" /> LOGOUT
                    </button>
                </a>
            </div>

            <div class="rightinnerdiv">
                <div id="bookrequestapprove" class="innerright portion">
                    <button class="greenbtn">BOOK REQUEST APPROVE</button>
                    <!-- PHP code for book requests -->
                </div>
                <div id="addbook" class="innerright portion">
                    <button class="greenbtn">ADD NEW BOOK</button>
                    <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">
                        <label>Book Name:</label>
                        <input type="text" name="bookname" placeholder="Enter book name" /></br>
                        <label>Detail:</label>
                        <input type="text" name="bookdetail" placeholder="Enter details" /></br>
                        <label>Author:</label>
                        <input type="text" name="bookaudor" placeholder="Enter author name" /></br>
                        <label>Publication:</label>
                        <input type="text" name="bookpub" placeholder="Enter publication" /></br>
                        <label>Branch:</label>
                        <input type="radio" name="branch" value="other" /> Other
                        <input type="radio" name="branch" value="BSIT" /> BSIT
                        <input type="radio" name="branch" value="BSCS" /> BSCS
                        <input type="radio" name="branch" value="BSSE" /> BSSE</br>
                        <label>Price:</label>
                        <input type="number" name="bookprice" placeholder="Enter price" /></br>
                        <label>Quantity:</label>
                        <input type="number" name="bookquantity" placeholder="Enter quantity" /></br>
                        <label>Book Photo:</label>
                        <input type="file" name="bookphoto" /></br>
                        <input type="submit" value="SUBMIT" />
                    </form>

            </div>
            </div>


            <div class="rightinnerdiv">   
            <div id="addperson" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ADD Person</Button>
            <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
            <label>Name:</label><input type="text" name="addname"/>
            </br>
            <label>Pasword:</label><input type="pasword" name="addpass"/>
            </br>
            <label>Email:</label><input  type="email" name="addemail"/></br>
            <label for="typw">Choose type:</label>
            <select name="type" >
                <option value="student">student</option>
                <option value="teacher">teacher</option>
            </select>

            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="studentrecord" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Student RECORD</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'> Name</th><th>Email</th><th>Type</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                // $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="issuebookreport" class="innerright portion" style="display:none">
            <Button class="greenbtn" >Issue Book Record</Button>

            <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[4]</td>";
                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>

<!--             

issue book -->
            <div class="rightinnerdiv">   
            <div id="issuebook" class="innerright portion" style="display:none">
            <Button class="greenbtn" >ISSUE BOOK</Button>
            <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
            <label for="book">Choose Book:</label>
           
            <select name="book" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();
            foreach($recordset as $row){

                echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
        
            }            
            ?>
            </select>
<br>
            <label for="Select Student">Select Student:</label>
            <select name="userselect" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select>
<br>
           <label>Days</label> <input type="number" name="days"/>

            <input type="submit" value="SUBMIT"/>
            </form>
            </div>
            </div>

            <div class="rightinnerdiv">   
            <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
            
            <Button class="greenbtn" >BOOK DETAIL</Button>
</br>
<?php
            $u=new data;
            $u->setconnection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($viewid);
            foreach($recordset as $row){

                $bookid= $row[0];
               $bookimg= $row[1];
               $bookname= $row[2];
               $bookdetail= $row[3];
               $bookauthour= $row[4];
               $bookpub= $row[5];
               $branch= $row[6];
               $bookprice= $row[7];
               $bookquantity= $row[8];
               $bookava= $row[9];
               $bookrent= $row[10];

            }            
?>

            <img width='150px' height='150px' style='border:1px solid #333333; float:left;margin-left:20px' src="uploads/<?php echo $bookimg?> "/>
            </br>
            <p style="color:black"><u>Book Name:</u> &nbsp&nbsp<?php echo $bookname ?></p>
            <p style="color:black"><u>Book Detail:</u> &nbsp&nbsp<?php echo $bookdetail ?></p>
            <p style="color:black"><u>Book Authour:</u> &nbsp&nbsp<?php echo $bookauthour ?></p>
            <p style="color:black"><u>Book Publisher:</u> &nbsp&nbsp<?php echo $bookpub ?></p>
            <p style="color:black"><u>Book Branch:</u> &nbsp&nbsp<?php echo $branch ?></p>
            <p style="color:black"><u>Book Price:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
            <p style="color:black"><u>Book Available:</u> &nbsp&nbsp<?php echo $bookava ?></p>
            <p style="color:black"><u>Book Rent:</u> &nbsp&nbsp<?php echo $bookrent ?></p>


            </div>
            </div>



            <div class="rightinnerdiv">   
            <div id="bookreport" class="innerright portion" style="display:none">
            <Button class="greenbtn" >BOOK RECORD</Button>
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbook();
            $recordset=$u->getbook();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Rent</th></th><th>View</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td>$row[10]</td>";
                $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View BOOK</button></a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

            </div>
            </div>



        </div>
        </div>
        

     
        <script>
        function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(portion).style.display = "block";  
        }
        </script>
    </body>
</html>