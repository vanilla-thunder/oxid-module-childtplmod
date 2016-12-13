<?php

/*
 * child theme implementation for module templates
 * Copyright (C) 2016  Marat Bedoev
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

class oxutilsview_childtplmod extends oxutilsview_childtplmod_parent
{
    protected function _getTemplateBlock($sModule, $sFile)
    {
        $cfg = oxRegistry::getConfig();
        $debugReplaced = !$this->isAdmin() && $cfg->getConfigParam("blVtctpmLogReplaced");
        $debugReplaceable = !$this->isAdmin() && $cfg->getConfigParam("blVtctpmLogReplaceable");

        $aModuleInfo = $this->_getActiveModuleInfo();
        $sModulePath = $aModuleInfo[$sModule];

        $sTpl = $this->getConfig()->getTemplateDir() . "modules/{$sModulePath}/{$sFile}";

        if (file_exists($sTpl)) 
        {
           if($debugReplaced) oxRegistry::getUtils()->writeToLog("[block replaced]   $sModule$sFile\n => ".str_pad("",18," ").str_replace($cfg->getModulesDir(),"",$sTpl)."\n","module-child-tpl.log");
           return file_get_contents($sTpl);
        }
       
        if($debugReplaceable) oxRegistry::getUtils()->writeToLog("[block original]    $sModule$sFile\n =>".str_pad("",18," ")."({$sTpl})\n\n","module-child-tpl.log");
        //if($debugReplaceable) oxRegistry::getUtils()->writeToLog("[tpl original]  $sModule/$sFile => ".str_replace($cfg->getModulesDir(),"",$sTpl)."\n","module-child-tpl.log");
        return parent::_getTemplateBlock($sModule, $sFile);
    }

}
