<?php

declare(strict_types=1);

namespace Primak\Recaptcha\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * class Recaptcha
 */
class Recaptcha extends AbstractModel
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(RecaptchaResource::class);
    }
}
