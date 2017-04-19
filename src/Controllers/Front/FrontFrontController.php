<?php

namespace Foostart\Front\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use URL,
    Route,
    Redirect;
use Foostart\Front\Models\Fronts;

class FrontFrontController extends Controller
{
    public $data = array();
    public function __construct() {

    }

    public function index(Request $request)
    {

        $obj_front = new Fronts();
        $fronts = $obj_front->get_fronts();
        $this->data = array(
            'request' => $request,
            'fronts' => $fronts
        );
        return view('front::front.front.index', $this->data);
        
    }
     public function index1(Request $request)
    {

        $obj_front = new Fronts();
        $fronts = $obj_front->get_fronts();
        $this->data = array(
            'request' => $request,
            'fronts' => $fronts
        );
        return view('front::front.front.index1', $this->data);
        
    }

}