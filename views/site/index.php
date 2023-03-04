<?php

/** @var yii\web\View $this */

use yii\web\View;

$this->title = 'Jamila Sultana Foundation';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">JSF Offline!</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <video id="vid" width="500" height="440" autoplay controls="false">
                <source src="/prepare.mp4" type="video/mp4">
                <source src="/prepare.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        </div>

    </div>
</div>
<style>
    video::-webkit-media-controls {
        display: none;
    }

    /* Could Use thise as well for Individual Controls */
    video::-webkit-media-controls-play-button {
    }

    video::-webkit-media-controls-volume-slider {
    }

    video::-webkit-media-controls-mute-button {
    }

    video::-webkit-media-controls-timeline {
    }

    video::-webkit-media-controls-current-time-display {
    }
</style>


<?php

$js = <<<JS
    //For Firefox we have to handle it in JavaScript
    var vids = $("video");
    $.each(vids, function () {
        this.controls = false;
    });

    $("video").click(function () {
        console.log(this);
        if (this.paused) {
            this.play();
        } else {
            this.pause();
        }
    });
    JS;
$this->registerJs($js, View::POS_END, "select-2-js")
?>