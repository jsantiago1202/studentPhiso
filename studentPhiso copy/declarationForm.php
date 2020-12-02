<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    if(isset($_SESSION['UserLogin']))
    {
        /*echo "Welcome ". $_SESSION['UserLogin'];*/
        echo "Welcome ". $_SESSION['Names'].$_SESSION['StudentID'];
    }
    else
    {
        header("location:login.php");
    }
    include_once("connection.php");
    $con = connection();
    $studID = $_SESSION['StudentID'];

    if(isset($_POST['submit']))
    {
        // for health Declaration variable
        $height =$_POST['height'];
        $weight =$_POST['weight'];
        $condition =$_POST['condition'];
        $hospitalized =$_POST['hospitalized'];
        $date =$_POST['date'];
        $vitamins =$_POST['vitamins'];
        $disablities = $_POST['disablities'];
        $disablitiesType =$_POST['disablitiesType'];

        // for savings declaration variable
        $mother = $_POST['mother'];
        $motherwork = $_POST['motherWork'];
        $motherincome = $_POST['motherIncome'];
        $father = $_POST['father'];
        $fatherwork = $_POST['fatherWork'];
        $fatherincome = $_POST['fatherIncome'];
        $yearlyincome = $_POST['yearlyIncome'];

        // for students declaration variable
        $studentwork = $_POST['studentWork'];
        $studentincome = $_POST['studentIncome'];
        $studentyearlyincome = $_POST['studentyearlyIncome'];

        // query for inserting the declaration of the students
        $sql = "insert into tbl_studentdeclaration(height,weight,healthCondition,hospitalized,date,vitamins,disablities,disablitiesType,smother,smotherwork,smotherincome,sfather,sfatherwork,sfatherincome,syearlyincome,studwork,studincome,studyearlyincome,studID) values('$height','$weight','$condition','$hospitalized','$date','$vitamins','$disablities','$disablitiesType','$mother','$motherwork','$motherincome','$father','$fatherwork','$fatherincome','$yearlyincome','$studentwork','$studentincome','$studentyearlyincome','$studID')";
        $con->query($sql) or die($con->error);


        // $query = "update tbl_user set status='Ok', points = '5' where id = '$studID'";
        $query = "update tbl_user set status='Waiting' where id = '$studID'";
        $con->query($query) or die($con->error);
      
        header("location:login.php");
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <form action="" method="post">
        <center><h1>Student Declaration</h1></center>
    <!-- for health declaration -->
    <div class="health"> 
    <h1>Health Area</h1><br><br>
        <label">Height (in cm) :</label><br>
            <input type="text" name="height" required><br><br>

        <label">Weight (in lb) :</label><br>
            <input type="text" name="weight" required><br><br>

        <label">Do you have any Health Condition ? 
            if none insert(N/A) :
        </label> <br>
            <input type="text" name="condition" required><br><br>

        <label">Have you been Hospitalized ? </label><br>
            Yes <input type="radio" id="yes" name="hospitalized" value="Yes">
            No <input type="radio" id="yes" name="hospitalized" value="No"><br><br>

        <label>If yes, When?</label><br>
        <label>Date:  </label>
            <input type="date" name="date" id="date" disabled="disabled"><br><br>

        <!-- script for disable enabled Hospitalized-->
    <script type="text/javascript">
        $(function()
        {
            $("input[name='hospitalized']").click(function()
            {
                if($("#yes").is(":checked"))
                {
                    $("#date").removeAttr("disabled");
                    $("#date").focus();
                }
                else
                {
                    $("#date").attr("disabled", "disabled");
                }
            }); 
        });
    </script>


        <label">Vitamins Taken if none insert(N/A) : </label><br>
            <input type="text" name="vitamins" required><br><br>

        <label">Do you have disablities? </label><br>
            Yes <input type="radio" id="disablitiesYes" name="disablities" value="Yes">
            No <input type="radio" id="disablitiesYes" name="disablities" value="No"><br><br> 
        <label for="">If yes write down: </label><br> 

        <input type="text" name="disablitiesType" id="disablities" disabled = "disabled">  

        
        <!-- script for disable enabled Disablities-->
    <script type="text/javascript">
        $(function()
        {
            $("input[name='disablities']").click(function()
            {
                if($("#disablitiesYes").is(":checked"))
                {
                    $("#disablities").removeAttr("disabled");
                    $("#disablities").focus();
                }
                else
                {
                    $("#disablities").attr("disabled", "disabled");
                }
            }); 
        });
    </script>
    <br><br> 
    <button type="submit" name="submit">Submit Form</button>
    </div>
    
    <!-- for savings declaration -->
    <div class="savings">
        <h1>Savings</h1>

        <h3>For parents</h3>

        <!-- for mother savings -->
        <label>Mother Name: </label>
            <input type="text" name="mother" required> <br><br>
        

        <label>Name of Work: </label>
            <input type="text" name="motherWork" required> <!-- italic moto sa baba neto --><label>If none type (N/A)</label><br><br>
        
        

        <label>Monthly Income: </label>
            <input type="text" name="motherIncome" required> <!-- italic moto sa baba neto --><label>If none type (0)</label> <br><br>
       
        

            <br><br>
        <!-- for father savings -->
        <label>Father Name: </label>
            <input type="text" name="father" required> <br><br>

        <label>Name of Work: </label>
            <input type="text" name="fatherWork" required> <!-- italic moto sa baba neto --><label>If none type (N/A)</label> <br><br>
       
        
        <label>Monthly Income: </label>
            <input type="text" name="fatherIncome" required> <!-- italic moto sa baba neto --><label>If none type (0)</label><br><br>
            
        

        <!-- for all -->
        <br><br>
        <label>Yearly Income: </label>
            <input type="text" name="yearlyIncome" required> <!-- italic moto sa baba neto --><label>If none type (0)</label><br><br>
           
        

    </div>

    <div class="students">
        <h1>Students</h1>

        <label>Nature of Work: </label>
            <input type="text" name="studentWork" required> <!-- italic moto sa baba neto --><label>If none type (N/A)</label> <br><br>
       
        
        <label>Monthly Income: </label>
            <input type="text" name="studentIncome" required> <!-- italic moto sa baba neto --><label>If none type (0)</label><br><br>

        <label>Yearly Income: </label>
            <input type="text" name="studentyearlyIncome" required> <!-- italic moto sa baba neto --><label>If none type (0)</label><br><br>
    </div>

    </form>
</body>
</html>