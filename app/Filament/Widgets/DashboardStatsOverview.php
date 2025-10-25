<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Semester;
use App\Models\Tahunajaran;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::where('status', '1')->count())->color('success'),
            Stat::make('Tahun Ajaran', Tahunajaran::count())->color('warning'),
            Stat::make('Semester', Semester::count())->color('info'),
        ];
    }
}
