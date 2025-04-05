<?php
$videos = [
    "VID_20250109_172317.mp4",
    "VID_20250109_172403.mp4",
    // ویدیوهای بیشتر را به این آرایه اضافه کنید
];

foreach ($videos as $video) {
    echo '<div class="reel">';
    echo '<video src="' . $video . '" muted></video>';
    echo '<div class="play-button">▶</div>';
    echo '</div>';
}
?>
