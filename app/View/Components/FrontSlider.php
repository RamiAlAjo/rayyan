<?php
namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Models\PagesSlider;

class FrontSlider extends Component
{
    public $sliders;

    public function __construct()
    {
        $this->sliders = PagesSlider::latest()->get(); // You can filter by status if needed
    }

    public function render(): \Illuminate\View\View|Closure|string
    {
        return view('components.front-slider');
    }
}
