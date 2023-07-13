<?php
require_once 'vendor/autoload.php';
require_once 'controllers/MovieController.php';

use controllers\MovieController;

class Router {
    private $controller;

    public function __construct() {
        $this->controller = new MovieController();
    }

    public function handleRequest($url) {
        $url = $_SERVER['REQUEST_URI'];

        if ($url == '/projects/mvcEpisode/') {

            $this->controller->showMovieList();
        }

        elseif ($url == '/projects/mvcEpisode/movies/create') {
            $this->controller->createMovie();
        }
        elseif ($url == '/projects/mvcEpisode/movies/store' && isset($_POST['url'])) {
            $movieUrl = $_POST['url'];
            $this->controller->storeMovie($movieUrl);
        }
        elseif (preg_match('/^\/projects\/mvcEpisode\/movies\/edit\/(\d+)$/', $url, $matches)) {
            $movieId = $matches[1];
            $this->controller->editMovie($movieId);
        }
        elseif (preg_match('/^\/projects\/mvcEpisode\/movies\/update\/(\d+)$/', $url, $matches)) {
            $movieId = $matches[1];
            $movieUrl = $_POST['url'];
            $this->controller->updateMovie($movieId, $movieUrl);
        }
        elseif (preg_match('/^\/projects\/mvcEpisode\/movies\/delete\/(\d+)$/', $url, $matches)) {
            $movieId = $matches[1];
            $this->controller->deleteMovie($movieId);
        }
        else {
            $this->controller->showErrorPage();
        }
    }
}

?>
