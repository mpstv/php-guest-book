<?php include $_SERVER['DOCUMENT_ROOT'] . '\\App\\Views\\Shared\\header.php'?>
<a href="/">Back to list</a>
<form action="create" method="post">
 <p>Your name: <input type="text" name="author" /></p>
 <p>Review: <input type="text" name="content" /></p>
 <p><input type="submit" value="Create" /></p>
</form>
<?php include $_SERVER['DOCUMENT_ROOT'] . '\\App\\Views\\Shared\\footer.php'?>