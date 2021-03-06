<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Html', 'Form');
        var $permissions = array(
            'login' => '*',
            'logout' => '*'
        );

        function beforeFilter() {
            $this->Auth->allow('login');
            $this->Auth->allow('admin_login');
            $this->Auth->allow('logout');
            $this->Auth->allow('admin_logout');
            parent::beforeFilter();
        }

        function login() {
            if (!empty($this->data)) {
                // We cannot pass an array([User]=>array(...), 
                // [Group]=>array(...)) to $this->Auth->login($user). It only 
                // accepts an array([User]=>array(...)). Hence the recursive = 
                // -1.
                $this->User->recursive = -1;
                $user = $this->User->find('first', 
                    array('conditions'=>array('User.username' => $this->data['User']['username'])
                ));
                // Admin users have a password, voters don't.
                if ($user['User']['has_voted'] == 0) {
                    $this->data['User']['password'] = $this->Auth->password('password');
                    $this->Auth->login($this->data);
                    if ($this->Auth->user()) {
                        $this->redirect($this->Auth->loginRedirect);
                    } 
                } else {
                    $this->Session->setFlash('Vous avez déjà voté.');
                }
            }
        }

        function logout() {
            $this->redirect($this->Auth->logout());
        }

        function admin_login() {
            if (!empty($this->data)) {
                // We cannot pass an array([User]=>array(...),
                // [Group]=>array(...)) to $this->Auth->login($user). It only
                // accepts an array([User]=>array(...)). Hence the recursive =
                // -1.
                $this->User->recursive = -1;
                $user = $this->User->find('first',
                    array('conditions'=>array('User.username' => $this->data['User']['username'])
                ));
                debug($user);
                // Admin users have a password, voters don't.
                if (!is_null($user['User']['password'])) {
                        if ($this->data['User']['password'] == $user['User']['password']) {
                            $this->Auth->login($this->data);
                            if ($this->Auth->user()) {
                                // User is logged in
                                $this->Session->write('Auth.User.group',
                                    $this->User->Group->field('name', array('id' => $user['User']['group_id'])));
                                $this->redirect($this->Auth->loginRedirect());
                            }
                        }
                } 
            }
        }

        function admin_logout() {
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
