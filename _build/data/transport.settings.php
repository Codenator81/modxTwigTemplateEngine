<?php
/**
 * modExtra
 *
 * Copyright 2010 by Shaun McCormick <shaun+modextra@modx.com>
 *
 * modExtra is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * modExtra is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * modExtra; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package modextra
 */
/**
 * Loads system settings into build
 *
 * @package modextra
 * @subpackage build
 */
global  $modx, $sources;
$settings = array();


$settings['modxTwig.template_dir'] = $modx->newObject('modSystemSetting');
$settings['modxTwig.template_dir']->fromArray(array(
    'key' => 'modxTwig.template_dir',
    'value' => '{core_path}components/modxtwig/templates/',
    'xtype' => 'textfield',
    'namespace' => 'modxtwig',
    'area' => 'site',
),'',true,true);


$settings['modxTwig.cache'] = $modx->newObject('modSystemSetting');
$settings['modxTwig.cache']->fromArray(array(
    'key' => 'modxTwig.cache',
    'value' => '0',
    'xtype' => 'combo-boolean',
    'namespace' => 'modxtwig',
    'area' => 'site',
),'',true,true);


$settings['modxTwig.debug'] = $modx->newObject('modSystemSetting');
$settings['modxTwig.debug']->fromArray(array(
    'key' => 'modxTwig.debug',
    'value' => '0',
    'xtype' => 'combo-boolean',
    'namespace' => 'modxtwig',
    'area' => 'site',
),'',true,true);



return $settings;
