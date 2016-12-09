<?php
/**
 * simple override handling for module tempaltes
 * The MIT License (MIT)
 *
 * Copyright (C) 2016  Marat Bedoev
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * Author:     Marat Bedoev <m@marat.ws>
 */

$sMetadataVersion = '1.1';
$aModule = [
    'id'          => 'vt-1337',
    'title'       => '[vt] 1337 - override handling for module templates',
    'description' => '<iframe width="600" height="450" src="https://www.youtube.com/embed/DLzxrzFCyOs?autoplay=1" frameborder="0" allowfullscreen></iframe>',
    'thumbnail'   => 'oxid-vt.jpg',
    'version'     => '0.0.2',
    'author'      => 'Marat Bedoev',
    'email'       => 'm@marat.ws',
    'url'         => 'https://github.com/vanilla-thunder/vt-1337',
    'extend'      => [
        'oxutilsview' => 'vt/vt-1337/oxutilsview_1337',
        'oxviewconfig' => 'vt/vt-1337/oxviewconfig_1337'
    ],
    'settings' => [
        ['group' => 'vt1337', 'name' => 'blVt1337logReplaced', 'type' => 'bool',  'value' => false],
        ['group' => 'vt1337', 'name' => 'blVt1337logRepleacable', 'type' => 'bool',  'value' => true]
       
    ]
];
