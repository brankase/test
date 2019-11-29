<?php
session_start();
include "header.php";
include "../connection.php";
if(!isset($_SESSION["admin"]))
{
  ?>
<script type="text/javascript">
    window.location="index.php";
</script>
  <?php
}

$id=$_GET["id"];

$exam_category="";
$res = mysqli_query($link, "SELECT * FROM exam_category WHERE id='$id'")or die( mysqli_error($link));

while($row = mysqli_fetch_array($res))
{
    $exam_category = $row["category"];
}
?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Question inside <?php echo $exam_category; ?></h1>
                    </div>
                </div>
            </div>
        
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card"> 
                            <div class="card-body">
                                
                               <div class="col-lg-8">
                                   <form name="form1" action="" method="post">
                        <div class="card">
                            <div class="card-header"><strong>Add New Questions</strong>
                                 </div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">
                                        Add Question</label><input type="text" name="question" 
                                              placeholder="Add Question" 
                                              class="form-control"></div>
                                    <div class="form-group"><label for="company" class=" form-control-label">
                                        Add Opt1</label><input type="text" name="opt1" 
                                              placeholder="Add Opt1" 
                                              class="form-control"></div>
                                     <div class="form-group"><label for="company" class=" form-control-label">
                                        Add Opt2</label><input type="text" name="opt2" 
                                              placeholder="Add Opt2" 
                                              class="form-control"></div>
                                     <div class="form-group"><label for="company" class=" form-control-label">
                                        Add Opt3</label><input type="text" name="opt3" 
                                              placeholder="Add Opt3" 
                                              class="form-control"></div>
                                     <div class="form-group"><label for="company" class=" form-control-label">
                                        Add Opt4</label><input type="text" name="opt4" 
                                              placeholder="Add Opt4" 
                                              class="form-control"></div>
                                     <div class="form-group"><label for="company" class=" form-control-label">
                                        Add Answer</label><input type="text" name="answer" 
                                              placeholder="Add Answer" 
                                              class="form-control"></div>
                                               
                                    <div class="form-group">
                                        <input type="submit" name="submit1"  value="Add Question" class="btn btn-success">            
                                    </div>              
                                </div>  
                             </div>
                               </form>   
                         </div>
                               
                        </div>
                       </div> 
                    </div>
                    <!--/.col-->
                 </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card"> 
                            <div class="card-body">
                                
                                <table class="table table-bordered">
                                    <tr>
                                         <th>No</th>
                                         <th>Questions</th>    
                                         <th>Opt1</th>
                                         <th>Opt2</th>
                                         <th>Opt3</th>
                                         <th>Opt4</th>
                                         <th>Answer</th>
                                         <th>Edit</th>
                                          <th>Delete</th>
                                    </tr>
                                       
                                <?php
                            $res= mysqli_query($link, "select * from questions where category= '$exam_category' order by question_no asc")or die( mysqli_error($link));
                            while ($row= mysqli_fetch_array($res))
                            {
                                echo"<tr>";
                                echo"<td>"; echo $row["question_no"]; echo "</td>";
                                echo"<td>"; echo $row["question"]; echo "</td>";
                                echo"<td>"; echo $row["opt1"]; echo "</td>";
                                echo"<td>"; echo $row["opt2"]; echo "</td>";
                                echo"<td>"; echo $row["opt3"]; echo "</td>";
                                echo"<td>"; echo $row["opt4"]; echo "</td>";
                                echo"<td>"; echo $row["answer"]; echo "</td>";
                                
                               echo "<td>"; 
                               ?>                                     
                                    <a href ="edit_option.php?id=<?php echo $row["id"];?>&id1=<?php echo $id; ?>">Edit</a>
                                <?php
                                echo "</td>";
                                echo "<td>";
                                ?>
                                <a href ="delete_option.php?id=<?php echo $row["id"];?>&id1=<?php echo $id; ?>">Delete</a>
                                <?php
                                echo"</td>";
                                echo "</tr>";
                            }
                                ?>
                            </table> 
                            </div> 
                        </div>
                       </div> 
                    </div>
                
                
           </div><!-- .animated -->
         </div><!-- .content -->
                                    
    <?php
    
    if(isset($_POST["submit1"]))
    {
     //check question_no for question sequence
     $loop=0;
        
     $count=0;
     
     $res= mysqli_query($link,"select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($link));
     $count = mysqli_num_rows($res);
             
      if($count==0)
      {
      }
      else{
        while($row= mysqli_fetch_array($res))
       {
        $loop=$loop+1;
      mysqli_query($link, "update questions set question_no ='$loop' where id=$row[id]") or die (mysqli_error($link));   
       } 
      }
      $loop=$loop+1;
      //add question
      mysqli_query($link, "insert into questions values (NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')") or die (mysqli_error($link));
    ?>
     <script type="text/javascript">
     alert("question added successfully");
     window.location.href=window.location.href;
     </script>
     <?php
       }
    ?>                               
     
    <?php
    
    include "footer.php";
    
    ?>
