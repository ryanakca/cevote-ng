<?php
/* SVN FILE: $Id$ */
/**
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
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title><?php echo $title_for_layout; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $html->webroot ?>css/cevote-ng.css" media="screen" />
<?php echo $scripts_for_layout; ?>
</head>
<body>
<div id="header">
<h1 id="institution">CEVote-NG &mdash; élections du gouvernement des éleves</h1>
<!-- Insert your header here -->
</div>
<div id="content">
<?php $session->flash(); ?>
<?php echo $content_for_layout ?>
</div>
<div id="footer">
<!-- Insert your footer here -->
<div id="legal">
<p>CEVote-NG is Copyright &copy; 2010 Ryan Kavanagh and is distributed under
the terms of the GNU Affero General Public License version 3, or (at your
option) any later version. See this page <?php echo $html->link('for more
details', array('controller'=>'pages', 'admin'=>false,
'action'=>'display', 'copyright'))?>.</p>
</div>
</div>
</body>
</html>
