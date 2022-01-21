<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<h1 class="h1">Apply For Practice</h1>
<form action="" method="post">
<div class="row">
    <div class="col-25"><label for="practice_name">Full name:</label></div>
    <div class="col-75">
        <input type="text" id="practice_name" name="practice_name" placeholder="Eg. John Doe" value="<?php echo $practice['practice_name'] ?>">
    </div>
</div>
<div class="row">
    <div class="col-25"><label for="practice_email">Email address:</label></div>
    <div class="col-75">
        <input type="email" id="practice_email" placeholder="Eg. john@example.com" name="practice_email" value="<?php echo $practice['practice_email'] ?>">
    </div>
</div>
<div class="row">
    <div class="col-25"><label for="practice_phone">Phone number:</label></div>
    <div class="col-75">
        <input type="tel" id="practice_phone" placeholder="Eg. +657 653 987" name="practice_phone" value="<?php echo $practice['practice_phone'] ?>">
    </div>
</div>
<div class="row">
    <div class="col-25"><label for="practice_education">Education:</label></div>
    <div class="col-75">
        <select class="form-select" name="practice_education">
            <option selected></option>
            <option value="Middle/High School">Middle/High School</option>
            <option value="Bachelor's Degree">Bachelor's Degree</option>
            <option value="Master's Degree">Master's Degree</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-25"><label for="">Practice type:</label></div>
    <input class="form-check-input" type="radio" checked value="" name="practice_type" hidden id="practice_type10">
    <div class="col-75">
    <input class="form-check-input" type="radio" value="UX Design" name="practice_type" id="practice_type1">
        <label class="form-check-label"  for="flexRadioDefault1">UX Design</label>
    </div>
    <div class="col-25"><label for=""></label></div>
    <div class="col-75">
        <input class="form-check-input" type="radio" value="UI Design" name="practice_type" id="practice_type2">
        <label class="form-check-label" for="flexRadioDefault2">UI Design</label>
    </div>
    <div class="col-25"><label for=""></label></div>
    <div class="col-75">
        <input class="form-check-input" type="radio" value="Front End Development" name="practice_type" id="practice_type3">
        <label class="form-check-label" for="flexRadioDefault2">Frontend Development</label>
    </div>
    <div class="col-25"><label for=""></label></div>
    <div class="col-75">
        <input class="form-check-input" type="radio" value="Backend Development" name="practice_type" id="practice_type4">
        <label class="form-check-label" for="flexRadioDefault2">Backend Development</label>
    </div>
    <div class="col-25"><label for=""></label></div>
    <div class="col-75">
        <input class="form-check-input" type="radio" name="practice_type" value="Full Stack Development" id="practice_type5">
        <label class="form-check-label" for="flexRadioDefault2">Fullstack Development</label>
    </div>
</div>
<div class="row">
    <div class="col-25"><label for="">Your knowledge in:</label></div>
</div>
    <div class="row">
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label class="left" for="customRange1">HTML</label>
            <input class="range" type="range" min="1" max="100" value="50" id="customRange1" name="practice_html">
            <label class="right"><span id="demo"></span> %</label>
        </div>
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label class="left" for="customRange1">CSS</label>
            <input class="range" type="range" min="1" max="100" value="50" id="customRange2" name="practice_css">
            <label class="right"><span id="demo2"></span> %</label>
        </div>
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label class="left" for="customRange1">Bootstrap</label>
            <input class="range" type="range" min="1" max="100" value="50" id="customRange3" name="practice_bootstrap">
            <label class="right"><span id="demo3"></span> %</label>
        </div>
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label class="left" for="customRange1">PHP</label>
            <input class="range" type="range" min="1" max="100" value="50" id="customRange4" name="practice_php">
            <label class="right"><span id="demo4"></span> %</label>
        </div>
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label class="left" for="customRange1">MySql</label>
            <input class="range" type="range" min="1" max="100" value="50" id="customRange5" name="practice_mysql">
            <label class="right"><span id="demo5"></span> %</label>
        </div>
</div>
    <br>
    <div class="row">
        <button class="details" type="submit">Submit</button>
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