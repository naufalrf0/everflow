<?php

namespace App\Repositories;

use App\Models\Komentar;
use Illuminate\Contracts\Pagination\Paginator;

class KomentarRepository implements KomentarRepositoryInterface
{
    public function getApprovedComments(int $bandulId = null): Paginator
    {
        $query = Komentar::approved()->with('user');
        
        if ($bandulId) {
            $query->forBandul($bandulId);
        }

        return $query->orderBy('created_at', 'desc')->paginate(10);
    }

    public function storeComment(array $data): void
    {
        Komentar::create($data);
    }
}
