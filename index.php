<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid mt-3">
    <h2 class="pull-left mb-5">&nbsp; &nbsp; &nbsp; Student Details</h2>
      <div class="adddata  mx-auto">
          <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Student</a>
      </div>
    <div class="container">

        <?php
            require_once "connection.php";
            $query = "select * from students";
            if($result = mysqli_query($link, $query)){
                if(mysqli_num_rows($result)>0){
                
                    echo '<table class="table">';
                    echo '<thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">City</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                ';

                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['city'] . "</td>";
                        echo "<td>" . $row['mobile'] . "</td>";
                        echo "<td>";
                        echo '<a href="edit.php?id='.$row['id'].'" class="mr-4" > <span class="fa fa-pencil"> </span></a>';

                        echo '<a href = "delete.php?id='.$row['id'].'" class="btn btn-danger"><span class="fa fa-trash"> Delete</span></a> ' ;
                        echo "</td>";
                        
                        echo "</tr>";
                }

                echo "</tbody>"; 
                echo '</table>';

                    mysqli_free_result($result);
                                } else{
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            } else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }
        
                            // Close connection
                            mysqli_close($link);
        ?>
    </div>
</div>

</body>
</html>