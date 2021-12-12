<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;


//testing if the tennant/manager can make a new account by providing his credentials

class UserTest extends TestCase
{

    public function test_create_new_tennant()
    {

        $user = new User();
        $user->fillable = ['name', 'name@mail.com', '1234', ' 0'];

        $this->assertEquals($user->fillable, ['name', 'name@mail.com', '1234', ' 0']);
    }


    public function test_create_new_manager()
    {

        $user = new User();
        $user->fillable = ['Admin', 'Admin@mail.com', '1234', '1'];

        $this->assertEquals($user->fillable, ['Admin', 'Admin@mail.com', '1234', '1']);
    }
}
