<?php
include 'top.php';
?>
<main>
    <p>Create Table SQL</p>

    <pre>
    CREATE TABLE tblWorldRecords(
        pmkInfo INT AUTO_INCREMENT PRIMARY KEY,
        fldName VARCHAR(40),
        fldDate VARCHAR(40),
        fldEvent VARCHAR(100),
    	fldTime INT(9)
    )
    </pre>
    
    <pre>
    INSERT INTO tblWorldRecords (fldName, fldDate, fldEvent, fldTime) VALUES
("Bolt","08/05/2012","100 Meter",9.63),("Bolt","08/20/2008","200 Meter",19.30),
("Wanjiru","08/24/2008","Marathon","2:06:32"),("Tellent","08/11/2012","50km Rcae Walk",3:36:53)
    </pre>
    <pre>
    SELECT fldName, fldDate, fldEvent, fldTime FROM tblWorldRecords;
    </pre>

    <pre>
    CREATE TABLE tblHiring(
    pmkHiringId INT AUTO_INCREMENT PRIMARY KEY,
    fldFirstName VARCHAR(30),
    fldLastName VARCHAR(40),
    fldEMail VARCHAR(50),
    fldExperience VARCHAR(25),
    fldBasque TINYINT(1),
    fldSpanish TINYINT(1),
    fldEnglish TINYINT(1),
    fldOther TINYINT(1),
    fldReason VARCHAR(500)
    )
    </pre>

    <pre>
    INSERT INTO tblHiring
(fldFirstName, fldLastName, fldEMail, fldExperience, fldBasque, fldSpanish, fldEnglish, fldOther,fldReason)
VALUES ('Amaia','Rodriguez','sdf@uvm.edu','No',0,1,1,0,'fdg');
    </pre>
    </main>

    <?php include 'footer.php'; ?>
    </body>
    </html>
