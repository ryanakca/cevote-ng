<div class="users form">
<?php echo $form->create('User', array('action'=>'vote', 'controller'=>'pages'));?>
	<fieldset>
                <h2>Sélectionnez UN SEUL candidat par poste.</h2>
 		<legend>Voter</legend>
                <table>
                <tr>
                    <th>Choix</th>
                    <th>Candidat</th>
                    <th>Photo</th>
                </tr>
        <?php foreach ($user['Group']['Position'] as $pid => $position): ?>
                        <tr>
                            <th colspan="3"><?php echo $position['name'] ?></th>
                        </tr>
                    <?php foreach ($position['Candidate'] as $cid => $candidate): ?>
                        <tr>
                            <td><?php echo $form->input('User.Group.Position.' . $pid . '.Candidate.' . $cid , array('type'=>'radio'));?></td>
                            <td><?php echo $candidate['name']; ?></td>
                            <td><img src="<?php echo $candidate['image_url']; ?>"></td>
                        </tr>
                    <?php endforeach; ?>
                        </tr>
        <?php endforeach; ?>
            </table>
	</fieldset>
        <script type="text/javascript">
        <!--
        function confirm_vote() {
            var confirmed = confirm("Avez-vous bien vérifié vos choix?")

            if (confirmed) {
                <?php $form->end(); ?>
            }
        }
        //-->
        </script>

        <input type="button" onclick="confirm_vote()" value="Soumettre">
</div>
