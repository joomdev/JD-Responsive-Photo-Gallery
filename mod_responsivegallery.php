<?php	
/*------------------------------------------------------------------------	
# mod_responsivegallery - JD Responsive Photo Gallery for Joomla 3.0 v3.0.0	
# ------------------------------------------------------------------------	
# author    JoomDev (Formerly GraphicAholic)
# copyright Copyright (C) 2020 Joomdev, Inc. All rights reserved.
# @license - GNU General Public License version 2 or later
# Websites: https://www.joomdev.com
-------------------------------------------------------------------------*/

// No direct access	
defined('_JEXEC') or die('Restricted access');	
defined('DS') or define('DS', DIRECTORY_SEPARATOR);	

JHtml::_('bootstrap.framework');

// Import the file / foldersystem	
jimport('joomla.filesystem.file');	
jimport('joomla.filesystem.folder');

$document = JFactory::getDocument();	
$LiveSite 	= JURI::base();	
$modbase = JURI::base(true).'/modules/mod_responsivegallery/';	
$imageFeed		= $params->get('imageFeed');	
$lightboxEffect = $params->get('lightboxEffect', '1');	
$lightboxScript = $params->get('lightboxScript', '1');	
$styles = $params->get('styles', '1');	
$itemTitle = $params->get('itemTitle',1);	
$moduleTitle 	= $module->title;	
$moduleID = $module->id;	

if ($lightboxEffect == "1") {
	$document->addScript($modbase.'js/gallery.js');	
} else {
	$document->addScript($modbase.'js/gallery_NL.js');	
}	
if ($styles == "light") {
	$document->addStyleSheet($modbase.'css/style_light.css');
	$document->addStyleSheet($modbase.'css/elastislide_light.css');	
}	
elseif ($styles == "dark") {
	$document->addStyleSheet($modbase.'css/style_dark.css');
	$document->addStyleSheet($modbase.'css/elastislide_dark.css');	
}	
elseif ($styles == "custom") {
	$document->addStyleSheet($modbase.'css/style_custom.css');
	$document->addStyleSheet($modbase.'css/elastislide_custom.css');	
}
elseif ($styles == "frameless") {
	$document->addStyleSheet($modbase.'css/style_frameless.css');
	$document->addStyleSheet($modbase.'css/elastislide_frameless.css');	
}	
if ($lightboxScript == "1") {
	$document->addScript ($modbase.'js/jquery.fancybox.js');
	$document->addStyleSheet($modbase.'css/jquery.fancybox.css');	
}	
$document->addScript ($modbase.'js/jquery.tmpl.js');	
$document->addScript ($modbase.'js/jquery.easing.1.3.js');	
$document->addScript ($modbase.'js/jquery.elastislide.js');	
$moduleId 	 	= $module->id;

if ($imageFeed == "5") {	
require_once __DIR__ . '/helpers/jhelper.php';	
$param = modResponsiveGalleryHelper::render($params);	
require (JModuleHelper::getLayoutPath('mod_responsivegallery',$params->get('layout', 'default')));	
} else {	
require_once (dirname(__FILE__).DS.'helper.php');	
$list = modResponsiveGalleryHelper::getimgList($params, $moduleID);	
require(JModuleHelper::getLayoutPath('mod_responsivegallery'));	
}	
?>