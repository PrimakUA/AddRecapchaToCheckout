<?php

declare(strict_types=1);

namespace Primak\Recaptcha\Controller\Index;

use Primak\Recaptcha\Model\Management;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\Request\Http;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;

/**
 * Class Save
 */
class Save implements ActionInterface
{
    /**
     * @var Http
     */
    protected Http $_request;

    /**
     * @var Management
     */
    protected Management $management;

    /**
     * @var JsonFactory
     */
    protected JsonFactory $resultJsonFactory;

    /**
     * @param Http $request
     * @param Management $management
     * @param JsonFactory $resultJsonFactory
     */
    public function __construct(
        Http $request,
        Management $management,
        JsonFactory $resultJsonFactory
    ) {
        $this->_request = $request;
        $this->management = $management;
        $this->resultJsonFactory = $resultJsonFactory;
    }

    /**
     * @return ResponseInterface|ResultInterface|void
     */
    public function execute()
    {
        $data = $this->_request->getPostValue();
        $this->management->saveFormData($data['checkVal'][0], $data['checkVal'][1]);
        $resultJson = $this->resultJsonFactory->create();
        return $resultJson->setData(['checkValStatus' => 'Success, data saved!']);
    }
}
