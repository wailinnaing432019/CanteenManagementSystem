<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class TableView extends Component
{
    public $tables;
    public $select;
    public function mount($tables){
        $this->tables=$tables;
        // $tableNo=Cookie::get('tableNo');
        $tableNo = json_decode(Cookie::get('tableNo'), true);
        if($tableNo){
            $this->select=$tableNo;
        }
    }
    public function storeTable($table){
        $tableNo = json_decode(Cookie::get('tableNo'), true);
                if (!isset($tableNo)) {
            // dd("DON't ");
            Cookie::queue('tableNo', json_encode($table), 60 * 24 * 1); // Store the cart data in a cookie for 30 days
         session()->flash('success'," TableNo Selected Success");
         $this->select=$table;


        }
        else
        {
            if($tableNo==$table){
                // dd("Same");
                Cookie::queue(Cookie::forget('tableNo'));
                session()->flash('success',"Unselect Success");
                $this->select="";

            }else{
                // dd("NO Same");
            Cookie::queue('tableNo', json_encode($table), 60 * 24 * 1); // Store the cart data in a cookie for 30 days
            session()->flash('success'," TableNo Selected Success");
            $this->select=$table;

            }
        }
        // if (!isset($tableNOtableNo )) {
        //     $tableNo  ="";
        // }

        // $tableNo = $table;
        // Cookie::queue('tableNo', json_encode($tableNo), 60 * 24 * 1); // Store the cart data in a cookie for 30 days
        //  session()->flash('success'," TableNO Selected Success");
        //  $this->select=$tableNo;
    }
    public function render()
    {

        return view('livewire.customer.table-view',);
    }
}