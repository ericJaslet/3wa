<?php

namespace App;

class ModelPrepare
{

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Delete resource by pk
     *
     * @param int $id
     * @return \PDOStatement
     */
    public function delete(int $id)
    {
        $sql = 'DELETE FROM user WHERE id=:id';
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    /**
     * Return all resources
     *
     * @return array resources
     */
    public function all()
    {
        $stmt = $this->pdo->query("SELECT * FROM user");

        return $stmt->fetchAll(\PDO::FETCH_CLASS, 'App\\User');
    }

    /**
     * Return all resources
     *
     * @return array resources
     */
    public function update(User $user)
    {
        $sql = "UPDATE user SET username=:username WHERE id=:id";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([':username' => $user->username, ':id' => $user->id]);

        return $stmt->setFetchMode(\PDO::FETCH_CLASS, 'App\\User');
    }

    /**
     * @param array $id
     * @return mixed
     */
    public function find(int $id)
    {
        $sql = "SELECT * FROM user  WHERE id=:id";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetchObject('App\\User');
    }

    /**
     * Return all resources
     *
     * @return array resources
     */
    public function hydrate(array $users): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO user (username) VALUES (:username)");
        foreach ($users as $u) {
            $stmt->execute([ ':username' => $u['username'] ]);
        }
    }

    public function save(User $user): void
    {
        $sql = "INSERT INTO user (username) VALUES (:username)";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute([':username' => $user->username]);
    }
}
