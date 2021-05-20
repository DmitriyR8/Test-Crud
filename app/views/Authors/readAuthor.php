<?php if (isset($getAuthorById[0]['author_id'])): ?>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Name: </b><?=$getAuthorById[0]['author_name']; ?></div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><b>Publish house: </b><?=$getAuthorById[0]['publish_title']; ?></div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><b>Book: </b><?=$getAuthorById[0]['book_title']; ?></div>
        </div>
            <div class="row">
                <div class="col-sm-6">
                    <form method="get" action="/getUpdateBook">
                        <button type="submit" name="books" value="<?=$getAuthorById[0]['author_id'];?>" class="btn btn-info btn-block">Update</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form method="POST" action="/deleteBook">
                        <button type="submit" name="deleteBook" value="<?=$getAuthorById[0]['author_id'];?>" class="btn btn-danger btn-block">Delete</button>
                    </form>
                </div>
            </div>
    </div>

<?php else: ?>

    <div class='container alert alert-danger'>
        <strong>Error!</strong>Such an ID does not exist. <a href="/authors">Authors</a>
    </div>

<?php endif; ?>
