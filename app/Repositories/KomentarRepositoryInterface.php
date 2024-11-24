<?php

namespace App\Repositories;

use Illuminate\Contracts\Pagination\Paginator;

interface KomentarRepositoryInterface
{
    public function getApprovedComments(int $bandulId = null): Paginator;

    public function storeComment(array $data): void;
}
