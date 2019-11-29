<?php
session_start();
include "../connection.php";

$question_no="";
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";

$count=0;
$ans="";
             //answer stored in session
$queno=$_GET["questionno"];

if(isset($_SESSION["answer"][$queno]))
{
   $ans=$_SESSION["answer"][$queno]; 
}
//questions remain
$res= mysqli_query($link, "select * from questions where category='$_SESSION[exam_category]'&& question_no=$_GET[questionno]");
$count= mysqli_num_rows($res);

//if exam is over
if($count==0)
{
    echo "over";
}else{
    //load questions
    while($row= mysqli_fetch_array($res))
    {
        $question_no=$row["question_no"];
        $question=$row["question"];
        $opt1=$row["opt1"];
        $opt2=$row["opt2"];
        $opt3=$row["opt3"];
        $opt4=$row["opt4"];
    }
    ?>
<!--display first question-->
<br>
<table >
    <tr>
        <td style="color: blue;font-weight: bold;font-size: 25px;padding: 25px 25px;" colspan="2">
            <?php echo "(".$question_no .")" ." ".$question;?>
        </td>
    </tr>
</table>
<!--display option-->
<table  style="color: blue; font-size: 23px;">
    <tr>
        <td> 
                                                                              <!--save selected data inside sesssion(selected value&question number-->
            <input type="radio" name="r1" id="r1" value="<?php echo $opt1; ?>" onclick="radioclick(this.value,<?php echo $question_no?>)"
            <?php
            if($ans==$opt1)
            {
                echo "checked";
            }    
            ?>>
        </td>
        <td style="padding-left: 20px;"><?php echo $opt1;?>
    </tr>
    <tr>
        <td>
            <input type="radio" name="r1" id="r1" value="<?php echo $opt2; ?>"onclick="radioclick(this.value,<?php echo $question_no?>)"
            <?php
            if($ans==$opt2)
            {
                echo "checked";
            }    
            ?>>
        </td>
        <td style="padding-left: 20px;"><?php echo $opt2;?>
    </tr>
    <tr>
        <td>
            <input type="radio" name="r1" id="r1" value="<?php echo $opt3; ?>"onclick="radioclick(this.value,<?php echo $question_no?>)"
            <?php
            if($ans==$opt3)
            {
                echo "checked";
            }    
            ?>>
        </td>
        <td style="padding-left: 20px;"><?php echo $opt3;?>
    </tr>
    <tr>
        <td>
            <input type="radio" name="r1" id="r1" value="<?php echo $opt4; ?>"onclick="radioclick(this.value,<?php echo $question_no?>)"
            <?php
            if($ans==$opt4)
            {
                echo "checked";
            }    
            ?>>
        </td>
        <td style="padding-left: 20px;"><?php echo $opt4;?>
    </tr>
</table>

<?php
}
?>