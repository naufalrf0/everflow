<?php

namespace App\Repositories;

use App\Models\Bandul;

class BandulRepository
{
    public function all()
    {
        return Bandul::all();
    }

    public function getLatest(int $count = 10)
    {
        return Bandul::orderBy('waktu_kinerja_bandul', 'desc')->take($count)->get();
    }

    public function create(array $data)
    {
        return Bandul::create($data);
    }

    public function update(Bandul $bandul, array $data)
    {
        $bandul->update($data);
        return $bandul;
    }

    public function find(int $id): ?Bandul
    {
        return Bandul::find($id);
    }

    public function delete(Bandul $bandul)
    {
        return $bandul->delete();
    }

    public function count()
    {
        return Bandul::count();
    }
}
