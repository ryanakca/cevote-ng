<div class="users form">
<?php echo $form->create('User', array('action'=>'register'));?>
	<fieldset>
 		<legend><?php __('Register for CAP');?></legend>
	<?php
		echo $form->input('activity_id', array('type'=>'radio', 'label'=>__('Activity', true)));
	?>
	</fieldset>
        <script language="Javascript">
            function confirm_vote() {
                input_box=confirm("Avez-vous bien vérifé vos choix?");
                if (input_box==true)
                {
                    <?php echo $form->end();?>
                }
            }
        </script>

        <a href="JavaScript:confirm_entry()">Souettre</a>
</div>
