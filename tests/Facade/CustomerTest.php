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

use PhpMob\Omise\Exception\InvalidRequestArgumentException;
use PhpMob\Omise\Facade\Customer;
use PhpMob\Omise\Facade\Pagination;
use tests\PhpMob\Omise\FacadeTestCase;

/**
 * @author Ishmael Doss <nukboon@gmail.com>
 */
class CustomerTest extends FacadeTestCase
{
    /**
     * @test
     */
    function it_can_fetch_all()
    {
        $this->client->fixture('customer-list');

        $this->assertInstanceOf(Pagination::class , Customer::all());
    }

    /**
     * @test
     */
    function it_can_find_item()
    {
        $this->client->fixture('customer');

        $this->assertEquals('cust_test_5086xleuh9ft4bn0ac2', Customer::find('cust_test_5086xleuh9ft4bn0ac2')->id);
    }

    /**
     * @test
     */
    function it_can_not_find_item_without_id()
    {
        $this->expectException(InvalidRequestArgumentException::class);
        $this->expectExceptionMessage('Id can not be empty.');

        Customer::find('');
    }

    /**
     * @test
     */
    function it_can_refresh_item()
    {
        $this->client->fixture('customer');

        $customer = Customer::find('cust_test_5086xleuh9ft4bn0ac2');
        $customer->email = 'percival56@hotmail.com';

        $this->assertEquals('percival56@hotmail.com', $customer->email);

        $customer->refresh();

        $this->assertEquals('john.doe@example.com', $customer->email);
    }

    /**
     * @test
     */
    function it_can_create_item()
    {
        $this->client->fixture('customer');

        $customer = new Customer();
        $customer->email = 'percival56@hotmail.com';
        $customer->description = 'Percival (id: 31)';

        $customer->create();

        $this->assertNotEmpty($customer->id);
    }
}
