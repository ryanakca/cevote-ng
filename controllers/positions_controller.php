<?php
class PositionsController extends AppController {

	var $name = 'Positions';
	var $helpers = array('Html', 'Form');
        var $uses = array('Position', 'User', 'Candidate');
        var $permissions = array(
            'vote'=>'*'
            );

        function vote() {
                $this->User->recursive = 3;
                $user = $this->User->read(null, $this->Auth->user('id'));
                $this->User->Behaviors->attach('Containable');
                $positions = $this->User->find('first', array(
                    'conditions' => array('User.id'=>$this->Auth->user('id')),
                    'contain'=>array(
                        'Group' => array(
                            'Position' => array(
                                'Candidate'=> array(
                                    'fields'=>array('name')
                            ))))));
                $positions = $user['Group']['Position'];
                if ($this->data) {
                    //debug($this->data);
                    if ($user['User']['has_voted'] == 0) {
                        $vote_ids = array();
                        $votes_per_pos = 0;
                        foreach ($this->data as $position):
                            foreach ($position as $candidate):
                                if ($candidate['id'] != '0') {
                                    $votes_per_pos += 1;
                                    $vote_ids[] = $candidate['id'];
                                }
                            endforeach;
                            if ($votes_per_pos > 1) {
                                $this->Session->setFlash('Choisssez UN SEUL CANDIDAT par poste!');
                                $this->set(compact('positions'));
                                break;
                            } else {
                                $votes_per_pos = 0;
                            }
                        endforeach;
                        // Ma;ke sure we haven't broken with too many votes
                        if ($votes_per_pos <= 1) {
                            // User has voted:
                            if (!empty($vote_ids)) {
                                foreach ($vote_ids as $vote_id):
                                    $candidate = $this->Candidate->read(null, $vote_id);
                                    $candidate['Candidate']['votes'] += 1;
                                    $this->Candidate->save($candidate);
                                endforeach;
                            }
                            // Log him out regardless of if he chose to vote.
                            $user['User']['has_voted'] = 1;
                            $this->User->save($user);
                            $this->Session->setFlash('Vos votes ont étés soumis.');
                            $this->redirect($this->Auth->logout());
                        }
                    } else {
                        $this->Session->setFlash('Vous avez déjà voté.');
                        $this->redirect($this->Auth->logout());

                    }
                } else {
                    $this->set(compact('positions'));
                }
        }

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
