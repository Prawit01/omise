<?php

/*
 * This file is part of the PhpMob package.
 *
 * (c) Ishmael Doss <nukboon@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PhpMob\Omise\Mock;

use PhpMob\Omise\OmiseApi;
use PHPUnit\Framework\TestCase;

/**
 * @author Ishmael Doss <nukboon@gmail.com>
 */
class FacadeTestCase extends TestCase
{
    protected $chargeId = 'chrg_test_5086xlsx4lghk9bpb75';
    protected $tokenId = 'tokn_test_5086xl7c9k5rnx35qba';

    /**
     * @var HttpClient
     */
    protected $client;

    public function setUp()
    {
        $this->client = new HttpClient();
        $options = [
            'secret_key' => 'secret_key',
            'public_key' => 'public_key',
            'sandbox' => true,
        ];

        OmiseApi::setupFacade($this->client, $options);
    }

    public function tearDown()
    {
        $this->client = null;
    }
}