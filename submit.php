<?php
    ini_set('display_errors',0);
    require 'index.php';

    if(!$_POST['fundAmt']){
        $_POST['fundAmt'] = 0;
    }
    foreach($_POST as $key=>&$val){
        $val = (is_numeric($val)) ? intval($val) : mysql_real_escape_string($val);
    }
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
//    <!--fname,lname,isUrgent,deadline,isFunded,fundAmt,description,amtRaised,dateSubmit-->

    $sql = sprintf("insert into 
                    usersubmit(`title`,`fname`,`lname`,
                                `isUrgent`,`deadline`,`isFunded`,
                                `fundAmt`,`description`,`dateSubmit`)
                    values('%s','%s','%s',
                            '%s','%s','%s',
                            %s,'%s', now())
                    ",
                    $_POST['title'], $_POST['fname'], $_POST['lname'],
                    $_POST['isUrgent'], $_POST['deadline'], $_POST['isFunded'],
                    $_POST['fundAmt'], $_POST['description']
                    );
    $result=$conn->query($sql);
//    $row=$result->fetch_assoc(); use this if we are getting data back
?>
<h2>Post Submitted</h2>