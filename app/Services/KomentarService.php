<?php

namespace App\Services;

use App\Repositories\KomentarRepositoryInterface;

class KomentarService
{
    protected KomentarRepositoryInterface $komentarRepository;

    public function __construct(KomentarRepositoryInterface $komentarRepository)
    {
        $this->komentarRepository = $komentarRepository;
    }

    public function getApprovedComments(int $bandulId = null)
    {
        return $this->komentarRepository->getApprovedComments($bandulId);
    }

    public function storeComment(array $data)
    {
        $this->komentarRepository->storeComment($data);
    }
}
