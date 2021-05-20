<div class="container form-group">
    <button name="redirect-book" id="redirect-book" class="btn btn-primary form-control">Create book</button>
</div>
<div class="container">

    <?php if(!empty($allBooks)): ?>
        <?php foreach($allBooks as $book): ?>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Name: </b><?=$book['book']; ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><b>Publish: </b><?=$book['publish']; ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><b>Author: </b><?=$book['author']; ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <form action="/readBook" method="get">
                        <button type="submit" name="books" value="<?=$book['id'];?>" class="btn btn-default btn-block">Read book</button>
                    </form>
                </div>
                <div class="col-sm-4">
                    <form action="/getUpdateBook" method="get">
                        <button type="submit" name="books" value="<?=$book['id'];?>" class="btn btn-info btn-block">Update</button>
                    </form>
                </div>
                <div class="col-sm-4">
                    <form action="/deleteBook" method="post">
                        <button type="submit"  name="deleteBook" value="<?=$book['id'];?>" class="btn btn-danger btn-block">Delete</button>
                    </form></br>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
