<?php
  include "conf/info.php";
  $title="TV Series";
  include_once "header.php";
?>

    <?php
      include_once "api/api_tv.php";
    ?>
        <h1 style="text-align:center; margin:20px;">~ On Air TV Show ~</h1>
        <hr>
        <div class="container">

          <div class="row">  
            <?php
              foreach($tv_onair->results as $tp){
                $dd = date('d F Y', strtotime($tp->first_air_date));
            echo '<div class="col-md-3 col-sm-6 ">
                    <div class="card text-white bg-primary mb-4">
                    <img class="card-img-top img-fluid" src="http://image.tmdb.org/t/p/w500'. $tp->poster_path . '" alt="" style="">
                    <div class="card-body">
                      <h4 class="card-title">'.$tp->original_name.' </h4>
                      <p class="card-text text-center"> First Release : '.$dd.' || Popularity : '.round($tp->popularity).'</p>
                      <a href="tvshow.php?id= '.$tp->id.'" class="btn btn-success">Selengkapnya</a>
                    </div>
                    </div>
                  </div>';
              }
            ?>
          </div>
        </div>


        <h1 style="text-align:center; margin:20px;">~ Top Rated TV Show ~</h1>
        <hr>
        <ul>
          <div class="container">

            <div class="row">
            <?php
              foreach($tv_top->results as $tt){
                $de = date('d F Y', strtotime($tt->first_air_date));
                // echo '<li><a href="tvshow.php?id=' . $tt->id . '"><img src="'.$imgurl_2.''. $tt->poster_path . '"><h4>' . $tt->original_name . "</h4><h5><em>First Air Date : ".$tt->first_air_date."<br />Popularity : " . round($tt->popularity) . "</em></h5></a></li>";
  
                echo '<div class="col-md-3 col-sm-6 ">
                    <div class="card text-white bg-primary mb-4">
                    <img class="card-img-top img-fluid" src=" '.$imgurl_2.' '. $tt->poster_path . '" alt="" style="">
                    <div class="card-body">
                      <h4 class="card-title">'.$tt->original_name.' </h4>
                      <p class="card-text text-center"> First Release : '.$de.' || Popularity : '.round($tt->popularity).'</p>
                      <a href="tvshow.php?id= '.$tt->id.'" class="btn btn-success">Selengkapnya</a>
                    </div>
                    </div>
                  </div>';
              }
            ?>
            </div>
          </div>
        </ul>
      </div>
    </div>
    

<?php
  include_once "footer.php";
?>