<?php
    require 'header.php';

?>

<!-- Page Content -->

<div class="row">

    <div class="col-md-3">
        <p class="lead">Campaigns</p>
        <div class="list-group"> Sort By:
            <a href="#" class="list-group-item">Date Added</a>
            <a href="#" class="list-group-item">Deadline</a>
            <a href="#" class="list-group-item">Amount Needed</a>
        </div>
    </div>

    <div class="col-md-9">
<!--
        <div class="row carousel-holder">

            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="http://placehold.it/800x300" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="http://placehold.it/800x300" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="http://placehold.it/800x300" alt="">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

        </div>
      -->
        <div class="row">
            <!-- Content goes here -->


              <!--
            <div class="col-sm-4 col-lg-4 col-md-4">
                <h4><a href="#">Like this template?</a>
                </h4>
                <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
            </div>
          -->

          <?php
          function truncate($input, $maxWords, $maxChars)
          {
            $words = preg_split('/\s+/', $input);
            $words = array_slice($words, 0, $maxWords);
            $words = array_reverse($words);

            $chars = 0;
            $truncated = array();

            while(count($words) > 0)
            {
              $fragment = trim(array_pop($words));
              $chars += strlen($fragment);

              if($chars > $maxChars) break;

              $truncated[] = $fragment;
            }

            $result = implode($truncated, ' ');

            return $result . ($input == $result ? '' : '...');
          }
          // end function

          $sql = "SELECT * FROM userSubmit WHERE isUrgent = 'No' ";
          $result = $conn -> query($sql);

          if($result -> num_rows > 0){
            // output data of each row
            //
            while($row = $result -> fetch_assoc()){
              $id =  $row["submitID"];
              $dateSubmit = strtotime($row['dateSubmit']);
              $deadline = strtotime($row['deadline']);
              echo "<div class= 'col-sm-6 col-lg-6 col-md-6'>" .
              "<div class = 'thumbnail'>". "<img src='img/flagheader.jpg' alt=''>" .
              "<div class = 'caption'>" . "<h4 class='pull-right'>" .
              $row["fname"] . "</h4>". "<h4>" . "<a href='item.php?id=$id'>" .
              truncate($row['title'],10,30) . "</a>" . "</h4> <p>" . truncate($row['description'],20,50) . "</p> <p> Date Submitted: " .
              date('Y-m-d', $dateSubmit) . "</p> <p> Deadline: ". date('Y-m-d', $deadline) ." </p> </div> </div> </div>" ;
            } // end while
          } else {echo "No results found.";}
          $conn -> close();
          ?>

        </div>

    </div>
</div>
<?php
    require 'footer.php';
?>
