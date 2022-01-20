<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<h1>Apply For Practice</h1>
<form action="" method="post">
<div>
    <div><label for="practice_name">Full name</label></div>
    <div>
        <input type="text" id="practice_name" name="practice_name" placeholder="Eg. John Doe" value="<?php echo $practice['practice_name'] ?>">
    </div>
</div>
<div>
    <div><label for="practice_email">Email address</label></div>
    <div>
        <input type="email" id="practice_email" placeholder="Eg. john@example.com" name="practice_email" value="<?php echo $practice['practice_email'] ?>">
    </div>
</div>
<div>
    <div><label for="practice_phone">Phone number</label></div>
    <div>
        <input type="tel" id="practice_phone" placeholder="Eg. +657 653 987" name="practice_phone" value="<?php echo $practice['practice_phone'] ?>">
    </div>
</div>
<div>
    <div><label for="practice_education">Education</label></div>
    <div>
        <select class="form-select" name="practice_education">
            <option selected></option>
            <option value="Middle/High School">Middle/High School</option>
            <option value="Bachelor's Degree">Bachelor's Degree</option>
            <option value="Master's Degree">Master's Degree</option>
        </select>
    </div>
</div>
<div>
    <div><label for="">Practice type</label></div>
    <input class="form-check-input" type="radio" checked value="" name="practice_type" hidden id="practice_type10">
    <div class="form-check">
    <input class="form-check-input" type="radio" value="UX Design" name="practice_type" id="practice_type1">
        <label class="form-check-label"  for="flexRadioDefault1">UX Design</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" value="UI Design" name="practice_type" id="practice_type2">
        <label class="form-check-label" for="flexRadioDefault2">UI Design</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" value="Front End Development" name="practice_type" id="practice_type3">
        <label class="form-check-label" for="flexRadioDefault2">Front End Development</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" value="Backend Development" name="practice_type" id="practice_type4">
        <label class="form-check-label" for="flexRadioDefault2">Backend Development</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="practice_type" value="Full Stack Development" id="practice_type5">
        <label class="form-check-label" for="flexRadioDefault2">Full Stack Development</label>
    </div>
</div>
<div>
    <div><label for="">Your knowledge in</label></div>
    <label for="customRange1" class="form-label">HTML</label>
    <input type="range" class="form-range" id="customRange1" name="practice_html">
    <label for="customRange1" class="form-label">CSS</label>
    <input type="range" class="form-range" id="customRange1" name="practice_css">
    <label for="customRange1" class="form-label">Bootstrap</label>
    <input type="range" class="form-range" id="customRange1" name="practice_bootstrap">
    <label for="customRange1" class="form-label">PHP</label>
    <input type="range" class="form-range" id="customRange1" name="practice_php">
    <label for="customRange1" class="form-label">Mysql</label>
    <input type="range" class="form-range" id="customRange1" name="practice_mysql">
</div>
    <div>
        <button type="submit">Sign in</button>
    </div>
</form>