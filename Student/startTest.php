<?php

session_start();

if(isset($_SESSION['login_student'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_student']));
    $id = $dts[0];
    $name = $dts[1];
    
    require_once("../Db/dbconnect.php");
    
    $q = "SELECT verified FROM students WHERE s_id = $id";
    
    if($d = $conn->query($q)){
        
        $rslt = $d->fetch_assoc();
        
        if($rslt['verified'] == '1'){

        //varified account

?>

<!DOCTYPE html>
<html>
<head>
<title>Start test | NEET MOCK TEST</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../CSS/kel.css">
<style>
</style>
<script>
    function myFunction() {
      var x = document.getElementById("Demo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else { 
        x.className = x.className.replace(" w3-show", "");
      }
    }
</script>
</head>
<body>
<?php
    $uri = $_SERVER['REQUEST_URI'];
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<header class="w3-bar w3-green w3-padding">
<div class="w3-bar-item w3-xlarge" style="margin-right:40px;">NEET Mock test</div>

<a href="../logout" class="w3-right kel-hover">
<div class="w3-button w3-border">
    <i class="fa fa-sign-out"></i> LogOut
</div>
</a>

</header>
<?php
    $query = "SELECT button FROM enums WHERE data='accepting'";
    
    if($data = $conn->query($query)){
        
        $rslt = $data->fetch_assoc();
        if($rslt['button'] == '1' || $id == 24 || $id == 31){
            
?>
<div class="w3-content w3-light-gray" style="max-width:800px">
    <div class="w3-large w3-center w3-padding-16"><b>Rules and instructions for the test</b></div>
    <div class="w3-center w3-padding">
        Read the instructions and each and every details mentioned below carefully.
    </div>
    <div class="w3-padding">
        <table class="w3-table w3-white" border="1">
            <thead>
                <tr class="w3-blue"><th colspan="2" class="w3-center">Exam pattern</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>Number of questions</b></td>
                    <td>180 questions (MCQs)</td>
                </tr>
                <tr>
                    <td><b>Type of question</b></td>
                    <td>Objective type questions with 4 options and 1 correct answer</td>
                </tr>
                <tr>
                    <td><b>Duration of exam</b></td>
                    <td>The exam duration is 180 minutes (3 hours)</td>
                </tr>
                <tr>
                    <td><b>Subjects</b></td>
                    <td>Physics, Chemistry, and Biology (Botany & Zoology)</td>
                </tr>
                <tr>
                    <td><b>Languages</b></td>
                    <td>Gujarati and English</td>
                </tr>
                <tr>
                    <td><b>Marking</b></td>
                    <td>4 marks are awarded for each correct answer. 1 mark is deducted for each wrong answer</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="w3-padding">
        <div class="w3-padding-16">Highest possible marks are 720. Here is the mark distribution of the test.</div>
        <table class="w3-table w3-white w3-margin-bottom" border="1">
            <thead>
                <tr class="w3-blue"><th colspan="3" class="w3-center">Marking pattern</th></tr>
                <tr class="w3-blue"><th class="w3-center">Sub</th><th>No. of Questions</th><th>Marks</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w3-center">Physics</td>
                    <td class="w3-center">45</td>
                    <td class="w3-center">180</td>
                </tr>
                <tr>
                    <td class="w3-center">Chemistry</td>
                    <td class="w3-center">45</td>
                    <td class="w3-center">180</td>
                </tr>
                <tr>
                    <td class="w3-center">Zoology</td>
                    <td class="w3-center">45</td>
                    <td class="w3-center">180</td>
                </tr>
                <tr>
                    <td class="w3-center">Botany</td>
                    <td class="w3-center">45</td>
                    <td class="w3-center">180</td>
                </tr>
                <tr>
                    <td class="w3-center"><b>Total</b></td>
                    <td class="w3-center"><b>180</b></td>
                    <td class="w3-center"><b>720</b></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="w3-padding">
        <b>Read all the below instructions carefully</b>
        <ul>
            <li>Visit <a href="https://keltaking.co/Exams/Student/demo" target="_blank">this link</a> to get an idea of exam interface.</li>
            <li>Remember to <b>save your answer always click Save and next button.</b> Don't jump to another answer without saving it. It will not save your answer and the question will remain unattempted</li>
            <li>Do not refresh your webpage during your exam. Otherwise your answers will not be saved at all during exam.</li>
            <li>Do as the instruction says and it will be very easy way to answer exam</li>
            <li>Do not switch the tabs of browser. Else you will be <b>disqualified</b></li>
            <li>Make sure you have proper internet connection</li>
            <li>Select your preffered language for exam below</li>
        </ul>
    </div>
    <div class="w3-padding">
        <b>નીચેની બધી સૂચનાઓ કાળજીપૂર્વક વાંચો</b>
        <ul>
            <li>પરીક્ષા ઇન્ટરફેસ ને જોવા માટે <a href="https://keltaking.co/Exams/Student/demo">આ લિંક</a> ખોલો.</li>
            <li><b>પરીક્ષા માં જો તમે ઉમેરેલો જવાબ <span class="w3-light-gray w3-border ">save & next button </span> દબાવવા થી જ અમારી પાસે આવશે.</b> સીધો બીજા સવાલ પર દબાવતા આ સવાલ નો જવાબ જો દીધેલ હશે તો પણ તે જતો રહેશે અને સવાલ ઉત્તરરહિત રહેશે. આ વસ્તુ ની ખાસ કાળજી રાખજો. </li>
            <li>વેબસાઇટ ને ચાલુ પરીક્ષા વખતે રિફ્રેશ ના કરતા. નહીંતર તમારો એક પણ જવાબ સમસ્ત ૩ કલાક માં ક્યારેય પણ સ્વીકાર્ય નહિ રહે. </li>
            <li>જે પ્રમાણે ની સૂચના આપવામાં આવે છે એ પ્રમાણે કરશો તો કોઈ તકલીફ નહિ નડે. </li>
            <li>પરીક્ષા જે જગ્યા એ ચાલે છે ત્યાં થી નવી વિન્ડો ના ખોલતા. નહીંતર તમે પરીક્ષા માંથી <b>બાકાત ગણાશો.</b>  </li>
            
            <li>તમારી પાસે સારું ઈન્ટરનેટ કન્નેકશન હોય તેની કાળજી રાખવી. </li>
            <li>નીચે થી તમારી મનચાહી ભાષા પરીક્ષા માટે પસંદ કરો. </li>
        </ul>
    </div>
    <div id="error" class="w3-center w3-text-red"></div>
    <center><div class="loader" id="loader" style="display:none;"></div></center>
    <div class="w3-padding w3-center w3-large">
        <div class="w3-large"><b>Select language for the exam:</b></div>
        <form id="lang">
        <div class="w3-section">
            <input type="radio" name="lang" value="Gujarati"> Gujarati
        </div>
        <div class="w3-section">
            <input type="radio" name="lang" value="English"> English
        </div>
        </form>
    </div>
    <div class="w3-padding w3-center w3-large">
        <div class="w3-large"><b>Select your district(area):</b></div>
        <div class="w3-section">
            <select class="w3-input w3-border" id="dist">
                <option disabled selected>select your area</option>
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Bharuch">Bharuch</option>
                <option value="Gandhinagar">Gandhinagar</option>
                <option value="Surat">Surat</option>
                <option value="Vadodara">Vadodara</option>
                <option value="Other">Other</option>
            </select>
        </div>
    </div>
    <div class="w3-padding w3-center w3-margin-bottom">
        <button class="w3-button w3-theme kel-hover w3-margin-bottom" onclick="startexam(<?php echo $id ?>)">Start exam</button>
    </div>
</div>
<script src="JS/exambegin.js"></script>
<?php
            
        }
        else{
            
?>
<div class="w3-content w3-large w3-padding-32 w3-light-gray">
    <div class="w3-center">Due to the excessive registrations last night, test will be live from 5:00 P.M of 6th September to 11:59 PM of 8th September. Your results will be declared on 9th September After 11:00 PM. If you have any doubt then <a href="/Exams/contact">contact us.</a></div>
<div class="w3-large w3-center w3-padding-16"><b>Rules and instructions for the test</b></div>
    <div class="w3-center w3-padding">
        Read the instructions and each and every details mentioned below carefully.
    </div>
    <div class="w3-padding">
        <table class="w3-table w3-white" border="1">
            <thead>
                <tr class="w3-blue"><th colspan="2" class="w3-center">Exam pattern</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>Number of questions</b></td>
                    <td>180 questions (MCQs)</td>
                </tr>
                <tr>
                    <td><b>Type of question</b></td>
                    <td>Objective type questions with 4 options and 1 correct answer</td>
                </tr>
                <tr>
                    <td><b>Duration of exam</b></td>
                    <td>The exam duration is 180 minutes (3 hours)</td>
                </tr>
                <tr>
                    <td><b>Subjects</b></td>
                    <td>Physics, Chemistry, and Biology (Botany & Zoology)</td>
                </tr>
                <tr>
                    <td><b>Languages</b></td>
                    <td>Gujarati and English</td>
                </tr>
                <tr>
                    <td><b>Marking</b></td>
                    <td>4 marks are awarded for each correct answer. 1 mark is deducted for each wrong answer</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="w3-padding">
        <div class="w3-padding-16">Highest possible marks are 720. Here is the mark distribution of the test.</div>
        <table class="w3-table w3-white w3-margin-bottom" border="1">
            <thead>
                <tr class="w3-blue"><th colspan="3" class="w3-center">Marking pattern</th></tr>
                <tr class="w3-blue"><th class="w3-center">Sub</th><th>No. of Questions</th><th>Marks</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w3-center">Physics</td>
                    <td class="w3-center">45</td>
                    <td class="w3-center">180</td>
                </tr>
                <tr>
                    <td class="w3-center">Chemistry</td>
                    <td class="w3-center">45</td>
                    <td class="w3-center">180</td>
                </tr>
                <tr>
                    <td class="w3-center">Zoology</td>
                    <td class="w3-center">45</td>
                    <td class="w3-center">180</td>
                </tr>
                <tr>
                    <td class="w3-center">Botany</td>
                    <td class="w3-center">45</td>
                    <td class="w3-center">180</td>
                </tr>
                <tr>
                    <td class="w3-center"><b>Total</b></td>
                    <td class="w3-center"><b>180</b></td>
                    <td class="w3-center"><b>720</b></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="w3-padding">
        <b>Read all the below instructions carefully</b>
        <ul>
            <li>Visit <a href="https://keltaking.co/Exams/Student/demo" target="_blank">this link</a> to get an idea of exam interface.</li>
            <li>Remember to <b>save your answer always click Save and next button.</b> Don't jump to another answer without saving it. It will not save your answer and the question will remain unattempted</li>
            <li>Do not refresh your webpage during your exam. Otherwise your answers will not be saved at all during exam.</li>
            <li>Do as the instruction says and it will be very easy way to answer exam</li>
        </ul>
    </div>
    <div class="w3-padding">
        <b>નીચેની બધી સૂચનાઓ કાળજીપૂર્વક વાંચો</b>
        <ul>
            <li>પરીક્ષા ઇન્ટરફેસ ને જોવા માટે <a href="https://keltaking.co/Exams/Student/demo">આ લિંક</a> ખોલો.</li>
            <li><b>પરીક્ષા માં જો તમે ઉમેરેલો જવાબ <span class="w3-light-gray w3-border ">save & next button </span> દબાવવા થી જ અમારી પાસે આવશે.</b> સીધો બીજા સવાલ પર દબાવતા આ સવાલ નો જવાબ જો દીધેલ હશે તો પણ તે જતો રહેશે અને સવાલ ઉત્તરરહિત રહેશે. આ વસ્તુ ની ખાસ કાળજી રાખજો. </li>
            <li>વેબસાઇટ ને ચાલુ પરીક્ષા વખતે રિફ્રેશ ના કરતા. નહીંતર તમારો એક પણ જવાબ સમસ્ત ૩ કલાક માં ક્યારેય પણ સ્વીકાર્ય નહિ રહે. </li>
            <li>જે પ્રમાણે ની સૂચના આપવામાં આવે છે એ પ્રમાણે કરશો તો કોઈ તકલીફ નહિ નડે. </li>
        </ul>
    </div>
</div>

<?php
            
        }
        
    }
    else{
        echo "Something went wrong";   
    }
?>
<footer class="w3-padding-32 w3-theme-dark w3-center">
    &copy Kushang Shah
</footer>
</body>
</html>


<?php

        }
        else{
?>

<!-- Notverified account area -->

<?php
            include("Parts/nonverified.php");
        }
        
    }
    else{
        echo "Something went wrong, Please try again later"; 
    }
    
    
?>
<?php
    
    $conn->close();
}
else{
    header("Location:../logout"); 
}

?>
