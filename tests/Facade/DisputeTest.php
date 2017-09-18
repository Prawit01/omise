<?php

/*
 * This file is part of the PhpMob package.
 *
 * (c) Ishmael Doss <nukboon@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace tests\PhpMob\Omise\Facade;

use PhpMob\Omise\Facade\Dispute;
use tests\PhpMob\Omise\FacadeTestCase;

/**
 * @author Ishmael Doss <nukboon@gmail.com>
 */
class DisputeTest extends FacadeTestCase
{
    /**
     * @test
     */
    function it_can_fetch_item()
    {
        $this->client->fixture('dispute');

        $this->assertEquals('dspt_test_4zgf15h89w8t775kcm8', Dispute::fetch()->id);
    }

    /**
     * @test
     */
    function it_can_refresh_item()
    {
        $this->client->fixture('dispute');

        $dispute = new Dispute();
        $dispute->id = 'foo';

        $dispute->refresh();

        $this->assertEquals('dspt_test_4zgf15h89w8t775kcm8', $dispute->id);
    }

    /**
     * @test
     */
    function it_can_update_item()
    {
        $this->client->fixture('dispute');

        $dispute = new Dispute();
        $dispute->id = 'dspt_test_4zgf15h89w8t775kcm8';
        $dispute->message = 'Proofs and other information regarding the disputed charge ...';

        $dispute->update();

        $this->assertNotEmpty($dispute->id);
    }
}
