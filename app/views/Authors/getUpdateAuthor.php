<div class="container form-group">
    <?php foreach($getAuthorById as $author): ?>
    <?=dd($author); ?>

        <form action="/postUpdateAuthor" method="post">
            <label for="book"><h4>Name:</h4></label>
            <input type="text" name="name" value="<?=$author['author_name']; ?>" class="form-control"><br>
            <label for="publish"><h4>Publish house:</h4></label>
            <input type="number" name="publish" value="<?=$author['publish_id']; ?>" class="form-control"><br>
            <label for="author"><h4>Book:</h4></label>
            <input type="number" name="book" value="<?=$author['book_id']; ?>" class="form-control"><br>
            <input type="hidden" name="id" value="<?=$author['id']; ?>">
            <button type="submit" name="submit" class="btn btn-primary form-control">Update author</button>
        </form>

    <?php endforeach; ?>

</div>
