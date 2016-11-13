<?php
    require 'header.php';    
?>
    
<h1>Submit Post</h1>

<form action="submit.php" method="POST" onsubmit="return validateForm();">
    <p>* must be completed</p>
    <div id="formDiv">
        <label for="titleInput" onclick="return validateForm();">
            Title*
        </label>
        <input class="required" type="text" name="title" id="titleInput">
        <br>
        <label for="fname">
            First Name*
        </label>
        <input class="required" type="text" name="fname" id="fname">
        <br>
        <label for="lname">
            Last Name*
        </label>
        <input class="required" type="text" name="lname" id="lname">
        <div class="radioButtons">
            <label id="urgentText">Is this urgent?*</label>
            <input type="radio" name="isUrgent" id="urgentY" value="Yes">
            <label for="urgentY">Yes</label>
            <input type="radio" name="isUrgent" id="urgentN" value="No" checked="checked">
            <label for="urgentN">No</label>
        </div>
        <label for="deadline">Deadline*</label>
        <input class="required" type="text" id="deadline" name="deadline">
        <div class="radioButtons">
            <label id="fundedText">Would you need to be funded?*</label>
            <input type="radio" name="isFunded" id="isFundedY" value="Yes">
            <label for="isFundedY">Yes</label>
            <input type="radio" name="isFunded" id="isFundedN" value="No" checked="checked">
            <label for="isFundedN">No</label>
        </div>
        <div id="fundDiv">
            <label for="fundAmt">How much do you require?*</label>
            <input id="fundAmt" type="number" min="0" name="fundAmt" value="0">
        </div>
        <div>
            <label>Description*</label>
            <textarea class="required" name="description"></textarea>
        </div>
    </div>
    <div id="buttonsDiv">
        <input type="button" onclick="window.history.go(-1);" value="Back">
        <div>
            <input id="submitRight" type="submit" value="Submit">
        </div>
    </div>
</form>
<?php
    require 'footer.php';
?>