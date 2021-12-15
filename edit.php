<?php
    $id = $_GET['id'];
    //record fetch into the field of selected id
    require_once "connection.php";
    $query1 = "select * from students where id = $id";
    $result = mysqli_query($link, $query1);
    $data = mysqli_fetch_array($result); //data fetch
?>


<?php
//update operation
if(isset($_POST['update'])) {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $mobile = $_POST['mobile'];
    $id = $_GET['id'];

    $query2 = "update students set name='{$name}', city='{$city}', mobile='{$mobile}' where id='{$id}'";
    if(mysqli_query($link, $query2)){
        header("location: index.php");
    }else{
        echo"failed";
    }
}
?>

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
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        .error{
            color:red;
            font:bold;
        }
    </style>
</head>    
<body>
<div class="container-fluid mt-4">
        <h2 class="text-center">Student management</h2>

    <div class="wrapper">
        <div class="container mt-5">
            <form method="POST" id="myform">
                <div class="form-group">
                    <input type="text" name="name" class="form-control"  placeholder="Student name" value="<?php echo $data['name']; ?>" required><br>
                    <input type="text" name="city" class="form-control" placeholder="Student city" value="<?php echo $data['city']; ?>" required ><br>
                    <input type="text" name="mobile" class="form-control" placeholder="Student Mobile number" value="<?php echo $data['mobile']; ?>" required> <br>
                        <div class="pull-right">
                            <button class="btn btn-success" name="update" type="submit">update</button>
                            <a href="index.php" class="btn btn-primary" > cancel </a>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- jquery cdn link -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jquery validation plugin cdn link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


<script>
    $(document).ready(function(){
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
            }, "Only alphabetical characters");

        $("#myform").validate({
            rules:{
                name:{
                    required:true,
                    lettersonly:true
                },
                city:{
                    required:true,
                    lettersonly:true
                },
                
                mobile:{
                    required:true,
                    digits:true,
                    maxlength:10,
                    minlength:10
                }
            },
            messages:{
                name:{
                    required:"**this is required field",
                     lettersonly:"invalid username"
                },

                city:{
                    required:"**this is required field",
                    city:"invalid entry"
                },

                mobile:{
                    required:"**this is required field",
                    digits:"please enter your correct mobile number",
                    maxlength:"you entered more than 10 digit",
                    minlength:"you entered less than 10 digit"

                }
            },

            submitHandler: function(form) {
                 form.submit();
            }
           
        });
  
    });
   
</script>


</body>
</html>