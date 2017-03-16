<?php

namespace LaraChimp\MangoRepo\Tests;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use LaraChimp\MangoRepo\Tests\Fixtures\Models\User;
use LaraChimp\MangoRepo\Tests\Fixtures\Repositories\UserRepository;

class TestRepository extends AbstractTestCase
{
    /**
     * Tests that EloquentModel annotation works
     * and we are able to get the Model when building
     * a repository.
     *
     * @return void
     */
    public function testEloquentAnnotationOnRepositories()
    {
        $users = $this->app->make(UserRepository::class);
        $this->assertInstanceOf(User::class, $users->getModel());
    }

    /**
     * Test that the all method returns
     * all models in the Database.
     *
     * @return void
     */
    public function testAllMethod()
    {
        $now = Carbon::now();
        DB::table('users')->insert([
            'email'      => 'hello@larachimp.com',
            'name'       => 'User 1',
            'password'   => Hash::make('123'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('users')->insert([
            'email'      => 'hello2@larachimp.com',
            'name'       => 'User 2',
            'password'   => Hash::make('123'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}