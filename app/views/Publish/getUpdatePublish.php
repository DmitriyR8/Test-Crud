<div class="container form-group">
    <?php foreach($getPublishById as $publish): ?>

    <form action="/postUpdatePublish" method="post">
        <label for="title"><h4>Title:</h4></label>
        <input type="text" name="title" value="<?=$publish['title']; ?>" class="form-control"><br>
        <input type="hidden" name="id" value="<?=$publish['id']; ?>">
        <button type="submit" name="submit" class="btn btn-primary form-control">Update publish house</button>
    </form>

    <?php endforeach; ?>

</div>
