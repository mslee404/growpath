<?php

namespace App\Http\Controllers;

use App\Models\UserGrowpath;

abstract class Controller
{
    // Data untuk animasi siram di halaman home (dibaca sekali lewat flash session)
    protected function flashSiram(int $xp, ?array $plantChange): void
    {
        session()->flash('siram', [
            'xp'    => $xp,
            'from'  => $plantChange ? UserGrowpath::plantStageUrl($plantChange['name'], $plantChange['from']) : null,
            'stage' => $plantChange['to'] ?? null,
        ]);
    }
}
