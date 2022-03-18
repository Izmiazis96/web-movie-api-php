<?php
  include "conf/info.php";
  $title="Upcoming Movies";
  include_once "header.php";
?>
    <h1 style="text-align:center; margin:20px;">~ <?= $title; ?> ~</h1>
    <?php
      include_once "api/api_upcoming.php";
      $min = date('d F Y', strtotime($upcoming->dates->minimum));
      $max = date('d F Y', strtotime($upcoming->dates->maximum));
      echo "<h5 style='text-align:center; margin:20px;'><sub>coming soon from </sub> <span>". $min . "</span> , <sub>until</sub> <span>" . $max . "</span></h5>";
    ?>
    <hr>

    <div class="container">

      <div class="row">
        <?php
          //include_once "api/api_now.php";
          foreach($upcoming->results as $p):
          echo '<div class="col-md-3 col-sm-6">
                  <div class="card text-white bg-primary mb-4">
                  <img class="card-img-top img-fluid" src=" '.$imgurl_1.''. $p->poster_path . '" alt="" style="">
                    <div class="card-body">
                      <h4 class="card-title">'.$p->original_title.' (' . substr($p->release_date, 0, 4) . ')</h4>
                      <p class="card-text text-center"> Vote : '.$p->vote_average.' || Rate: '.$p->vote_count.' || Popular : '.round($p->popularity).'</p>
                      <p class="card-text text-center">Release : '. date('d F Y', strtotime($p->release_date)) .'</p>
                      <a href="movie.php?id= '.$p->id.'" class="btn btn-success">Selengkapnya</a>
                    </div>
                  </div>
                </div>';
          endforeach;
          ?>
      </div>
    </div>

<?php
  include_once "footer.php";
?>