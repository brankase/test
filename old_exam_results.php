<?php
session_start();
include "header.php";
include "connection.php"
?>


        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px; background-color: #fcf8e6;background-image: url(img/quiz5.jpg);background-repeat: repeat-x;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: #fffbcf;color: #1b32b5">
                
                <center> <h1>Old Exam Results</h1></center>
                <?php
                $count=0;
                $res= mysqli_query($link, "select * from exam_results where username='$_SESSION[username]'order by id desc");
                $count= mysqli_num_rows($res); //available exam results for this user
                
                if($count==0) //no result available
                {
                    ?>
                 <center> <h1>No Results Found</h1></center>
                    <?php
                }else{
                    echo "<table class='table table-bordered'>";
                    echo "<tr style='background-color: #006df0; color:white'>";
                    echo"<th>"; echo "username"; echo "</th>";
                    echo"<th>"; echo "exam type"; echo "</th>";
                    echo"<th>"; echo "total question"; echo "</th>";
                    echo"<th>"; echo "correct answer"; echo "</th>";
                    echo"<th>"; echo "wrong answer"; echo "</th>";
                    echo"<th>"; echo "exam time"; echo "</th>";
                    echo "</tr>";
                    
                    while ($row= mysqli_fetch_array($res))
                    {
                        //load records from table column
                    echo "<tr>";
                    echo"<td>"; echo $row["username"]; echo "</td>";
                    echo"<td>"; echo $row["exam_type"]; echo "</td>";
                    echo"<td>"; echo $row["total_question"]; echo "</td>";
                    echo"<td>"; echo $row["correct_answer"]; echo "</td>";
                    echo"<td>"; echo $row["wrong_answer"]; echo "</td>";
                    echo"<td>"; echo $row["exam_time"]; echo "</td>";
                    echo "</tr>"; 
                    }
                    echo "</table>";
                }
                
                ?>
                
            </div>

        </div>




  <?php
  include 'footer.php';
  ?>

