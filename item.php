<?php
    ini_set('display_errors',0);
    require 'header.php';
    
    $sql = sprintf("SELECT * FROM userSubmit WHERE submitID = %s ", $_GET['id']);
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    
    if($_REQUEST['sendComment'] == 1){
        $commentSql = sprintf("insert into usercomments(`user_id`, `name`, `comment`, `vote`, `date_submitted`) values(%s,'%s','%s',%s, now())", 
                $_REQUEST['id'], 
                $_REQUEST['username'],
                $_REQUEST['comment'],
                1);
        $result = $conn->query($commentSql);
    }
    
    $getComments = sprintf("select * from usercomments where user_id = %s order by date_submitted limit 10", $_GET['id']);
    $result = $conn->query($getComments);
?>

<div class="row itemPage">
    <div class="thumbnail">
        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
        <div class="caption-full">
            <h3><?php echo $row['fname'] . " " . $row['lname']; ?></h3>
            <h4 class="pull-right"><?php echo "Goal: $" . number_format($row['fundAmt'],2); ?></h4> <!-- Funds amount -->
            <h4>
                <a href="#"><?php echo $row['title']; ?></a> <!-- title of the campaign -->
            </h4>
            <?php echo nl2br($row['description']); ?>
        </div>
        <div>
            <p class="pull-right">Current: $<?php echo number_format($row['amtRaised'], 2); ?></p>
                <?php echo "Ends at " . $row['deadline']; ?>
            </p>
        </div>
    </div>
    <?php 
        while($commentRow = $result->fetch_assoc()) {
            echo '<div class="well">' . $commentRow['name'] . '<hr><div class="row"><div class="col-md-12">
                    <p>' . nl2br($commentRow['comment']) .
                    '</p>' . $commentRow['date_submitted'] . '</div></div></div>';
        }
    ?>
        <div class="text-right">
            <a class="btn btn-success" onclick="revealComment()" style="margin-bottom:20px;">Leave a Comment</a>
        </div>

        <div class="hiddenDiv thumbnail">
            <form action="item.php?id=<?php echo $row['submitID']; ?>" method="POST">
                <div id="commentDiv">
                    <input id="submitVal" type="hidden" value="0" name="sendComment">
                    <label for="un">
                        Name
                    </label>
                    <input id="un" type="text" name="username">
                    <br>
                    <label for="comment">
                        Comment
                    </label>
                    <textarea id="comment" name="comment">
                    </textarea>
<!--                        <label>
                        <input type="radio" name="vote" value="1"/>.
                        <img src=""
                    </label>-->
                    <br>
                </div>
                <input class="btn btn-info pull-right" id="submitButton" type="submit" value="Submit" onclick="changeVal()">
            </form>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>
