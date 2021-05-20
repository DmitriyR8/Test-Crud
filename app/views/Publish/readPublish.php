<?php if (isset($getPublishById[0]['id'])): ?>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Title: </b><?=$getPublishById[0]['title']; ?></div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <form method="get" action="/getUpdatePublish">
                    <button type="submit" name="publish" value="<?=$getPublishById[0]['id'];?>" class="btn btn-info btn-block">Update</button>
                </form>
            </div>
            <div class="col-sm-6">
                <form method="POST" action="/deletePublish">
                    <button type="submit" name="deletePublish" value="<?=$getPublishById[0]['id'];?>" class="btn btn-danger btn-block">Delete</button>
                </form>
            </div>
        </div>
    </div>

<?php else: ?>

    <div class='container alert alert-danger'>
        <strong>Error!</strong>Such an ID does not exist. <a href="/publish">Publish house</a>
    </div>

<?php endif; ?>
