<?php if (isset($getBookById[0]['id'])): ?>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Title: </b><?=$getBookById[0]['book']; ?></div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><b>Publish house: </b><?=$getBookById[0]['publish']; ?></div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><b>Author: </b><?=$getBookById[0]['author']; ?></div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <form method="get" action="/getUpdateBook">
                    <button type="submit" name="books" value="<?=$getBookById[0]['id'];?>" class="btn btn-info btn-block">Update</button>
                </form>
            </div>
            <div class="col-sm-6">
                <form method="POST" action="/deleteBook">
                    <button type="submit" name="deleteBook" value="<?=$getBookById[0]['id'];?>" class="btn btn-danger btn-block">Delete</button>
                </form>
            </div>
        </div>
    </div>

<?php else: ?>

    <div class='container alert alert-danger'>
        <strong>Error!</strong>Such an ID does not exist. <a href="/books">Books</a>
    </div>

<?php endif; ?>
