<div class="canvas-container" id="canvas">
    <div class="canvas" id="home-video-container">
        <video src="@asset('images/videos/sfcanon-home-bg.mp4')" class="background-media opFade" id="home-video" playsinline webkit-playsinline muted autoplay loop preload="auto" hidden></video>
    </div>

    <div class="canvas" id="timeline-video-container">
        <video src="@asset('images/videos/sfcanon-timeline-bg.mp4')" class="background-media opFade" id="timeline-video" playsinline webkit-playsinline muted autoplay loop preload="auto" hidden></video>
    </div>

    <div class="canvas" id="characters-video-container">
        <video src="@asset('images/videos/sfcanon-characters-bg.mp4')" class="background-media opFade" id="characters-video" playsinline webkit-playsinline muted autoplay loop preload="auto" hidden></video>
    </div>

    <div class="canvas" id="about-video-container">
        <video src="@asset('images/videos/sfcanon-about-bg.mp4')" class="background-media opFade" id="about-video" playsinline webkit-playsinline muted autoplay loop preload="auto" hidden></video>
    </div>

    <div class="canvas-color"></div>
    <canvas width="1280" height="720" id="video-canvas"></canvas>
</div>