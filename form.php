<html>
<head>
    <title>To Do List</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="main">

    <div class="form-container">
        <?php
        require ('connection.php');




        if(isset($_POST['insert_btn']))
        {
            $name = $_POST['name'];
            $status = (int)$_POST['status'] ?? 0;
            $date= date('Y-m-d');

            $error_status="";

//            if(empty($status)){
//
//                $error_status=  "Status required";
//            }



            try{
                $sql ="INSERT INTO todos(name, status, created_at) VALUES(:name, :status, :created_at)";

                $query = $dbh->prepare($sql);
                $query->bindParam(':name',$name, PDO::PARAM_STR);
                $query->bindParam(':status',$status, PDO::PARAM_INT);
                $query->bindParam(':created_at',$date, PDO::PARAM_STR);


                $query->execute();

                $lastInsertId = $dbh->lastInsertId();

                    echo "Record inserted successfully";


            } catch (PDOException $e) {
                echo 'Query failed: ' . $e->getMessage();
            }

            if($error_status!==""){

                echo $error_status;
            }

        }

        ?>
        <h2>Todo Form</h2>
        <form action="form.php" method="post">

            <label>Item Name</label>
            <input type="text" name="name" id="name" placeholder="Name of Item">

            <label>Status</label>
            <input type="checkbox" name="status" value="1">

            <input type="submit" name="insert_btn" value="Submit">

        </form>




    </div>

    <footer>
        Copyright &copy; 2020. All rights reserved.
    </footer>
</div>

</body>
</html>