<?php

namespace Tests\Unit\User\ShowUsers;

use Tests\TestCase;
use User\ShowUsers;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowUsersTest extends TestCase
{
    use ShowUsersTrait;
    use RefreshDatabase;

    /**
     * @feature User
     * @scenario Show user list
     * @case Successfully show user list
     *
     * @test
     */
    public function success_showUsersList()
    {
        // GIVEN
        $this->createUserAndBe();
        $request = $this->createRequest([]);

        $tested_function = $this->app->make(ShowUsers::class);

        // WHEN
        $response = $tested_function->show($request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertInstanceOf(User::class, $response->first());
        $this->assertEquals(1, $response->count());
    }

    /**
     * @feature User
     * @scenario Show user list
     * @case Successfully show user list, pagination
     *
     * @test
     */
    public function success_showUsersList_pagination()
    {
        // GIVEN
        $this->createUserAndBe();
        $this->createUsers();
        $request = $this->createRequest(['per_page' => 2]);

        $tested_function = $this->app->make(ShowUsers::class);

        // WHEN
        $response = $tested_function->show($request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertInstanceOf(User::class, $response->first());
        $this->assertEquals(2, $response->count());
    }

    /**
     * @feature User
     * @scenario Show user list
     * @case Successfully show user list, sort by name DESC
     *
     * @test
     */
    public function success_showUsersList_sortByNameDESC()
    {
        // GIVEN
        $this->createUserAndBe();
        $this->createUsers();

        $request = $this->createRequest(['name_sort' => 'DESC']);

        $tested_function = $this->app->make(ShowUsers::class);

        // WHEN
        $response = $tested_function->show($request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertInstanceOf(User::class, $response->first());
        $this->assertEquals(5, $response->count());
        $this->assertEquals('AAA', $response->last()->name);
        $this->assertEquals('BBB', $response->get(2)->name);
    }

    /**
     * @feature User
     * @scenario Show user list
     * @case Successfully show user list, sort by name ASC
     *
     * @test
     */
    public function success_showUsersList_sortByNameASC()
    {
        // GIVEN
        $this->createUserAndBe();
        $this->createUsers();

        $request = $this->createRequest(['name_sort' => 'ASC']);

        $tested_function = $this->app->make(ShowUsers::class);

        // WHEN
        $response = $tested_function->show($request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertInstanceOf(User::class, $response->first());
        $this->assertEquals(5, $response->count());
        $this->assertEquals('AAA', $response->first()->name);
        $this->assertEquals('ABC', $response->get(1)->name);
        $this->assertEquals('BBB', $response->get(2)->name);
        $this->assertEquals('CCC', $response->get(3)->name);
    }

    /**
     * @feature User
     * @scenario Show user list
     * @case Successfully show user list, sort by surname ASC
     *
     * @test
     */
    public function success_showUsersList_sortBySurnameASC()
    {
        // GIVEN
        $this->createUserAndBe();
        $this->createUsers();

        $request = $this->createRequest(['surname_sort' => 'ASC']);

        $tested_function = $this->app->make(ShowUsers::class);

        // WHEN
        $response = $tested_function->show($request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertInstanceOf(User::class, $response->first());
        $this->assertEquals(5, $response->count());
        $this->assertEquals('AAA', $response->first()->surname);
        $this->assertEquals('ABC', $response->get(1)->surname);
        $this->assertEquals('BBB', $response->get(2)->surname);
        $this->assertEquals('CCC', $response->get(3)->surname);
    }

    /**
     * @feature User
     * @scenario Show user list
     * @case Successfully show user list, sort by surname DESC
     *
     * @test
     */
    public function success_showUsersList_sortBySurnameDESC()
    {
        // GIVEN
        $this->createUserAndBe();
        $this->createUsers();

        $request = $this->createRequest(['surname_sort' => 'DESC']);

        $tested_function = $this->app->make(ShowUsers::class);

        // WHEN
        $response = $tested_function->show($request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertInstanceOf(User::class, $response->first());
        $this->assertEquals(5, $response->count());
        $this->assertEquals('AAA', $response->last()->surname);
        $this->assertEquals('BBB', $response->get(2)->surname);
        $this->assertEquals('CCC', $response->get(1)->surname);
    }

    /**
     * @feature User
     * @scenario Show user list
     * @case Successfully show user list, find by name
     *
     * @test
     */
    public function success_showUsersList_findByName()
    {
        // GIVEN
        $this->createUserAndBe();
        $this->createUsers();

        $request = $this->createRequest(['name' => 'aaa']);

        $tested_function = $this->app->make(ShowUsers::class);

        // WHEN
        $response = $tested_function->show($request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertInstanceOf(User::class, $response->first());
        $this->assertEquals(1, $response->count());
        $this->assertEquals('AAA', $response->first()->name);
    }

    /**
     * @feature User
     * @scenario Show user list
     * @case Successfully show user list, find by surname
     *
     * @test
     */
    public function success_showUsersList_findBySurname()
    {
        // GIVEN
        $this->createUserAndBe();
        $this->createUsers();

        $request = $this->createRequest(['surname' => 'a']);

        $tested_function = $this->app->make(ShowUsers::class);

        // WHEN
        $response = $tested_function->show($request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertInstanceOf(User::class, $response->first());
        $this->assertEquals(2, $response->count());
        $this->assertEquals('AAA', $response->first()->surname);
        $this->assertEquals('ABC', $response->last()->surname);
    }

    /**
     * @feature User
     * @scenario Show user list
     * @case Successfully show user list, find by surname, sort surname
     *
     * @test
     */
    public function success_showUsersList_findSortBySurname()
    {
        // GIVEN
        $this->createUserAndBe();
        $this->createUsers();

        $request = $this->createRequest(['surname' => 'a', 'surname_sort' => 'ASC']);

        $tested_function = $this->app->make(ShowUsers::class);

        // WHEN
        $response = $tested_function->show($request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertInstanceOf(User::class, $response->first());
        $this->assertEquals(2, $response->count());
        $this->assertEquals('AAA', $response->first()->surname);
        $this->assertEquals('ABC', $response->last()->surname);
    }
}
