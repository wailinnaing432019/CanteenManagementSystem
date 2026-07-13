<?php

namespace App\Http\Livewire\Customer;

use App\Models\Like;
use App\Models\Menu;
use Livewire\Component;
use App\Models\Category;

class MenuPage extends Component
{
    public $category="";
    public $menus,$categories;
    public $storeData;
    public string $sorting;
    public string $search="";
        protected $queryString=['search'];

    public function mount($menus,$categories){
        $this->search="";
        $this->menus=$menus;
        $this->categories=$categories;
    }
    public function render()
    {
        foreach ($this->menus as $key => $menu) {
            $menu->likeCount=Like::where('menu_id',$menu->id)->where('status','1')->count();
        }
        $this->categories=Category::where('status','1')->get();
        return view('livewire.customer.menu-page',[
            'menus'=>$this->menus,
        ]);
    }

    public function updated($property){
        if($property==="category"){
            $this->search="";
            if($this->category==null){
                $this->menus=Menu::where('status','1')->get();
            }else{

                $this->menus=Menu::where('category_id',$this->category)->where('status','1')->orderBy('price','desc')->get();
                // $this->storeData=Menu::where('category_id',$this->category)->where('status','1')->orderBy('price','desc')->get();
            }
        }
        if($property==="search"){
            $this->category="";
            $this->menus=Menu::where('status','1')
                                ->where('name','like',"%".$this->search."%")
                                ->orWhere('price','like',"%{$this->search}%")
                                ->get();
        }
        if($property==="sorting"){
            $this->category="";
            // $this->search="";

            $this->menus=Menu:: where('status','1')
                                ->where('name','like',"%{$this->search}%")
                                ->orWhere('price','like',"%{$this->search}%")->orderBy('price',$this->sorting)->get();
        }

    }
}