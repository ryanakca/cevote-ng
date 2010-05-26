<?php
class PositionsController extends AppController {

	var $name = 'Positions';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->Position->recursive = 0;
		$this->set('positions', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Position', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('position', $this->Position->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Position->create();
			if ($this->Position->save($this->data)) {
				$this->Session->setFlash(__('The Position has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Position could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->Position->Group->find('list');
		$this->set(compact('groups'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Position', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Position->save($this->data)) {
				$this->Session->setFlash(__('The Position has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Position could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Position->read(null, $id);
		}
		$groups = $this->Position->Group->find('list');
		$this->set(compact('groups'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Position', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Position->del($id)) {
			$this->Session->setFlash(__('Position deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Position could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>
