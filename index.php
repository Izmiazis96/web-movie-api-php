<?php
  include "conf/info.php";
  $title="Welcome to";
  include_once "header.php";
?>
    <h1 style="text-align:center; margin:20px;">~ Top Rated Movies ~</h1>
    <hr>
  
    <div class="row">
      <?php
        include_once "api/api_toprated.php";
        foreach($toprated->results as $p):
        echo '<div class="col-md-3 col-sm-6 ">
          <div class="card text-white bg-primary mb-4">
          <img class="card-img-top img-fluid" src="http://image.tmdb.org/t/p/w500'. $p->poster_path . '" alt="" style="">
          <div class="card-body">
            <h4 class="card-title">'.$p->original_title.' </h4>
            <p class="card-text text-center">Release : '.substr($p->release_date, 0, 4).' || Vote : '.$p->vote_average.' || Total Vote : '.$p->vote_count.'</p>
            <a href="movie.php?id= '.$p->id.'" class="btn btn-success">Selengkapnya</a>
          </div>
          </div>
        </div>';
        endforeach;
        ?>
    </div>

<?php
  include_once "footer.php";
?>