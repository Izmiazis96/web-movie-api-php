<?php
$input=$_GET['search'];
$channel=$_GET['channel'];
$search=$input;
include_once "conf/info.php";
$title = 'Result Search | '.$input;
include_once "header.php";
include_once "api/api_search.php";
?>
    <h3 class="text-center mb-5 mt-5">Result Search: <em><?php echo $input?></em></h3>
    <hr>
    <ul>
		<div class="container">
			<div class="row">
<?php
	if($channel=="movie"){	
                foreach($search->results as $results){
			$title 		= $results->title;
			$id 		= $results->id;
			$release	= $results->release_date;
			if (!empty($release) && !is_null($release)){
				$tempyear 	= explode("-", $release);
				$year 		= $tempyear[0];
				if (!is_null($year)){
					$title = $title.' ('.$year.')';
				}
			}
			$backdrop 	= $results->backdrop_path;
			if (empty($backdrop) && is_null($backdrop)){
				$backdrop =  dirname($_SERVER['PHP_SELF']).'/image/no-gambar.jpg';
			} else {
				$backdrop = 'http://image.tmdb.org/t/p/w300'.$backdrop;
			}
			//echo'<li><a href="movie.php?id=' . $id . '"><img src="'.$backdrop.'"><h4>'.$title.'</h4></a></li>';
				echo'<div class="col-md-4">
						<div class="thumbnail">
							<img src="'.$backdrop.'" alt="'.$title.'">
							<div class="caption">
								<h3>'.$title.'</h3>
								<p>'.$release.'</p>
								<p><a href="movie.php?id='.$id.'" class="btn btn-primary" role="button">View</a></p>
							</div>
						</div>
					</div>';
					
				}
				
        }elseif($channel=="tv"){
            foreach($search->results as $results){
			$title 		= $results->original_name;
			$id 		= $results->id;
			$release	= $results->first_air_date;
			if (!empty($release) && !is_null($release)){
				$tempyear 	= explode("-", $release);
				$year 		= $tempyear[0];
				if (!is_null($year)){
					$title = $title.' ('.$year.')';
				}
			}
			$backdrop 	= $results->backdrop_path;
			if (empty($backdrop) && is_null($backdrop)){
				$backdrop = $pathloc.'image/no-backdrop.png';
			} else {
				$backdrop = 'http://image.tmdb.org/t/p/w300'.$backdrop;
			}
			//echo '<li><a href="tvshow.php?id=' . $id . '"><img src="'.$backdrop.'"><h4>'.$title.'</h4></a></li>';
			echo'<div class="col-md-4">
					<div class="card">
						<div class="thumbnail img-fluid">
							<img src="'.$backdrop.'" alt="'.$title.'">
							<div class="caption">
								<h3>'.$title.'</h3>
								<p>'.$release.'</p>
								<p><a href="tvshow.php?id='.$id.'" class="btn btn-primary" role="button">View</a></p>
							</div>
						</div>
					</div>	
				</div>';
		}
        }
        ?>
		</div>
			</div>
        </ul>
 <?php
include_once('footer.php');
?>
