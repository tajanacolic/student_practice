<?php if($_SESSION['name'] === "admin"): ?>

    <div>

        <form style="display: inline-block" method="post" action="/jobs/view/delete">

            <input type="hidden" name="id" value="<?php echo $practice['practice_id'] ?>">

            <button type="submit" class="button-details">Delete</button>

        </form>

    </div>
<?php endif; ?>

<h1 class="view-title"><?php echo $practice[''] ?></h1>

<h2 class="view-title2"><?php echo $practice['job_requirements'] ?></h2>

<h3 class="view-title3"></h3>

<p class="view-description">

    <?php echo $practice['job_description'] ?>

</p>

