<?php

declare(strict_types=1);

namespace Primak\Recaptcha\Model;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * class RecaptchaResource
 */
class RecaptchaResource extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('primak_recaptcha', 'entity_id');
    }
}
