<?php

/*
 * @copyright  trilobit GmbH
 * @author     trilobit GmbH <https://github.com/trilobit-gmbh>
 * @license    LGPL-3.0-or-later
 * @link       http://github.com/trilobit-gmbh/contao-formvalidation-bundle
 */

namespace Trilobit\FormvalidationBundle;

/**
 * Class ModuleLogin.
 */
class ModuleLogin extends \Contao\ModuleLogin
{
    /**
     * @return string
     */
    public function generate()
    {
        return parent::generate();
    }

    protected function compile()
    {
        $strParentCompile = parent::compile();

        $formId = \strlen($this->formID) ? $this->formID : $this->id;

        $objValidationHelper = new Helper();

        $elements = [];

        $elements['username']['type'] = '';
        $elements['username']['mandatory'] = 1;
        $elements['username']['mandatoryMessage'] = $objValidationHelper->getMandatoryMessage('username', $GLOBALS['TL_LANG']['MSC']['username']);

        $elements['password']['type'] = '';
        $elements['password']['mandatory'] = 1;
        $elements['password']['mandatoryMessage'] = $objValidationHelper->getMandatoryMessage('password', $GLOBALS['TL_LANG']['MSC']['password'][0]);

        $fileGenerator = new JsonFileGenerator();
        $fileGenerator->createJsonFile($elements, 'tl_login_'.$formId);

        return $strParentCompile;
    }
}
