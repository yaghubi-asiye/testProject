<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Movie</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-5">ویرایش فیلم  </h1>
    <form action="/projects/mvcEpisode/movies/update/<?php echo $movie['id']; ?>" method="post">
        <input type="hidden" name="movie_id" value="<?php echo $movie['id']; ?>">
        <div class="mb-3">
            <label for="title" class="form-label">عنوان</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $movie['title']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">سال انتشار </label>
            <input type="text" class="form-control" id="year" name="year" value="<?php echo $movie['year']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">توضیحات</label>
            <textarea class="form-control" id="description" name="description" rows="5" required><?php echo $movie['description']; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Movie</button>
    </form>
</div>
</body>
</html>
