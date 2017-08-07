<?php

/*
 * [vt] childtplmod for OXID eShop
 * child theme implementation for module templates
 * Copyright (C) 2017  Marat Bedoev
 * info:  m@marat.ws
 *
 * GNU GENERAL PUBLIC LICENSE  
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 *  without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */

$sMetadataVersion = '1.1';
$aModule = [
    'id'          => 'childtplmod',
    'title'       => '[vt] child theme for module templates',
    'description' => 'child theme implementation for module templates',
    'thumbnail'   => '../oxid-vt.jpg',
    'version'     => '0.2.1 2017-8-7',
    'author'      => 'Marat Bedoev, ',
    'email'       => 'm@marat.ws',
    'url'         => 'https://github.com/vanilla-thunder/childtplmod',
    'extend'      => [
        'oxconfig' => 'vt/childtplmod/application/extend/oxconfig_childtplmod',
        'oxutilsview' => 'vt/childtplmod/application/extend/oxutilsview_childtplmod',
        'oxviewconfig' => 'vt/childtplmod/application/extend/oxviewconfig_childtplmod'
    ],
    'settings' => [
        ['group' => 'vtchildtplmod', 'name' => 'blVtctpmLogReplaced', 'type' => 'bool',  'value' => false],
        ['group' => 'vtchildtplmod', 'name' => 'blVtctpmLogReplaceable', 'type' => 'bool',  'value' => true]
       
    ]
];
