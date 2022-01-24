<h1 class="h1">Your application</h1>

<form method="" >
    <div class="row">
        <div class="col-25">
            <label>Full name:</label>
        </div>
        <div class="col-75">
            <input disabled type="text" name="practice_name" value="<?php echo $practice['practice_name'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label>Email address:</label>
        </div>
        <div class="col-75">
            <input disabled type="text" name="practice_email" value="<?php echo $practice['practice_email'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label>Phone number:</label>
        </div>
        <div class="col-75">
            <input disabled type="text" name="practice_phone" value="<?php echo $practice['practice_phone'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label>Education:</label>
        </div>
        <div class="col-75">
            <input disabled type="text" name="practice_education" value="<?php echo $practice['practice_education'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label>Practice type:</label>
        </div>
        <div class="col-75">
            <input disabled type="text" name="practice_type" value="<?php echo $practice['practice_type'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label>Knowledge in:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label class="left" for="customRange1">HTML</label>
            <input class="range" type="range" id="customRange1" name="practice_html" value="<?php echo $practice['practice_html'] ?>" disabled>
            <label class="right"><span id="demo"></span> %</label>
        </div>
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label class="left" for="customRange1">CSS</label>
            <input class="range" type="range" id="customRange2" name="practice_css" value="<?php echo $practice['practice_css'] ?>" disabled>
            <label class="right"><span id="demo2"></span> %</label>
        </div>
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label class="left" for="customRange1">Bootstrap</label>
            <input class="range" type="range" id="customRange3" name="practice_bootstrap" value="<?php echo $practice['practice_bootstrap'] ?>" disabled>
            <label class="right"><span id="demo3"></span> %</label>
        </div>
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label class="left" for="customRange1">PHP</label>
            <input class="range" type="range" id="customRange4" name="practice_php" value="<?php echo $practice['practice_php'] ?>" disabled>
            <label class="right"><span id="demo4"></span> %</label>
        </div>
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label class="left" for="customRange1">MySql</label>
            <input class="range" type="range" id="customRange5" name="practice_mysql" value="<?php echo $practice['practice_mysql'] ?>" disabled>
            <label class="right"><span id="demo5"></span> %</label>
        </div>
    </div>
</form>
<script>
    var slider = document.getElementById("customRange1");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }

    var slider2 = document.getElementById("customRange2");
    var output2 = document.getElementById("demo2");
    output2.innerHTML = slider2.value;

    slider2.oninput = function() {
        output2.innerHTML = this.value;
    }

    var slider3 = document.getElementById("customRange3");
    var output3 = document.getElementById("demo3");
    output3.innerHTML = slider3.value;

    slider3.oninput = function() {
        output3.innerHTML = this.value;
    }

    var slider4 = document.getElementById("customRange4");
    var output4 = document.getElementById("demo4");
    output4.innerHTML = slider4.value;

    slider4.oninput = function() {
        output4.innerHTML = this.value;
    }

    var slider5 = document.getElementById("customRange5");
    var output5 = document.getElementById("demo5");
    output5.innerHTML = slider5.value;

    slider5.oninput = function() {
        output5.innerHTML = this.value;
    }
</script>