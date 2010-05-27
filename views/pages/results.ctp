<div class="positions index">
<h2>Résultats</h2>
<table cellpadding="0" cellspacing="0">
<?php
foreach ($positions as $position):?>
    <tr>
            <th>Candidats pour <?php echo $position['Position']['name']; ?></th>
            <th>Nombre de votes</th>
    </tr>
<?php
    $i = 0;
    foreach ($position['Candidate'] as $candidate): 
        $class = ' class="winner"';
        if ($class != 0) {
            $class = null;
        }
?>
        <tr<?php echo $class; ?>>
            <td><?php echo $candidate['name']; ?></td>
            <td><?php echo $candidate['votes']; ?></td>
        </tr>
    <?php endforeach;?>
<?php endforeach; ?>
</table>
