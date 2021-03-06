<?php

use App\Modules\Ministry\Models\Team;
use App\Modules\Ministry\Repositories\TeamRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamRepositoryTest extends TestCase
{
    use MakeTeamTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TeamRepository
     */
    protected $teamRepo;

    public function setUp()
    {
        parent::setUp();
        $this->teamRepo = App::make(TeamRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTeam()
    {
        $team = $this->fakeTeamData();
        $createdTeam = $this->teamRepo->create($team);
        $createdTeam = $createdTeam->toArray();
        $this->assertArrayHasKey('id', $createdTeam);
        $this->assertNotNull($createdTeam['id'], 'Created Team must have id specified');
        $this->assertNotNull(Team::find($createdTeam['id']), 'Team with given id must be in DB');
        $this->assertModelData($team, $createdTeam);
    }

    /**
     * @test read
     */
    public function testReadTeam()
    {
        $team = $this->makeTeam();
        $dbTeam = $this->teamRepo->find($team->id);
        $dbTeam = $dbTeam->toArray();
        $this->assertModelData($team->toArray(), $dbTeam);
    }

    /**
     * @test update
     */
    public function testUpdateTeam()
    {
        $team = $this->makeTeam();
        $fakeTeam = $this->fakeTeamData();
        $updatedTeam = $this->teamRepo->update($fakeTeam, $team->id);
        $this->assertModelData($fakeTeam, $updatedTeam->toArray());
        $dbTeam = $this->teamRepo->find($team->id);
        $this->assertModelData($fakeTeam, $dbTeam->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTeam()
    {
        $team = $this->makeTeam();
        $resp = $this->teamRepo->delete($team->id);
        $this->assertTrue($resp);
        $this->assertNull(Team::find($team->id), 'Team should not exist in DB');
    }
}
