<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short Reels</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="content">
    <div class="reel-container">
      <?php
      $jsonData = file_get_contents('video.json');
      $data = json_decode($jsonData, true);

      $videos = $data['videos'] ?? [];
      $messages = $data['message'] ?? [];
      $images = $data['image'] ?? [];
      $des = $data['des'] ?? [];

      foreach ($videos as $index => $video) {
          echo '<section style="scroll-snap-align: start;"><div class="reel">';
          echo '<video src="' . $video . '" autoplay loop></video>'; 
          $msgText = $messages[$index] ?? '';
          $imageSrc = $images[$index] ?? '';
          echo '<img src="' . htmlspecialchars($imageSrc) . '" style=" position:absolute; border:2px solid red; border-radius:50px; top:10px; left:10px; right:0; width:50px; height:50px;">';
          echo '<p style="color:white; position:absolute; top:10px; left:70px; right:0;">' . htmlspecialchars($msgText) . '</p>';
          echo '<button style="background:red; width:100px; color:white; outline:none; border:none; position:absolute; top:15px; right:10px; float:right; padding:10px; font-weight:900; border-radius:5px;">LIKE</button>';
          echo '<div class="play-button">▶</div>';
          echo '<div class="stop-button" style="display: none;">.</div>';
          echo '<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" style="position:absolute; bottom:100px; right:20px; float:right;" width="50" height="50" viewBox="0,0,255.99431,255.99431"><g fill="#ff0000"><g transform="scale(10.66667,10.66667)"><path d="M8.56,4.94l-6.02,10.4l3.005,-14.193c0.097,-0.457 0.712,-0.544 0.931,-0.131zM9.67,7.02l1.2,2.25l-5.53,5.23zM14.16,6.15l-1.79,1.7l-1.52,-2.86l0.973,-1.674c0.198,-0.341 0.694,-0.329 0.876,0.021zM21.13,18.74l-8.8,5.12c-0.15,0.1 -0.33,0.14 -0.5,0.14c-0.17,0 -0.35,-0.04 -0.5,-0.13l-8.05,-4.65l15.367,-14.563c0.291,-0.276 0.771,-0.114 0.837,0.281l2.126,12.772c0.07,0.41 -0.12,0.82 -0.48,1.03z"></path></g></g></svg>';
          $desc = $des[$index] ?? '';
          echo '<p style="color:white; position:absolute; bottom:40px; left: 10px; float:left;">' . $desc . '</p>';
          echo '<div><p class="video-time">00:00</p><p class="video-times">00-00</p></div>';
          echo '<div class="progress-bar"><div class="progress"></div></div>';
          echo '</div></section>';
      }
      ?>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
