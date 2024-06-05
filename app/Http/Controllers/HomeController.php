<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
use App\TrainingBatch;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function welcome(){

        // Mapper::map(10.318686,123.90317049999999);
        Mapper::map(10.318686,123.90317049999999,['zoom' => 19, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 30]]);

        $trainingBatches = TrainingBatch::isActive()->limit(4)->get();

        return view('welcome', compact('trainingBatches'));
    }

    public function contact(){

        // Mapper::map(10.318686,123.90317049999999);
        Mapper::map(10.318686,123.90317049999999,['zoom' => 19, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 30]]);

        $trainingBatches = TrainingBatch::isActive()->limit(4)->get();

        return view('contact', compact('trainingBatches'));
    }

    public function about(){

        return view('about');

    }

    public function index()
    {
        return redirect()->to(route('itp_create'));
    }
}
