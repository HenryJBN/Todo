<?php


require('connection.php');


    $sql = "SELECT * FROM todos";
    $query= $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0){

?>

        <table width="100%" cellspacing="0" cellpadding="5" border="1">
            <thead>
            <th>S/N</th>
            <th>Name</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
            </thead>
            <tbody>
           <?php $c=0;?>
            <?php foreach ($results as $result){?>
               <?php echo  '<tr>
                    <td>'.++$c.'</td>
                    <td>'.$result->name.'</td>
                    <td>'.$result->status.'</td>
                    <td>'.$result->created_at.'</td>
                    <td>
                        <a href="update.php?id='.$result->id.'">Edit</a>
                        <a href="delete.php?id='.$result->id.'">Delete</a>


                    </td>
                </tr>';



           }?>
            </tbody>
        </table>





  <?php  }?>








