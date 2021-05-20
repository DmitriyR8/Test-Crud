<div class="container form-group">
    <button name="redirect-publish" id="redirect-publish" class="btn btn-primary form-control">Create publish house</button>
</div>
<div class="container">

    <?php if(!empty($allPublish)): ?>
        <?php foreach($allPublish as $publish): ?>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Title: </b><?=$publish['title']; ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <form action="/readPublish" method="get">
                        <button type="submit" name="publish" value="<?=$publish['id'];?>" class="btn btn-default btn-block">Read publish house</button>
                    </form>
                </div>
                <div class="col-sm-4">
                    <form action="/getUpdatePublish" method="get">
                        <button type="submit" name="publish" value="<?=$publish['id'];?>" class="btn btn-info btn-block">Update</button>
                    </form>
                </div>
                <div class="col-sm-4">
                    <form action="/deletePublish" method="post">
                        <button type="submit"  name="deletePublish" value="<?=$publish['id'];?>" class="btn btn-danger btn-block">Delete</button>
                    </form></br>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
