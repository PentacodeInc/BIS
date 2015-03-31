<div id="about" class="pictures">
    <div id="white">
        <div class="aboutTitle">Photo Gallery</div>

        <div class="album">
			<?php
				// albums to be excluded
				$exclude = ['Timeline Photos', 'Untitled Album', 'Profile Pictures', 'Cover Photos'];
				
				$foo = file_get_contents("http://graph.facebook.com/176802389183466/albums");
				$albums = json_decode($foo, true);
				
				// loop albums
				foreach($albums['data'] as $album){
					if (!in_array($album['name'], $exclude)) {
						echo "<div class='item'>";
						echo "<div class='pic'>";
						echo "<a href='".$album['link']."' target='blank'>";
						
						$bar = file_get_contents("http://graph.facebook.com/".$album['cover_photo']);
						$cover = json_decode($bar, true);
						
						echo "<img src='".$cover['source']."' />";
						echo "</a>";
						echo "</div>";
						echo "<div class='name'>".$album['name']."</div>";
						echo "</div>";
					}
				}
			?>
        </div>
        
    </div>
</div>