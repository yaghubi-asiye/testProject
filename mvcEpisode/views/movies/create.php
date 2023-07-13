<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>فرم ورود لینک فیلم</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h4>فرم ورود لینک فیلم</h4>
    <form action="/projects/mvcEpisode/movies/store" method="post">
        <div class="mb-3">
            <label for="movie_link" class="form-label">لینک فیلم:</label>
            <select id="url" name="url" class="form-select" required>
                <option value="https://api.episode.club/v4/movie/10015463">https://episode.club/movies/10015463</option>
                <option value="https://api.episode.club/v4/movie/10001410">https://episode.club/movies/10001410</option>
                <option value="https://api.episode.club/v4/movie/10013316">https://episode.club/movies/10013316</option>
                <option value="https://api.episode.club/v4/movie/10000472">https://episode.club/movies/10000472</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
    </form>
</div>
</body>
</html>
