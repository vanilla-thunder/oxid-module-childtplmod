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

class oxconfig_childtplmod extends oxconfig_childtplmod_parent
{
    public function getTemplatePath($sFile, $blAdmin)
    {
        $sOriginal = parent::getTemplatePath($sFile,$blAdmin);
        return (strpos($sOriginal,getShopBasePath().'modules/') === 0 && $sOverride = $this->getDir('modules/'.$sFile, $this->_sTemplateDir, $blAdmin)) ? $sOverride : $sOriginal;
    }

}
