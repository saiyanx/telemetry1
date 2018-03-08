<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\fleet;

class AppController extends Controller
{
      //Controller that takes to diagrams page
        public function groups(){
          return view('Pages/Groups');
        }
        //Controller that takes to reports page
        public function reports(){
          return view('Pages/Reports');
        }
        //Controller that takes to events page
        public function virtualSite(){
          return view('Pages/VirtualSite');
        }
        //Controller that takes to settings page
        public function settings(){
          return view('Pages/Settings');
        }
        //Controller that takes to fleets page
        public function trends(){
          return view('Pages/Trends');
        }
        //Controller that takes to fleets page
        public function contact(){
          return view('Pages/Contact');
        }

        //Controller that takes to gauge page
        public function gauge(){
          return view('Pages/Dashboard');
        }

        /*
        * Create a new controller instance.
        *
        * @return void
        */
           public function exportFile(Request $request){
               //$products = Product::get()->toArray();

               //validate the data
               $this->validate($request, [
                 'fleet' =>'required',
                 'format' =>'required',
               ]);

               $filename = date('Y-m-d H:i:s');
               $formData= $request->all();
               $type = $formData['format'];//file type
            //  dd($formData);
               if ($formData['fleet'][0]=='All')
               {
                  $exportData = fleet::get()->toArray();
               }
               else{
                     $total_selected = count($formData['fleet']);
                     $fleetData = [];
                     $exportData = "";
                     for($i=0; $i<$total_selected; $i++ )
                     {
                       $fleetData[] = $formData['fleet'][$i];
                       if (is_array($exportData))
                       {
                       $temp = fleet::get()->where('Engine_RPM', $fleetData[$i])->toArray();
                       $exportData[] = array_pop($temp);
                       }
                       else{
                         $exportData = fleet::get()->where('Engine_RPM', $fleetData[$i])->toArray();
                       }
                      }
                }
            //   dd($exportData);

               //Get table $rows from database

               return \Excel::create($filename, function($excel) use ($exportData) {
                   $excel->sheet('sheet name', function($sheet) use ($exportData)
                   {
                       $sheet->fromArray($exportData);
                   });
               })->download($type);

           }
}
