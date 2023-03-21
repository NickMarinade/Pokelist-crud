<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(string $name, string $type, int $weight, int $height): void
    {
        $stmt = $this->databaseManager->connection->prepare("INSERT INTO cards (name, type, weight, height) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $type, $weight, $height]);
    }

    // // Get one
    // public function find(): array
    // {
    // }

    // Get all
    public function get(): array
    {

        $stmt = $this->databaseManager->connection->prepare("SELECT * FROM cards");
        $stmt->execute();
        $cards = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cards;

    }

    // public function update(): void
    // {
    // }

    // public function delete(): void
    // {
    // }
}
