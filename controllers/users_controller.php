<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Html', 'Form');
        var $permissions = array(
            'login' => '*'
        );

        function beforeFilter() {
            $this->Auth->allow('login');
            $this->Auth->allow('admin_login');
            parent::beforeFilter();
        }

        function login() {
            if (!empty($this->data)) {
                if ($this->data['User']['has_voted'] == 0) {
                    $this->Auth->login($this->data);
                    $this->redirect($this->Auth->redirect());
                }
            }
        }

        function admin_login() {
            // From
            // http://bakery.cakephp.org/articles/view/minimalistic-group-based-access-control-in-5-mins
            if ($this->Auth->user()) {
                $this->Session->write('Auth.User.group',
                    $this->User->Group->field('name',array('id' => $this->Auth->user('group_id'))));
                $this->redirect($this->Auth->redirect());
            }
        }

        function admin_logout() {
            // From
            // http://bakery.cakephp.org/articles/view/minimalistic-group-based-access-control-in-5-mins
            $this->redirect($this->Auth->logout());
        }

	function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The User could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>
