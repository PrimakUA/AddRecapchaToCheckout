<?php

declare(strict_types=1);

namespace Primak\Recaptcha\Model;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * class RecaptchaCollection
 */
class RecaptchaCollection extends AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Recaptcha::class, RecaptchaResource::class);
    }
}
