<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Course Database Connection</title>
    </head>
    <body>
        
        <form method="POST">
          <fieldset>  
            <legend>Course Registration </legend>
            Course Title: <input type="text" name="course_name" placeholder="Enter course title" /><br/>
            Course Code: <input type="text" name="course_code" placeholder="Enter Course Code" /><br/>
            <input type="submit" name="submit" value="Register" /><br/>
            
          </fieldset>  
        </form>
        
        <?php
        {
            require 'course.php';
            require_once 'db.php';
            //session_start();
            if (isset($_POST['submit']))
            {
                $course = new Course($_POST['course_name'], $_POST['course_code']);
               // $_SESSION['student'] = $course;
//                print_r($_SESSION['course']);
//                exit();
                
            $course_name = mysqli_real_escape_string($con, $_POST['course_name']);
            $course_code = mysqli_real_escape_string($con, $_POST['course_code']);

            $sql = mysqli_query($con, "INSERT INTO courses (title, code)
            VALUES ('$course_name', '$course_code')") ; 
                 
            echo "One record added.";
            echo '<br/>'."Course database updated.";

            mysqli_close($con);
            }
        }   
        ?>
    </body>
</html>

