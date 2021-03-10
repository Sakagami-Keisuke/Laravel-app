<?php

namespace Tests\Feature\Database;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use App\Models\User;

class DatabaseTest extends TestCase
{
    public function testDatabase()
    {
        $this->assertDatabaseHas('users', [
            'name'=> 'Keisuke Sakagami',
            'email'=>'test@test.com'
        ]);
    }
}

    // use RefreshDatabase; //テーブルレコードが消えるので php artisan db:seedをすること

    // public function testDatabase()
    // {
    //     $testUser = new User();
    //     $testUser->id = '3';
    //     $testUser->name = 'テストユーザー';
    //     $testUser->email = 'testUuser1@test.com';
    //     $testUser->password = 'test9876';
    //     $saveUser = $testUser->save();

    //     $this->assertTrue($saveUser);
    // }

    // public function testDatabase()
    // {
    //     $this->assertTrue(
    //         Schema::hasColumn('users', 'id'),
    //         1
    //     );
    // }
// }
