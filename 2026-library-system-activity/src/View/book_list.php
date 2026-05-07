<?php
declare(strict_types=1);

namespace App\View;
namespace App\Repository;
?>
<html>
<head><title>Library Books</title></head>
<body>
    <h1> Book list </h1>
    <table border = "1" cellopadding = "5" cellspacing = "0">
        <thead>
            <tr><th>ID</th>
            <th>Title</th>
            <th>Author</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?= htmlspecialchars((string) $book->getId()) ?></td>
                <td><?= htmlspecialchars($book->getTitle()) ?></td>
                <td><?= htmlspecialchars($book->getAuthor()) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
