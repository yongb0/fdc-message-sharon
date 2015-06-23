<?php foreach($posts as $post): ?>
    <h1><?php echo $post['Post']['id']; ?><h1>
    <p><?php echo $post['Post']['username']; ?><p>
    <p>Posted by: <?php echo $post['Post']['password']; ?><p>
    <hr />
<?php endforeach; ?>