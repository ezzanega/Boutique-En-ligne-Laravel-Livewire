<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public $slide_id;

    public function deleteSlide()
    {
        $slider = HomeSlider::find($this->slide_id);
        $slider->delete();
        session()->flash('message','Slider has been deleted successfully!');
    }

    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders]);
    }
}
