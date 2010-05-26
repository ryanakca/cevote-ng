<?php
class CandidatesController extends AppController {

	var $name = 'Candidates';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->Candidate->recursive = 0;
		$this->set('candidates', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Candidate', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('candidate', $this->Candidate->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Candidate->create();
			if ($this->Candidate->save($this->data)) {
				$this->Session->setFlash(__('The Candidate has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Candidate could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Candidate', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Candidate->save($this->data)) {
				$this->Session->setFlash(__('The Candidate has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Candidate could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Candidate->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Candidate', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Candidate->del($id)) {
			$this->Session->setFlash(__('Candidate deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Candidate could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>
