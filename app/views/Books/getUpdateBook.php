<div class="container form-group">
    <?php foreach($getBookById as $book): ?>

        <form action="/postUpdateBook" method="post">
            <label for="book"><h4>Title:</h4></label>
            <input type="text" name="book" value="<?=$book['book']; ?>" class="form-control"><br>
            <label for="publish"><h4>Publish house:</h4></label>
            <input type="number" name="publish" value="<?=$book['publish']; ?>" class="form-control"><br>
            <label for="author"><h4>Author:</h4></label>
            <input type="number" name="author" value="<?=$book['author']; ?>" class="form-control"><br>
            <input type="hidden" name="id" value="<?=$book['id']; ?>">
            <button type="submit" name="submit" class="btn btn-primary form-control">Update book</button>
        </form>

    <?php endforeach; ?>

</div>
