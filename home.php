<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <title>Home</title>
</head>
<style>
.fa-regular {
    font-size: 5rem;
    display: flex;
    justify-content: center;
    align-items: center;
    color: lightgrey;
}

/* .table {
    cursor: pointer;
} */

.h1 {
    text-align: center;
    color: lightslategray;
}
</style>

<body>
    <?php
        $host="localhost";
        $user="root";
        $pass="";
        $database="student";
        $connect=mysqli_connect($host,$user,$pass,$database);
        $result=mysqli_query($connect,"SELECT * FROM student");
        $id="";
        $nom="";
        $email="";
        if(isset($_POST['nom'])){
            $nom=$_POST['nom'];
        }
        if(isset($_POST['email'])){
            $email=$_POST['email'];
        }
        $sqls='';
        if(isset($_POST['add'])){
            $sqls="INSERT INTO student VALUES('$id','$nom','$email')";
            mysqli_query($connect,$sqls);
            header("location: home.php");
        }
        if(isset($_POST['remove'])){
            $sqls="DELETE FROM student WHERE nom='$nom'";
            mysqli_query($connect,$sqls);
            header("location: home.php");
        }
    ?>
    <div class="container">
        <form method="POST">
            <aside>
                <i class="fa-regular fa-circle-user"></i>
                <h1 class="h1">ADMIN USER</h1>
                <div class="mb-3">
                    <label for="exampleInputText" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputText" name="nom">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <button class="btn btn-success mb-3" name="add">Add Student</button>
                <button class="btn btn-danger mb-3" name="remove">Delete Student</button>
            </aside>
            <main>
                <table class="table table-dark mt-3 table-hover table-striped-columns" id="table">
                    <thead>
                        <tr>
                            <th scope="col">Student ID</th>
                            <th scope="col">Student Full Name</th>
                            <th scope="col">Student Email</th>
                        </tr>
                    </thead>
                    <?php
                        while( $row = mysqli_fetch_array($result)){
                            echo"<tr>";
                            echo"<td>".$row['id']."</td>";
                            echo"<td>".$row['nom']."</td>";
                            echo"<td>".$row['email']."</td>";
                            echo"</tr>";
                        }
                    
                    ?>
                </table>
            </main>
        </form>
    </div>
</body>

</html>