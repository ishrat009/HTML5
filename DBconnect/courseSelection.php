<!DOCTYPE html>

<html>
    <head>
        <title>Course Dropdown</title>

    </head>
    
    <body>
      <form method='GET'>
        <fieldset>
           <legend> Online Course Registration</legend>
             <?php  
               require_once 'course.php';
                require_once 'db.php';
                $sql = mysqli_query($con, "SELECT title FROM courses");
              ?>
            <label for="Course">Select your course: </label>
                <select id="course_name">
                <option>
                <?php    
                while($option= mysqli_fetch_object($sql))
                 {
                    echo '<option>'.$option->title.'</option>';
                 }
                ?>
                </option>

            </select><br/>
          
            <input type="submit" name="submit" value="Register" /><br/>
                
        </fieldset>    
      </form>
       
        <?php

        
        ?>
    </body>
</html>
