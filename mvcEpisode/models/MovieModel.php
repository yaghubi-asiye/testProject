<?php

namespace models;

use config\Database;

require_once 'config/Database.php';

class MovieModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getMovieList()
    {
        $query = "SELECT * FROM movies";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $movies = $stmt->fetchAll();

        return $movies;
    }

    public function saveMovie($movieDetails)
    {
        $query = "INSERT INTO movies (title, description, year) VALUES (:title, :description, :year)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':title', $movieDetails['title']);
        $stmt->bindValue(':description', $movieDetails['description']);
        $stmt->bindValue(':year', $movieDetails['year']);
        $stmt->execute();
    }

    public function getMovieById($movieId)
    {
        $query = "SELECT * FROM movies WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $movieId);
        $stmt->execute();
        $movie = $stmt->fetch();

        return $movie;
    }

    public function updateMovie($movieId, $updatedMovieDetails)
    {
        $query = "UPDATE movies SET title = :title, description = :description, year = :year WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':title', $updatedMovieDetails['title']);
        $stmt->bindValue(':description', $updatedMovieDetails['description']);
        $stmt->bindValue(':year', $updatedMovieDetails['year']);
        $stmt->bindValue(':id', $movieId);
        $stmt->execute();
    }

    public function deleteMovie($movieId)
    {
        $query = "DELETE FROM movies WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $movieId);
        $stmt->execute();
    }
}

?>
