<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Team;
use App\User;

class TeamTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_team_has_a_name()
    {
        $team = new Team(['name' => 'Programación JJE']);

        $this->assertEquals('Programación JJE', $team->name);
    }

    /** @test */
    public function a_team_can_add_members() {
        $team = factory(Team::class)->create();

        $user = factory(User::class)->create();
        $userTwo = factory(User::class)->create();

        $team->add($user);
        $team->add($userTwo);

        $this->assertEquals(2, $team->count());

    }

    /** @test */
    function it_has_a_maximum_size() {
        $team = factory(Team::class)->create(['size' => 2]);

        $user = factory(User::class)->create();
        $userTwo = factory(User::class)->create();

        $team->add($user);
        $team->add($userTwo);

        $this->assertEquals(2, $team->count());

        $this->setExpectedException('Exception');

        $userThree = factory(User::class)->create();
        $team->add($userThree);
    }

    /** @test */
    function a_team_can_add_multiple_members_at_once() {
        $team = factory(Team::class)->create();

        $users = factory(User::class, 2)->create();

        $team->add($users);

        $this->assertEquals(2, $team->count());
    }
}
