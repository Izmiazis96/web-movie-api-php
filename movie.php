<?php
  include "conf/info.php";
  
  $id_movie = $_GET['id'];
    include_once "api/api_movie_id.php";
    include_once "api/api_movie_video_id.php";
    include_once "api/api_movie_similar.php";
    $title = "Detail Movie (".$movie_id->original_title.")";
    include_once "header.php";
  
?>

    <?php 
    if(isset($_GET['id'])){
    $id_movie = $_GET['id']; 
    ?>
    <h1 style="text-align:center; margin:20px;"><?php echo $movie_id->original_title ?></h1>
    <?php
      echo "<h5 style='text-align:center; margin:20px;'>~ ".$movie_id->tagline." ~</h5>";
    ?>

    <div class="container">
            <div class="row">
        <?php 
          foreach($movie_video_id->results as $video){
          
            
            echo '<div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9 ">
                      <iframe class="embed-responsive-item" src="'."https://www.youtube.com/embed/".$video->key.'" frameborder="0" allowfullscreen></iframe>
                      
                    </div>                            
                  </div>';
          }
        ?>      
      </div>
    </div>

     

    <!-- <hr> -->

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img src="<?php echo $imgurl_1.$movie_id->poster_path ?>" class="img-fluid" alt="">
        </div>
        <div class="col-md-8">
          <h4>Overview</h4>
          <p><?php echo $movie_id->overview ?></p>
          <h4>Release Date</h4>
          <p><?php echo $movie_id->release_date ?></p>
          <h4>Runtime</h4>
          <p><?php echo $movie_id->runtime ?> Minutes</p>
          <h4>Genre</h4>
          <p><?php echo $movie_id->genres[0]->name ?></p>
          <h4>Vote Average</h4>
          <p><?php echo $movie_id->vote_average ?></p>
          <h4>Vote Count</h4>
          <p><?php echo $movie_id->vote_count ?></p>
          <h4>Popularity</h4>
          <p><?php echo $movie_id->popularity ?></p>
          <h4>Status</h4>
          <p><?php echo $movie_id->status ?></p>
          <h4>Production Companies</h4>
          <p><?php echo $movie_id->production_companies[0]->name ?></p>
          <h4>Production Countries</h4>
          <p><?php echo $movie_id->production_countries[0]->name ?></p>
          <h4>Original Language</h4>
          <p><?php echo $movie_id->original_language ?></p>
          <h4>Budget</h4>
          <p><?php echo $movie_id->budget ?></p>
          <h4>Revenue</h4>
          <p><?php echo $movie_id->revenue ?></p>
          <h4>Homepage</h4>
          <p><?php echo $movie_id->homepage ?></p>
        </div>
      </div>
    </div>

          <!-- <img src="<?php echo $imgurl_2 ?><?php echo $movie_id->poster_path ?>">
          <p>Title : <?php echo $movie_id->original_title ?></p>
          <p>Tagline : <?php echo $movie_id->tagline ?></p>
          <p>Genres : 
              <?php
                foreach($movie_id->genres as $g){
                  echo '<span>' . $g->name . '</span> ';
                }
              ?>
          </p>
          <p>Overview : <?php echo $movie_id->overview ?></p>
          <p>Release Date : <?php $rel = date('d F Y', strtotime($movie_id->release_date)); echo $rel ?>
          <p>Production Companies :
              <?php
                foreach($movie_id->production_companies as $pc){
                  echo $pc->name." ";
                }
              ?>
          </p>
          <p>Production Countries:
              <?php
                foreach($movie_id->production_countries as $pco){
                  echo $pco->name. "&nbsp;&nbsp;" ;
                }
              ?>
          </p>
          <p>Budget: $ <?php echo $movie_id->budget ?> </p>
          <p>Vote Average : <?php echo $movie_id->vote_average ?></p>
          <p>Vote Count : <?php echo $movie_id->vote_count ?></p>

    <hr> -->
    <h3 style="text-align:center; margin:20px;">Similar Movies</h3>
      <ul>
        <div class="container">
          <div class="row">
      <?php
        $count = 4;
        $output=""; 
        foreach($movie_similar_id->results as $sim){
        
          $output.='<div class="col-md-4">
                      <div class="card">
                        <div class="card-body">
                          <img src="http://image.tmdb.org/t/p/w500'.$sim->backdrop_path.'" alt="" class="card-img-top" >
                          <h4 class="card-title">'.$sim->title.' ('.substr($sim->release_date, 0, 4).')</h4>
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