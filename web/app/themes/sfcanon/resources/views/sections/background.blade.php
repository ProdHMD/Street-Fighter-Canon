<div class="canvas-container" id="canvas">
    <div class="canvas<?php if (is_page('home')) echo ' show'; ?>" id="home">
        <video src="@asset('images/videos/sfcanon-home-bg.mp4')" class="background-media" playsinline muted autoplay loop preload="none"></video>
    </div>

    <div class="canvas<?php if (is_page('timeline')) echo ' show'; ?>" id="timeline">
        <video src="@asset('images/videos/sfcanon-timeline-bg.mp4')" class="background-media" playsinline muted autoplay loop preload="none"></video>
    </div>

    <div class="canvas<?php if (is_page('characters')) echo ' show'; ?>" id="characters">
        <video src="@asset('images/videos/sfcanon-characters-bg.mp4')" class="background-media" playsinline muted autoplay loop preload="none"></video>
    </div>

    <div class="canvas<?php if (is_page('about')) echo ' show'; ?>" id="about">
        <video src="@asset('images/videos/sfcanon-about-bg.mp4')" class="background-media" playsinline muted autoplay loop preload="none"></video>
    </div>

    <div class="canvas-color"></div>
</div>