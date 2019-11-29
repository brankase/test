<?php
session_start();
include "connection.php";
$date=date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+ $_SESSION[exam_time].' minutes'"));

include 'header.php';



?>


        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px; background-image: url(img/images1.png);">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color:#b4e4fa;font-size: 23px;text-align: center;">
                
                <?php
                $correct=0;
                $wrong=0;
       // how many wrong, correct answers 
               if(isset($_SESSION["answer"]))
               {
                   //check selected answers
                   for($i=1;$i<= sizeof($_SESSION["answer"]);$i++)
                   {
                       //load answer and then compare with given answer
                       $answer="";
                       $res= mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]'&& question_no=$i");
                       while ($row = mysqli_fetch_array($res))
                       {
                           $answer=$row["answer"];  //load from mysqli table
                       }
                       if(isset($_SESSION["answer"][$i]))// if user selected answer compare table answer and selected answer
                       {
                           if($answer==$_SESSION["answer"][$i])
                           {
                               $correct=$correct+1;//if both are true
                           }else{
                               $wrong=$wrong+1; // if not
                           }
                       }else{
                           $wrong=$wrong+1;// if user not selected it is wrong by default
                       }
                   }
               }
           //display results-total questions,correct & incorrect answers
               $count=0;
               //how many records are available in this exam
                $res= mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]'");
                $count= mysqli_num_rows($res);
                $wrong=$count-$correct; //how many wrong answers 
                echo "<br>";
               
                echo '<span style="color:#1b32b5;font-weight:bold;">TOTAL SCORE</span>'; echo "<br>";
                echo "<br>";
                echo '<span style="color:#1b32b5;">Total Questions = </span>'.$count;
                echo "<br>";
                echo '<span style="color:#1b32b5;">Correct Answer = </span>'.$correct;;
                echo "<br>";
                echo '<span style="color:#1b32b5;">Wrong Answer = </span>'.$wrong;;
               
                echo "<br>";echo "<br>";
                echo '<span style="color:#1b32b5;font-weight:bold;">CORRECT ANSWER</span>'; 
              
                
                ?>
                
                <?php 
                
                 if(isset($_SESSION["answer"]))
               {
                   //check selected answers
                   for($i=1;$i<= sizeof($_SESSION["answer"]);$i++)
                   {
                       //load answer and then compare with given answer
                       $answer="";
                       $res= mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]'&& question_no=$i");
                       while ($row = mysqli_fetch_array($res))
                       {
                           $answer=$row["answer"];  //load from mysqli table
                       }
                       if(isset($_SESSION["answer"][$i]))// if user selected answer compare table answer and selected answer
                       {
                           if($answer==$_SESSION["answer"][$i])
                           {?>
               
                <p><span style="color:#027a36;"><?= "$i"."."." ".$_SESSION["answer"][$i]?></span></p>
                
                                       
                       <?php    }else{ ?>
                
                <p><span style="color:red; "><?= "$i"."."." " .$_SESSION["answer"][$i]?></span></p>
                <p><span style=";color:#027a36;"><?= "$i"."."." " .$answer?></span></p>
                    <?php       }
                       }else{
                           $wrong=$wrong+1;// if user not selected it is wrong by default
                       }
                   }
               }
                
                
                ?>
                
            </div>

        </div>
<?php
//store in table
//check exam start or not
if(isset($_SESSION["exam_start"]))
{
    $date=date("Y-m-d H:i:s");
    mysqli_query($link, "insert into exam_results(id,username,exam_type,total_question,correct_answer,wrong_answer,exam_time)values(NULL,'$_SESSION[username]','$_SESSION[exam_category]','$count','$correct','$wrong','$date')") or die(mysqli_error($link));
}
if(isset($_SESSION["exam_start"]))
{
    unset($_SESSION["exam_start"]);//expire this session, result will generate only one time 
                                  //otherwise it will store data second time
    ?>
<script type="text/javascript">
    window.location.href=window.location.href;
</script>
    <?php
}

?>

  <?php
  include 'footer.php';
  ?>

