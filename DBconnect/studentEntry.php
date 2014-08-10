<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Student Database Connection</title>
    </head>
    <body>
        
        <form method="POST">
          <fieldset>  
            <legend>Student Registration </legend>
            Student Name: <input type="text" name="student_name" placeholder="Enter your name"/><br/>
            Creation Date: <input type="date" name="created_date" placeholder="Enter today's date"/><br/>
            <input type="submit" name="submit" value="Register" /><br/>
            
          </fieldset>  
        </form>
        
        <?php
        {
            require_once 'student.php';
            require_once 'db.php';
            //session_start();
            if (isset($_POST['submit']))
            {
                $student = new Student($_POST['student_name'], $_POST['created_date']);
                //$_SESSION['student'] = $student;
                //print_r($_SESSION['student']);
                //exit();
                // escape variables for security
                $student_name = mysqli_real_escape_string($con, $_POST['student_name']);
                $creation_date = mysqli_real_escape_string($con, $_POST['created_date']);
                
                $sql = mysqli_query($con, "INSERT INTO Students (student_name, created)
                VALUES ('$student_name', '$creation_date')") ; 
                
//                if (!mysqli_query($con,$sql)) 
//                {
//                  die('Error: ' . mysqli_error($con));
//                }
                echo "1 record added.";
                echo '<br/>'."Student database updated.";

                mysqli_close($con);
                
            }
        }   
        ?>
    </body>
</html>

