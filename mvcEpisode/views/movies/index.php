<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Movie List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">لیست فیلم ها</h1>
    <a href="/projects/mvcEpisode/movies/create" class="btn btn-primary mb-3">ایجاد فیلم</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>عنوان</th>
            <th>سال انتشار</th>
            <th>توضیحات</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($movies as $movie): ?>
            <tr>
                <td><?php echo $movie['title']; ?></td>
                <td><?php echo $movie['year']; ?></td>
                <td><?php echo $movie['description']; ?></td>
                <td>
                    <a href="/projects/mvcEpisode/movies/edit/<?php echo $movie['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                    <form method="post" action="/projects/mvcEpisode/movies/delete/<?php echo $movie['id']; ?>" class="d-inline">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
