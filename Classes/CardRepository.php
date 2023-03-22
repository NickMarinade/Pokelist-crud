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

    public function find(int $id): array
    {
        $stmt = $this->databaseManager->connection->prepare("SELECT * FROM cards WHERE id = ?");
        $stmt->execute([$id]);
        $card = $stmt->fetch(PDO::FETCH_ASSOC);
        return $card;
    }

    public function get(): array
    {

        $stmt = $this->databaseManager->connection->prepare("SELECT * FROM cards");
        $stmt->execute();
        $cards = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cards;
    }

    public function update(string $name, string $type, int $weight, int $height, int $id): void
    {
        $stmt = $this->databaseManager->connection->prepare("UPDATE cards SET name = ?, type = ?, weight = ?, height = ? WHERE id = ?");
        $stmt->execute([$name, $type, $weight, $height, $id]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->databaseManager->connection->prepare("DELETE FROM cards WHERE id = ?");
        $stmt->execute([$id]);
    }
}
