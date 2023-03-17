<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AgentName;
use App\Models\PollingUnit;
use App\Models\Lga;
use App\Models\AnnouncedPuResult;
use DB;


class PuResultController extends Controller
{
    public function puResults(Request $request){

       $data['lga'] = Lga::all();
        $data['puResult'] = $puResult = PollingUnit::with(['announced_pu_results', 'lga'])->where('uniqueid', $request->uniqueid)->get();

        $data['puTotal'] = $puTotal = PollingUnit::withCount(['announced_pu_results as psum'=> function($query) {
            $query->select(DB::raw('sum(party_score)'));
        }
            ])->where('uniqueid', $request->uniqueid)->get();

       //dd($puTotal);
         return view('inec-result', $data);

    }








    // $data['board'] = $board=  User::select(['username', 'id'])->withCount(['transactions as b_sum'=>function($query){
    //     $query->select( DB::raw( "COALESCE(SUM(ngn_output),0)" ))
    //     ->where('status', 'approved');
    //   },
    //   'transactions as b_count'=>function($query){
    //     $query->where('status', 'approved');
    //   },
    //   'sellcards as c_sum'=>function($query){
    //     $query->select( DB::raw( "COALESCE(SUM(amount*rate),0)" ))
    //     ->where('status', 1);
    //   },
    //   'sellcards as c_count'=>function($query){
    //     $query->where('status', 1);
    //   },

    //   'ethtrades as u_sum'=>function($query){
    //     $query->select( DB::raw( "COALESCE(SUM(amount),0)" ))
    //     ->where('status', 1);
    //   },
    //   'ethtrades as u_count'=>function($query){
    //     $query->where('status', 1);
    //   },

    //   'btctrades as ob_sum'=>function($query){
    //     $query->select( DB::raw( "COALESCE(SUM(amount),0)" ))
    //     ->where('status', 1);
    //   },
    //   'btctrades as ob_count'=>function($query){
    //     $query->where('status', 1);
    //   }


    //  ])
    //  ->orderByRaw('b_count + c_count + u_count + ob_count DESC')
    //  ->paginate(5)->onEachSide(1);
}
