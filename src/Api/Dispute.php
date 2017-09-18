<?php

/*
 * This file is part of the PhpMob package.
 *
 * (c) Ishmael Doss <nukboon@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PhpMob\Omise\Api;

use PhpMob\Omise\Api;
use PhpMob\Omise\Domain\Dispute as Domain;

/**
 * @author Ishmael Doss <nukboon@gmail.com>
 *
 * @see https://www.omise.co/balance-api
 */
final class Dispute extends Api
{
    /**
     * @return Domain
     */
    public function fetch()
    {
        return $this->doRequest('GET', '/disputes');
    }

    /**
     * @param Domain $dispute
     */
    public function refresh(Domain $dispute)
    {
        $dispute->updateStore($this->fetch()->toArray());
    }

    /**
     * @return Domain
     */
    public function open()
    {
        return $this->doRequest('GET', '/disputes/open', 'open');
    }

    /**
     * @return Domain
     */
    public function pending()
    {
        return $this->doRequest('GET', '/disputes/pending', 'pending');
    }

    /**
     * @return Domain
     */
    public function closed()
    {
        return $this->doRequest('GET', '/disputes/closed', 'closed');
    }

    /**
     * @param Domain $dispute
     */
    public function update(Domain $dispute)
    {
        self::assertNotEmpty($dispute->id);

        $dispute->updateStore($this->doRequest('PATCH', '/disputes/'.$dispute->id, $dispute->getUpdateData())->toArray());
    }
}
