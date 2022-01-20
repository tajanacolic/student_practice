<?php if($_SESSION['name'] === "admin"): ?>

    <div>

        <form style="display: inline-block" method="post" action="/practice/view/delete">

            <input type="hidden" name="practice_id" value="<?php echo $practice['practice_id'] ?>">

            <button type="submit" class="button-details">Delete</button>

        </form>

    </div>
<?php endif; ?>

<h1 class="view-title"><?php echo $practice['practice_name'] ?></h1>



