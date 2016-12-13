<?php

/*
 * ###_COMPANY_### - ###_MODULE_###
 * Copyright (C) ###_YEAR_###  ###_COMPANY_###
 * info:  ###_EMAIL_###
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
    'id'          => 'vt-childtplmod',
    'title'       => '[vt] child theme for module templates',
    'description' => 'child themes can now override module tempaltes and blocks. No need to change module tempaltes and care about updates anymore!',
    'thumbnail'   => 'oxid-vt.jpg',
    'version'     => '0.1.0',
    'author'      => 'Marat Bedoev, ',
    'email'       => 'm@marat.ws',
    'url'         => 'https://github.com/vanilla-thunder/vt-childtplmod',
    'extend'      => [
        'oxutilsview' => 'vt/vt-childtplmod/extend/oxutilsview_childtplmod',
        'oxviewconfig' => 'vt/vt-childtplmod/extend/oxviewconfig_childtplmod'
    ],
    'settings' => [
        ['group' => 'vtchildtplmod', 'name' => 'blVtctpmLogReplaced', 'type' => 'bool',  'value' => false],
        ['group' => 'vtchildtplmod', 'name' => 'blVtctpmLogReplaceable', 'type' => 'bool',  'value' => true]
       
    ]
];
