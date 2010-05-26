<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Short description for class.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
        var $components = array('Auth', 'RequestHandler');

        function beforeFilter() {
                $this->Auth->authorize = 'controller';
                $this->Auth->autoRedirect = false;
                $this->Auth->loginAction = array('action'=>'login', 'controller'=>'users', 'admin'=>false);
                $this->Auth->loginRedirect = array('action'=>'index', 'controller'=>'pages', 'admin'=>false);
                $this->Auth->logoutRedirect = array('action'=>'login', 'controller'=>'users', 'admin'=>false);
                $this->Auth->userScope = array('User.has_voted' => 0);
        }

        function isAuthorized() {
            if ($this->Auth->user('group') == 'Admin') return true;
            if ($this->permission[$this->action] == '*') return true;
            return false;
        }
}
?>
