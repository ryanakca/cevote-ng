<div class="positions index">
<h2>Résultats</h2>
<?php
foreach ($positions as $position):?>
<table cellpadding="0" cellspacing="0">
    <tr>
            <th>Candidats pour <?php echo $positoin['Position']['name']; ?></th>
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
            <td><?php echo $candidate['Candidate']['name']; ?></td>
            <td><?php echo $candidate['Candidate']['votes']; ?></td>
        </tr>
    <?php endforeach;?>
</table>
<?php endforeach; ?>
