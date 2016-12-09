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

class oxviewconfig_1337 extends oxviewconfig_1337_parent
{
    public function getModulePath($sModule, $sFile = '')
    {
        if($sFile == '' || pathinfo($sFile, PATHINFO_EXTENSION) != 'tpl')
        {
            return parent::getModulePath($sModule, $sFile);
        }
        if ($sFile[0] != '/') $sFile = '/' . $sFile;

        $debug = true;

        $oModule = oxNew("oxmodule");
        $sModulePath = $oModule->getModulePath($sModule);

        $sTpl = $this->getConfig()->getTemplateDir() . 'modules/' . $sModulePath . $sFile;
        $sFallback = $this->getConfig()->getModulesDir() . $sModulePath . $sFile;


        if (file_exists($sTpl)) return $sTpl;
        elseif (file_exists($sFallback))
        {
            if($debug) oxRegistry::getUtils()->writeToLog("$sModule template can be overridden:\n          $sTpl \n          $sFallback\n\n","module-templates.log");
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
