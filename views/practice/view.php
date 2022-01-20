<h1 class="h1"><?php echo $practice['practice_name'] ?></h1>

<form action="">
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
            <label>Activity:</label>
        </div>
        <div class="col-75">

            <?php if($practice['practice_activity'] === 1){ ?>

                <input type="checkbox" name="practice_activity" checked>

            <?php } else { ?>

                <input type="checkbox" name="practice_activity">

            <?php } ?>

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
            <label for="customRange1">HTML</label>
            <input class="range" type="range" id="customRange1" name="practice_html" value="<?php echo $practice['practice_html'] ?>" disabled>
        </div>
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label for="customRange1">CSS</label>
            <input class="range" type="range" id="customRange1" name="practice_css" value="<?php echo $practice['practice_css'] ?>" disabled>
        </div>
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label for="customRange1">Bootstrap</label>
            <input class="range" type="range" id="customRange1" name="practice_bootstrap" value="<?php echo $practice['practice_bootstrap'] ?>" disabled>
        </div>
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label for="customRange1">PHP</label>
            <input class="range" type="range" id="customRange1" name="practice_php" value="<?php echo $practice['practice_php'] ?>" disabled>
        </div>
        <div class="col-25">
            <label for="customRange1"></label>
        </div>
        <div class="col-75">
            <label for="customRange1">MySql</label>
            <input class="range" type="range" id="customRange1" name="practice_mysql" value="<?php echo $practice['practice_mysql'] ?>" disabled>
        </div>
    </div>
</form>
<br><br>



<?php if($_SESSION['name'] === "admin"): ?>

    <form method="post" action="/practice/view/delete">
        <div class="row">

            <input type="hidden" name="practice_id" value="<?php echo $practice['practice_id'] ?>">
            <button class="details" type="submit" style="padding: 15px">Delete</button>

        </div>
    </form>
<br>
    <form method="post" action="/practice/view/update">
        <div class="row">

            <button class="details" type="submit" style="padding: 15px">Save changes</button>

        </div>
    </form>

<?php endif; ?>