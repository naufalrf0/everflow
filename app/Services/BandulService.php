<?php

namespace App\Services;

use App\Repositories\BandulRepository;
use Carbon\Carbon;

class BandulService
{
    protected $bandulRepository;

    public function __construct(BandulRepository $bandulRepository)
    {
        $this->bandulRepository = $bandulRepository;
    }

    public function getDashboardData()
    {
        $bandulData = $this->bandulRepository->getLatest();

        return [
            'kecepatan_bandul' => $bandulData->last()->kecepatan_bandul ?? 0,
            'total_energi' => $bandulData->last()->total_daya ?? 0,
            'voltase_baterai' => $bandulData->last()->voltase_baterai ?? 0,
            'report' => $bandulData,
        ];
    }

    public function getAllBandul()
    {
        return $this->bandulRepository->all();
    }

    public function createBandul(array $data)
    {
        $data['waktu_kinerja_bandul'] = Carbon::parse($data['waktu_kinerja_bandul']);
        return $this->bandulRepository->create($data);
    }

    public function updateBandul(int $id, array $data)
    {
        $bandul = $this->bandulRepository->find($id);
        if (!$bandul) {
            throw new \Exception("Bandul with ID {$id} not found.");
        }

        if (isset($data['waktu_kinerja_bandul'])) {
            $data['waktu_kinerja_bandul'] = Carbon::parse($data['waktu_kinerja_bandul']);
        }

        return $this->bandulRepository->update($bandul, $data);
    }

    public function deleteBandul(int $id)
    {
        $bandul = $this->bandulRepository->find($id);
        if (!$bandul) {
            throw new \Exception("Bandul with ID {$id} not found.");
        }

        return $this->bandulRepository->delete($bandul);
    }
}
