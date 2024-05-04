<?php 
include 'top.php';

$fromEmail = "eflynn10@uvm.edu";

$dataIsGood= false;
$errorMessage = '';
$message = '';

$firstName='';
$lastName='';
$email = '';
$experience = 'No';
$europe = 1;
$asia = 0;
$africa = 0;
$america = 0;
$reason = '';

function getData($field){
    if(!isset($_POST[$field])){
        $data="";
    }
    else{
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString){
    return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    print PHP_EOL . '<!-- Starting Sanitization -->' . PHP_EOL;

    $firstName=getData('txtFirstName');
    $lastName=getData('txtLastName');
    $email = getData('txtEmail');
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $experience = getData('radExperience');
    $europe= (int) getData('chkEurope');
    $asia = (int) getData('chkAsia');
    $africa = (int) getData('chkAfrica');
    $america = (int) getData('chkAmerica');
    $reason=getData('txtReason');

    if($firstName ==''){
        $errorMessage .= '<p class = "mistake"> Please type in your first name. </p>';
        $dataIsGood = false;
    } elseif(!verifyAlphaNum($firstName)){
        $errorMessage .= '<p class ="mistake">Your first name contains invalid characters, please just use letters.</p>';
        $dataIsGood = false;
    }

    if($lastName ==''){
        $errorMessage .= '<p class = "mistake"> Please type in your last name. </p>';
        $dataIsGood = false;
    } elseif(!verifyAlphaNum($lastName)){
        $errorMessage .= '<p class ="mistake">Your last name contains invalid characters, please just use letters.</p>';
        $dataIsGood = false;
    }

    if($email ==''){
        $errorMessage .= '<p class = "mistake"> Please type in your email address. </p>';
        $dataIsGood = false;
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorMessage .= '<p class ="mistake">Your email address contains invalid characters.</p>';
        $dataIsGood = false;
    }

    if($experience != "No" AND $experience != "Yes" AND $experience != "NotSure"){
        $errorMessage .= '<p class ="mistake">Tell us about your experience at the olympics.</p>';
        $dataIsGood = false;
    }

    $totalChecked = 0;

    if($europe !=1) $europe = 0;
    $totalChecked += $europe;

    if($asia !=1) $asia = 0;
    $totalChecked += $asia;

    if($africa !=1) $africa = 0;
    $totalChecked += $africa;

    if($america !=1) $america = 0;
    $totalChecked += $america;

    if($totalChecked == 0){
        $errorMessage .= '<p class ="mistake">Please choose at least one checkbox.</p>';
        $dataIsGood = false;
    }

    if($reason ==''){
        $errorMessage .= '<p class = "mistake"> Please type in what you think about the Olympics. </p>';
        $dataIsGood = false;
    } elseif(!verifyAlphaNum($reason)){
        $errorMessage .= '<p class ="mistake">Text contains invalid characters, please just use letters.</p>';
        $dataIsGood = false;
    }

    print '<!-- Start Saving -->';
    if($dataIsGood){
        $sql = 'INSERT INTO tblHiring
        (fldFirstName, fldLastName, fldEMail, fldExperience, fldBasque, fldSpanish, fldEnglish, fldOther, fldReason)
        VALUES (?,?,?,?,?,?,?,?,?)';
        $data = array($firstName,$lastName,$email,$experience,$europe,$asia,$africa,$america,$reason);

        try{
            $statement = $pdo->prepare($sql);
            if($statement->execute($data)){
                $message = '<h2>Thank you for filling out the form</h2>';
                $message .= '<p>Your information was successfully saved.</p>';
            } else{
                $message = '<p>Record was NOT successfully saved, please try again.</p>';
                $dataIsGood = false;
            }
        } catch (PDOException $e){
            $message .= '<p>Couldn\'t insert the record, please contact someone</p>';
        }

        $to = $_POST['txtEmail']; 
        $subject = "Olympic Games Survey"; 
        
        $emailBody = "Dear {$firstName} {$lastName},\n\n";
        $emailBody .= "Thank you for completing our survey.\n";
        
        $headers = "From: $fromEmail" . "\r\n";
        $headers .= "Reply-To: $fromEmail" . "\r\n";
        
        if (mail($to, $subject, $emailBody, $headers)) {
            $message = '<h2>Thank you for filling out the form</h2>';
            $message .= '<p>Your information was successfully saved.</p>';
        } else {
            $message = '<p>Failed to send email.</p>';
        }
    }

}

?>

    <body>
        <main>
            <?php
            print $message;
            print $errorMessage;

            print '<p>Post Array:</p><pre>';
            print_r($_POST);
            print '</pre>';
            ?>
            <section>
                <h2>Tell us what you think!</h2>
                <p>We would love to hear about your experiences with the olympics: </p>
            </section>
            <form action="#" method="POST">
                <fieldset>
                    <legend>Contact Information</legend>
                    <p>
                        <label for="txtFirstName">First Name:</label>
                        <input type="text" name="txtFirstName" id="txtFirstName"
                        value = "<?php print $firstName; ?>" required>
                    </p>
                    <p>
                        <label for="txtLastName">Last Name:</label>
                        <input type="text" name="txtLastName" id="txtLastName"
                        value = "<?php print $lastName; ?>" required>
                    </p>
                    <p>
                        <label for="txtEmail">Email:</label>
                        <input type="text" name="txtEmail" id="txtEmail"
                        value = "<?php print $email; ?>" required>
                    </p>
                </fieldset>

                <fieldset>
                <p>Have you ever gone to the Olympic Games?</p>
   
                    <p>
                        <input type="radio" name="radExperience" value="No" id="radExperienceNo" 
                        <?php if ($experience== 'No') print 'checked'; ?> required>
                        <label for="radExperienceNo">No</label>
                    </p>

                    <p>
                        <input type="radio" name="radExperience" value="Yes" id="radExperienceYes" 
                        <?php if ($experience == 'Yes') print 'checked'; ?> required>
                        <label for="radExperienceYes">Yes</label>
                    </p>

                    <p>
                        <input type="radio" name="radExperience" value="NotSure" id="radExperienceYes" 
                        <?php if ($experience == 'NotSure') print 'checked'; ?> required>
                        <label for="radExperienceYes">Not Sure</label>
                    </p>
                    
                </fieldset>

                <fieldset>

                    <p>Which Continents have you visited?: </p>
                    <p>
                        <input type="checkbox" id="chkEurope" name="chkEurope" value="1"
                        <?php if(isset($_POST['chkEuroep']) && ($_POST['chkEurope'] == 1)) print 'checked'; ?> >
                        <label for="chkEurope">Europe</label>
                    </p>
                    <p>
                        <input type="checkbox" id="chkAsia" name="chkAsia" value="1"
                        <?php if(isset($_POST['chkAsia']) && ($_POST['chkAsia'] == 1)) print 'checked'; ?> >
                        <label for="chkAsia">Asia</label>
                    </p>
                    <p>
                        <input type="checkbox" id="chkAfrica" name="chkAfrica" value="1"
                        <?php if(isset($_POST['chkAfrica']) && ($_POST['chkAfrica'] == 1)) print 'checked'; ?> >
                        <label for="chkAfrica">Africa</label>
                    </p>
                    <p>
                        <input type="checkbox" id="chkAmerica" name="chkAmerica" value="1"
                        <?php if(isset($_POST['chkAmerica']) && ($_POST['chkAmerica'] == 1)) print 'checked'; ?> >
                        <label for="chkAmerica">America</label>
                    </p>
                    
                </fieldset>
                <fieldset>
                    <p>What is your favourite event?</p>
                    <select name="sports">
                        <option value="lstFootball">Football</option>
                        <option value="lstGolf">Golf</option>
                        <option value="lstVolleyball">Volleyball</option>
                        <option value="lstBasketball">Basketball</option>
                        <option value="lstArchery">Archery</option>
                        <option value="lstTrack">Track/Field</option>
                        <option value="lstSwimming">Swimming</option>
                        <option value="lstTennis">Tennis</option>
                        <option value="lstFieldHockey">Field Hockey</option>
                        <option value="lstRowing">Rowing</option>
                    </select>
                </fieldset>
                <fieldset>
                    <p>
                        <label for="txtReason">Tell us what you like the most about the Olympics: </label>
                        <textarea id="txtReason" name="txtReason" tabindex=500><?php print $reason;?></textarea>
                    </p>
                </fieldset>
                <fieldset>
                    <p>
                        <input type="submit"> 
                    </p>
                </fieldset>
            </form>
        </main>
        <?php include 'footer.php'; ?>
    </body>
</html>