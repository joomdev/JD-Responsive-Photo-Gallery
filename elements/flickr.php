<?php
/*------------------------------------------------------------------------	
# mod_responsivegallery - JD Responsive Photo Gallery
# ------------------------------------------------------------------------	
# author    JoomDev (Formerly GraphicAholic)
# copyright Copyright (C) 2020 Joomdev, Inc. All rights reserved.
# @license - GNU General Public License version 2 or later
# Websites: https://www.joomdev.com
-------------------------------------------------------------------------*/

// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.html.html');
jimport('joomla.form.formfield');

class JFormFieldInfo extends JFormField {
	protected $type = 'info';
	protected function getInput(){
		// Output
		return '
		<div style="font-size:12px;line-height:18px;color:#990000;padding:10px;margin:10px 0;background: #F4F4F4">
			'.JText::_($this->element['default']).'
		</div>';
	}
	public function getLabel() {
      return '<span style="display:none">' . parent::getLabel() . '</span>';
   }
}