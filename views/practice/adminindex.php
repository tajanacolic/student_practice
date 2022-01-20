<table>

    <tbody>

    <tr>
        <th></th>
        <th>Name</th>
        <th>Type</th>
        <th></th>
    </tr>

    <?php foreach ($practices as $i => $practice) { ?>

        <tr>
            <td><b><?php echo $i + 1 ?></b></td>
            <td><?php echo $practice['practice_name'] ?></td>
            <td><?php echo $practice['practice_type'] ?></td>
            <td>

                <a href="/practice/view?practice_id=<?php echo $practice['practice_id'] ?>">Details</a>

            </td>
        </tr>

    <?php } ?>

    </tbody>

</table>

