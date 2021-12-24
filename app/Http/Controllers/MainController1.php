<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuServices;
use App\Http\Services\Product\ProductService;

class MainController1 extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider, MenuServices $menu, ProductService $product)
    {
        $this->slider=$slider;
        $this->menu=$menu;
        $this->product=$product;
    }

    public function index()
    {
        return view('main', [
        'title' => ' Trang chủ',
            'sliders' => $this -> slider->show(),
            'menus'=> $this->menu->show(),
            'products'=> $this->product->get()
        ]);
    }

    public function loadProduct(Request $request)
    {
        $page=$request->input('page', 0);

        $result =$this->product->get($page);
    }
}
