<?php

namespace App\Http\Controllers;

use App\Models\MonitoringSystem;
use DateTime;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($filter)
    {
        $today = new DateTime();
        $countDaily = MonitoringSystem::whereDate('created_at', $today->format('Y-m-d'))->get()->count();
        $countMonthly = MonitoringSystem::whereYear('created_at', $today->format('Y'))
                                        ->whereMonth('created_at', $today->format('m'))
                                        ->get()->count();
        $countAnnual = MonitoringSystem::whereYear('created_at', $today->format('Y'))->get()->count();

        $data = MonitoringSystem::latest()->limit(5)->get();


        if ($filter == 'monthly') {
            // laporan per bulan pada tahun sekarang
            $bulan = (int)$today->format('n');
            $arrCountMonthly = [];
            for ($i=1; $i <= $bulan; $i++) { 
                $arrCountMonthly[] = MonitoringSystem::whereYear('created_at', $today->format('Y'))
                                                    ->whereMonth('created_at', $i)
                                                    ->count();
            }
            $dataBulan = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'];
            $paramForGrafik = [
                'series' => $arrCountMonthly,
                'categories' => $dataBulan,
            ]; 
        }elseif($filter == 'yearly'){
            // laporan per tahun dari 10 tahun sebelumnya hingga sekarang
            $thCurrent = (int)$today->format('Y');
            $arrCountYearly = []; 
            $dataTahun = [''];
            for($i = $thCurrent-10; $i <= $thCurrent; $i++){
                $dataTahun[] = $i;
                $arrCountYearly[] = MonitoringSystem::whereYear('created_at', $i)
                                                        ->count();
            }
            $paramForGrafik = [
                'series' => $arrCountYearly,
                'categories' => $dataTahun,
            ]; 
        }else{
            // laporan Per tanggal dari 10 hari sebelumnya hingga sekarang
            $tglCurrent = (int)$today->format('d');
            $arrCountDaily = [];
            $dataTanggal = [];
            $dataTanggal = [''];
            for ($i=1; $i <= $tglCurrent; $i++) { 
                $dataTanggal[] = $i;
                $arrCountDaily[] = MonitoringSystem::whereYear('created_at', $today->format('Y'))
                                                    ->whereMonth('created_at', $today->format('m'))
                                                    ->whereDay('created_at', $i)
                                                    ->count();
            }
            $paramForGrafik = [
                'series' => $arrCountDaily,
                'categories' => $dataTanggal,
            ]; 
        }

        return view('pages.dashboard.index', [
            "title" => "Dashboard",
            "menu" => "Dashboard",
            "data" => $data,
            "countDaily" => $countDaily,
            "countMonthly" => $countMonthly,
            "countAnnual" => $countAnnual,
            "paramForGrafik" => $paramForGrafik,
        ]);
    }
}
