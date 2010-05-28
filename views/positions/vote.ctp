<div class="positions form">
<?php echo $form->create('Position', array('action'=>'vote'));?>
	<fieldset>
                <h2>Sélectionnez UN SEUL candidat par poste.</h2>
 		<legend>Voter</legend>
                <table>
        <?php foreach ($positions as $pid => $position): ?>
                        <tr>
                            <th colspan="2"><?php echo $position['name'] ?></th>
                        </tr>
                        <tr>
                            <th>Candidat</th>
                            <th>Photo</th>
                        </tr>
                    <?php foreach ($position['Candidate'] as $cid => $candidate): ?>
                    <tr>
                        <td><?php echo $form->checkbox($pid.'.Candidate'.$cid.'.id', array('value'=>$candidate['id'])); echo $candidate['name']; ?> </td>
                        <td><img src="<?php echo $candidate['image_url']; ?>"></td>
                    </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
            </table>
	</fieldset>
        <?php echo $form->end("Je confirme que j'ai révisé mes choix et que je désir soumettre mon vote"); ?>
</div>
