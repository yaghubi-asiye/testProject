<?php

namespace controllers;

require_once 'models/MovieModel.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use models\MovieModel;

class MovieController
{
    private $model;

    public function __construct()
    {
        $this->model = new MovieModel();
    }

    public function showMovieList()
    {
        $movies = $this->model->getMovieList();
        include 'views/movies/index.php';
    }

    public function createMovie()
    {
        include 'views/movies/create.php';
    }

    public function storeMovie($url)
    {
        $movieDetails = $this->getMovieDetails($url);
        $this->model->saveMovie($movieDetails);
        header("Location: /projects/mvcEpisode/");
    }

    public function editMovie($movieId)
    {
        $movie = $this->model->getMovieById($movieId);
        include 'views/movies/edit.php';
    }

    public function updateMovie($movieId)
    {
        $updatedMovieDetails = array(
            'title' => isset($_POST['title']) ? $_POST['title'] : '',
            'description' => isset($_POST['description']) ? $_POST['description'] : '',
            'year' => isset($_POST['year']) ? $_POST['year'] : ''
        );
        $this->model->updateMovie($movieId, $updatedMovieDetails);
        header("Location: /projects/mvcEpisode/");
    }

    public function deleteMovie($movieId)
    {
        $this->model->deleteMovie($movieId);
        header("Location: /projects/mvcEpisode/");
    }

    private function getMovieDetails($url)
    {
        $client = new Client();

        try {
            $response = $client->request('GET', $url);
            $body = $response->getBody()->getContents();
            $movieDetails = $this->parseMovieDetails($body);
            return $movieDetails;
        } catch (RequestException $e) {
            return null;
        }
    }
    private function parseMovieDetails($body)
    {
        $data = json_decode($body, true);
        $movieTitle = $data['data']['title_fa'];
        $releaseYear = $data['data']['publish_date'];
        $description = $data['data']['description_fa'];

        $movieDetails = array(
            'title' => $movieTitle,
            'year' => $releaseYear,
            'description' => $description
        );

        return $movieDetails;
    }

    public function showErrorPage()
    {
        include 'views/error_page.php';
    }
}
