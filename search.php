<?php

namespace Artemis;

require_once __DIR__ . '/src/entity/Book.php';

use Artemis\Book;

$pageTitle = 'Bibliothèque';

if (!empty($_GET['bookTitle'])) {
    $title = 'Résultat de la recherche';
    $subtitle = $_GET['bookTitle'];
    $books = Book::searchBooks($_GET['bookTitle']);
} else {
    $title = 'Bibliothèque';
    $subtitle = 'Tous les livres';
    $books = Book::getAllBooks();
}

include __DIR__ . '/templates/header.php';
include __DIR__ . '/templates/hero-books.php';

?>

<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -m-4">
            <?php 
                if (!empty($books)) {
                    foreach ($books as $book) {
                        include __DIR__ . '/templates/_partials/book_card.php';
                    }
                } else {
                    echo '<p class="text-center">Aucun livre disponible</p>';
                }
            ?>
        </div>
    </div>
</section>

<?php

include __DIR__ . '/templates/footer.php';
?>
