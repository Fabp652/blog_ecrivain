<?php $title = $post['title']; ?>

<?php ob_start() ?>
<h1>Billet simple pour l'Alaska</h1>

<div class='chapter'>
    <h3>
        <?php echo htmlspecialchars($post['title']); ?>
    </h3>
    <p>
        <?php echo nl2br(htmlspecialchars($post['content'])); ?>
    </p>
    <p class='date_post'>Publié le <?php echo $post['creation_date_fr']; ?></p>
</div>

<h2>Commentaires</h2>

<?php
if(isset($_SESSION['pseudo'])){
?>
<form action='index.php?action=create-comment&amp;id=<?=$post['id'] ?>' method="POST">
    <textarea name="comment"></textarea>
    <input type="submit" name="Ajouter un commentaire" />
</form>
<?php
}
?>

<?php 
while($comment = $comments->fetch()){
?>
<div class='comments'>
<p><?php echo htmlspecialchars($comment['author']); ?> le <?php echo $comment['comment_date_fr']; ?> :</p>
<P><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></P>
<?php
if($_SESSION['pseudo'] == $comment['author']){
?>
<a href="index.php?action=change-comment&amp;post-id=<?=$post['id']?>&amp;comment-id=<?=$comment['id']?>">Modifier</a>
<?php
}
?>
</div>
<?php
}

$comments->closeCursor();
$content = ob_get_clean();
require('view/template.php');