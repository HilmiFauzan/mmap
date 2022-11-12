<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function viewFeedBack()
    {
        return view('dashboard/dashboard_content/feedback/dash_feedback');
    }

    public function tambahFeedBack(Request $request)
    {
         $rules = [
            'star'           => 'required',
            'feed'             => 'required'
        ];
        
        $messages = [
            'star.required'    => 'Rating wajib diisi,',
            'feed.required'    => 'Feedback wajib diisi'
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $item = Feedback::updateOrcreate(
            [ 'email' => Auth::User()->email],
            [ 'email'=> Auth::User()->email, 'image'=> Auth::User()->file, 'name'=> Auth::User()->name.' '.Auth::User()->name_end, 'feed' => $request->feed, 'rating' => $request->star]
        );
        $item->save();

        return redirect()->back()->with('success','Feedback Anda Telah Kami Terima, Terimakasih Banyak Atas Kesempatan Waktunya');
    }
}
