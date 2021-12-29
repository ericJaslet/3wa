<?php

use PHPUnit\Framework\TestCase;

use App\User;
use App\ModelPrepare;

class UserTestPrepare extends TestCase
{

    protected $model;
    protected $pdo;
    protected $users = [
          ['username' => 'Alan'],
          ['username' => 'Sophie'],
          ['username' => 'Bernard'],
      ];

    public function setUp(): void
    {
        $this->pdo = new \PDO('sqlite::memory:');
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        $this->pdo->exec(
            "CREATE TABLE IF NOT EXISTS user
          (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username VARCHAR( 225 )
          )
            "
        );
        $this->model = new ModelPrepare($this->pdo);
        $this->model->hydrate($this->users);
    }

    /**
     * @test count method insert
     */
    // public function testSeedsCreate()
    // {
    //   $countArray = count($this->users);

    //   $stmt = $this->model->pdo->query("SELECT count(*) FROM `user` WHERE 1");
    //   $numberOfRows = intval( $stmt->fetchColumn() );

    //   $this->assertTrue( $countArray === $numberOfRows);
    // }

    /**
     * @test save method insert
     */
    // public function testInsertSave()
    // {
    //   $countUsers = count($this->users) + 1;

    //   $user = new User();
    //   $user->__set('username', 'Eric');
    //   $this->model->save($user);

    //   $stmt = $this->model->pdo->query("SELECT count(*) FROM `user` WHERE 1");
    //   $numberOfRows = intval($stmt->fetchColumn());

    //   $this->assertTrue( $countUsers === $numberOfRows);
    // }

     /**
     * @test save method update
     */
    // public function testUpdateSave()
    // {
    //   $user = $this->model->find(3);
    //   $user->__set('username', 'Alice');
    //   $this->model->update($user);

    //   $userInsert = $this->model->find(3);
    //   $this->assertEquals('Alice', $userInsert->__get('username'));
    // }

    /**
     * @test delete resource by id
     */
    // public function testDelete()
    // {
    //   $countUsers = count($this->users) - 1;
    //   $this->model->delete(3);

    //   $stmt = $this->model->pdo->query("SELECT count(*) FROM `user` WHERE 1");
    //   $numberOfRows = intval($stmt->fetchColumn());

    //   $this->assertTrue( $countUsers === $numberOfRows);
    // }

}
