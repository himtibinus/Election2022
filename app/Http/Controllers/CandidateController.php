<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use App\Models\Candidate;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CandidateController extends Controller
{
    public function index()
    {
        Session::put('Page', "home");
        $cand = Candidate::all();
        return view('home')->with([
            'candidates' => $cand
        ]);
    }
    public function vote()
    {
        Session::put('Page', "vote");
        $cand = Candidate::all();
        return view('vote')->with([
            'candidates' => $cand
        ]);
    }
    public function candidate()
    {
        Session::put('Page', "candidate");
        $cand = Candidate::all();
        return view('candidate')->with([
            'candidates' => $cand
        ]);
    }
    public function update(Request $request, $id)
    {
        if(Auth::user()->voted == 0){
            $time_now = Carbon::now()->format('Y-m-d H:i:s');
            $user = User::find($id);
            $user->voted = 1;
            $user->voted_value = $request->get('candidate');
            $user->vote_time = $time_now;
            $candidate = Candidate::find($request->get('candidate'));
            $candidate->total_vote +=1;
            $candidate->save();

            $user->save();

            if(!str_starts_with(Auth::user()->nim, 'D')) DB::table('email_queue')->insert([
                'email' => Auth::user()->email,
                'sender_name' => 'HIMTI Election 2021',
                'message_type' => 'MARKDOWN',
                'priority' => -2,
                'subject' => 'Your vote on HIMTI Election 2021 has been recorded',
                'message' => 'Thank you for participating in HIMTI Election 2021. Your vote for **Candidate #' . $request->get('candidate') . ': ' . $candidate->name . '** has been successfully recorded.\n\n+ **Voting timestamp (WIB/ICT/UTC+7):** ' . $time_now . '\n+ **Your NIM, KDDSN, or BINUSIAN ID:** ' . $user->nim . '\n\nPlease keep this email safe as a valid evidence of your vote, in case of any disputes of voting results in the future.\n\n**HIMTI Election 2021** is proudly presented and organized by **Himpunan Mahasiswa Teknik Informatika (HIMTI) BINUS University**, an official BINUS University student association for the **Computer Science department** in Bandung, Malang, and Senayan (BINUS International) campuses, as well as **School of Computer Science** in Alam Sutera and Kemanggisan campuses. To learn more about us, please visit [https://himti.or.id](https://himti.or.id) or follow our Instagram account, [@himti_binus](https://instagram.com/himti_binus/).\n\nOne Family, One Goal!',
                'created_at' => $time_now
            ]);
            return back();
        }


        return back();
    }

    public function chart()
    {
        $vote = Candidate::all();

        return view('chart')->with([
            'votes' => $vote
        ]);
    }
}
