<?php
  $id_tv = $_GET['id'];
  include "conf/info.php";
  include_once "api/api_tv_id.php";
  include_once "api/api_tv_video_id.php";
  $title = "Watch TV (".$tv_id->original_name.")";
  include_once "header.php";
?>
    <?php
    if(isset($_GET['id'])){
      $id_tv = $_GET['id'];
      $rel = date('d F Y', strtotime($tv_id->last_air_date)); 
    ?>
    <h1 class="text-center"><?php echo $tv_id->original_name ?></h1>
    <?php
      echo "<h5 class='text-center mb-5'>~ <sub>Last Air Date</sub> : <span>".$rel."</span> ~</h5>";
    ?>

<div class="container">
  <div class="row">
    <?php 
      foreach($tv_video_id->results as $video){
        echo '<div class="col-md-6">
                <iframe width="560" height="315" src="'."https://www.youtube.com/embed/".$video->key.'" frameborder="0" allowfullscreen></iframe>
              </div>';
      }
     ?>"
       </div>
     </div>

    <hr>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="<?php echo $imgurl_1.$tv_id->poster_path ?>" class="img-fluid" alt="">
        </div>
        <div class="col-md-8">
          <h4>Overview</h4>
          <p><?php echo $tv_id->overview ?></p>
          <h4>First Air Date</h4>
          <p><?php echo $tv_id->first_air_date ?></p>
          <h4>Last Air Date</h4>
          <p><?php echo $tv_id->last_air_date ?></p>
          <h4>Runtime</h4>
          <p><?php echo $tv_id->episode_run_time[0] ?> Minutes</p>
          <h4>Genre</h4>
          <p><?php echo $tv_id->genres[0]->name ?></p>
          <h4>Vote Average</h4>
          <p><?php echo $tv_id->vote_average ?></p>
          <h4>Vote Count</h4>
          <p><?php echo $tv_id->vote_count ?></p>
          <h4>Status</h4>
          <p><?php echo $tv_id->status ?></p>
          <h4>Network</h4>
          <p><?php echo $tv_id->networks[0]->name ?></p>
          <h4>Number of Seasons</h4>
          <p><?php echo $tv_id->number_of_seasons ?></p>
          <h4>Number of Episodes</h4>
          <p><?php echo $tv_id->number_of_episodes ?></p>
          <h4>Production Companies</h4>
          <p><?php echo $tv_id->production_companies[0]->name ?></p>
          <h4>Production Countries</h4>
          <p><?php echo $tv_id->production_countries[0]->name ?></p>
          <h4>Popularity</h4>
          <p><?php echo $tv_id->popularity ?></p>
          <h4>Vote Average</h4>
          <p><?php echo $tv_id->vote_average ?></p>
          <h4>Vote Count</h4>
          <p><?php echo $tv_id->vote_count ?></p>
        </div>
      </div>
    </div>
    

    <h3 style="text-align:center; margin:20px;">Similar Movies</h3>
      <ul>
        <div class="container">
          <div class="row">
      <?php
        $count = 4;
        $output=""; 
        foreach($tv_id_similar->results as $sim){
          $output.='<div class="col-md-4">
                      <div class="card">
                        <div class="card-body">
                          <img src="http://image.tmdb.org/t/p/w500'.$sim->backdrop_path.'" alt="" class="card-img-top" >
                          <h4 class="card-title">'.$sim->original_name.'</h4>
                          <a href="movie.php?id='.$sim->id.'" class="btn btn-primary">Selengkapnya</a>
                        </div>
                      </div>
                    </div>';
                if($count <= 0){
                  break;
                  $count--;
                }
        }
        
        echo $output;
      ?>
            </div>
          </div>
      </ul>

    
    <?php 
    } else{
      echo "<h5>Movie tidak ditemukan.</h5>";
    }
    ?>

<?php
  include_once "footer.php";
?>