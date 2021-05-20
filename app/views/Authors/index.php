<div class="container form-group">
    <button name="redirect-author" id="redirect-author" class="btn btn-primary form-control">Create author</button>
</div>
<div class="container">

    <?php if(!empty($allAuthors)): ?>
        <?php foreach($allAuthors as $author): ?>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Name: </b><?=$author['author_name']; ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><b>Publish house: </b><?=$author['publish_title']; ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><b>Book: </b><?=$author['book_title']; ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <form action="/readAuthor" method="get">
                        <button type="submit" name="authors" value="<?=$author['author_id'];?>" class="btn btn-default btn-block">Read author</button>
                    </form>
                </div>
                <div class="col-sm-4">
                    <form action="/getUpdateAuthor" method="get">
                        <button type="submit" name="authors" value="<?=$author['author_id'];?>" class="btn btn-info btn-block">Update</button>
                    </form>
                </div>
                <div class="col-sm-4">
                    <form action="/deleteAuthor" method="post">
                        <button type="submit"  name="deleteAuthor" value="<?=$author['author_id'];?>" class="btn btn-danger btn-block">Delete</button>
                    </form></br>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
