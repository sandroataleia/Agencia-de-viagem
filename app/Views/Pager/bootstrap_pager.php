<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <ul class="pagination">
        <?php if ($pager->hasPreviousPage()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getFirst() ?>" class="page-link" aria-label="<?= lang('Pager.first') ?>">
                    <span aria-hidden="true">Primeiro</span>
                </a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getPreviousPage() ?>" class="page-link" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link): ?>
            <li <?= $link['active'] ? 'class="active page-item"' : 'page-item' ?>>
                <a href="<?= $link['uri'] ?>" class="page-link">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNextPage()) : ?>
            <li class="page-item">
                <a href="<?= $pager->getNextPage() ?>" class="page-link" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
                </a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getLast() ?>" class="page-link" aria-label="<?= lang('Pager.last') ?>">
                    <span aria-hidden="true">Último</span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>