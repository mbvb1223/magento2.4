<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
use Magento\TestFramework\Workaround\Override\Fixture\Resolver;

Resolver::getInstance()->requireDataFixture('Magento/Customer/_files/customer.php');

/** @var $reward \Magento\Reward\Model\Reward */
$reward = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(\Magento\Reward\Model\Reward::class);
$reward->setCustomerId(1)->setWebsiteId(1);
$reward->save();
/** @var $history \Magento\Reward\Model\Reward\History */
$history = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
    \Magento\Reward\Model\Reward\History::class
);
$history->setRewardId($reward->getId())->setWebsiteId(1)->addAdditionalData(['email' => 'test@example.com']);
$history->save();
