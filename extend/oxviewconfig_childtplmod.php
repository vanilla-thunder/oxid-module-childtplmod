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

class oxviewconfig_childtplmod extends oxviewconfig_childtplmod_parent
{
    public function getModulePath($sModule, $sFile = '')
    {
        if($sFile == '' || pathinfo($sFile, PATHINFO_EXTENSION) != 'tpl')
        {
            return parent::getModulePath($sModule, $sFile);
        }
        if ($sFile[0] != '/') $sFile = '/' . $sFile;

        $cfg = oxRegistry::getConfig();
        $debugReplaced = !$this->isAdmin() && $cfg->getConfigParam("blVtctpmLogReplaced");
        $debugReplaceable = !$this->isAdmin() && $cfg->getConfigParam("blVtctpmLogReplaceable");

        $oModule = oxNew("oxmodule");
        $sModulePath = $oModule->getModulePath($sModule);

        $sTpl = $this->getConfig()->getTemplateDir() . 'modules/' . $sModulePath . $sFile;
        $sFallback = $this->getConfig()->getModulesDir() . $sModulePath . $sFile;


        if (file_exists($sTpl))
        {
           if($debugReplaced) oxRegistry::getUtils()->writeToLog("[tpl replaced]   $sModule$sFile\n".str_pad("",12," ")."=>   ".str_replace($cfg->getConfigParam('sShopDir'),"",$sTpl).")\n\n","module-child-tpl.log");
           return $sTpl;
        }
        elseif (file_exists($sFallback))
        {
            //if($debugReplaceable) oxRegistry::getUtils()->writeToLog("[tpl original]  $sModule/$sFile\n =>".str_pad("",16," ").str_replace($cfg->getModulesDir(),"",$sTpl)."\n\n","module-child-tpl.log");
            if($debugReplaceable) oxRegistry::getUtils()->writeToLog("[tpl original]      $sModule$sFile\n".str_pad("",20," ")."(".str_replace($cfg->getConfigParam('sShopDir'),"",$sTpl).")\n\n","module-child-tpl.log");
            //if($debugReplaceable) oxRegistry::getUtils()->writeToLog("[replaceable]   $sFallback => $sTpl\n","module-child-tpl.log");
            return $sFallback;
        }
        else {
            /** @var oxFileException $oEx */
            $oEx = oxNew("oxFileException", "Requested file not found for module $sModule ($sFile)");
            $oEx->debugOut();
            if (!$this->getConfig()->getConfigParam('iDebug')) {
                return '';
            }
            throw $oEx;
        }
    }

}
