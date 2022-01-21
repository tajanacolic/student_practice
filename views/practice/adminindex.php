<h1 class="h1">Practice applications</h1>

<form action="">
    <input class="search" placeholder="Search by type..." name="search">
    <button class="searchbutton" type="submit">Search</button>
    <form method="post" action="">

        <input type="hidden" name="practice_id" value="<?php echo $practice['practice_id'] ?>">
        <button class="searchbutton" type="submit">Filter by activity</button>

    </form>
</form>

<br><br><br>

<table>

    <tbody>

        <tr>

            <th></th>
            <th>Name</th>
            <th>Type</th>
            <th>Activity</th>
            <th></th>

        </tr>

            <?php foreach ($practices as $i => $practice) { ?>

        <tr>
            <td><b><?php echo $i + 1 ?></b></td>
            <td><?php echo $practice['practice_name'] ?></td>
            <td><?php echo $practice['practice_type'] ?></td>
                <?php if($practice['practice_activity'] === 1) { ?>

                    <td class="active"><b>Active</b></td>

                <?php } else { ?>

                    <td class="inactive"><b>Inactive</b></td>

                <?php } ?>

            <td>

                <a class="details" href="/practice/view?practice_id=<?php echo $practice['practice_id'] ?>">Details</a>

            </td>

        </tr>
        <?php } ?>

    </tbody>

</table>

