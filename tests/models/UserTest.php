<?php

namespace NeonTsunami;

use PHPUnit_Framework_TestCase;
use Illuminate\Support\Facades\Hash;

class UserTest extends PHPUnit_Framework_TestCase
{
    public $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = new User;
    }

    public function testGetFullNameAttribute()
    {
        $this->user->first_name = 'Foo';
        $this->user->last_name = 'Bar';

        $this->assertEquals('Foo Bar', $this->user->full_name);
    }

    public function testSetPasswordAttribute()
    {
        Hash::shouldReceive('make')
            ->with('secret')
            ->once()
            ->andReturn('foo');

        $this->user->password = 'secret';

        $this->assertEquals('foo', $this->user->password);
    }
}
