<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Respositories\UserRepository;
use App\Respositories\SalesRepository;

class ChartController extends Controller
{
    public function __construct(UserRepository $userRepository, SalesRepository $salesRepository){
        $this->userRepository = $userRepository;
        $this->salesRepository = $salesRepository;
    }
    
    public function viewUser() {
        return view('admin.userReport');
    }
    
    public function viewSales() {
        return view('admin.salesReport');
    }
    
    public function getNewUser(Request $request) 
    {
        $year = $request->get('year');
        
        $datas = $this->userRepository->getNewUser($year);
        
        $chartType = "line";
        $chartTitle = $year . " New User Growth";
        $xTitle = ['','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $yTitle = "Number of new users";
        $chartSeries = "New User";
        
        return view('admin.chart',compact('datas','chartType' ,'chartTitle','xTitle','yTitle','chartSeries'));
    }
    
    public function getAmount(Request $request){
        $year = $request->get('year');
        
        $datas = $this->salesRepository->getAmount($year);
        
        $chartType = "column";
        $chartTitle = $year . " Sales";
        $xTitle = ['','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        $yTitle = "Amount of Sales";
        $chartSeries = "Sales";
        return view('admin.chart',compact('datas','chartType' ,'chartTitle','xTitle','yTitle','chartSeries'));
    }
}
