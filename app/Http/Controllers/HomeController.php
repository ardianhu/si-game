<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Score;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // Query and aggregate the leaderboard data
        $leaderboard = Score::select('user_id', DB::raw('SUM(score) as total_score'))
            ->groupBy('user_id')
            ->with('user')
            ->orderBy('total_score', 'desc')
            ->take(10) // Adjust the number to get the top N users
            ->get();

        $logged = auth()->user();
        $isFinished = Score::where('user_id', $logged->id)->where('level_id', 7)->first();
        return view('landing', compact('leaderboard', 'logged', 'isFinished'));
    }

    public function game()
    {
        $logged = auth()->user();
        // dd($loged);

        return view('clients.game', compact('logged'));
    }
    public function newGame()
    {
        $logged = auth()->user();
        $user = User::find($logged->id);

        $user->level_id = 1;
        $user->save();

        Score::where('user_id', $logged->id)->delete();

        return redirect('/game');
    }
    public function updateLevel(Request $request)
    {
        $level = $request->input('level');
        $logged = auth()->user();
        $user_id = $logged->id;
        $time = $request->input('time');

        // Parse the time string
        list($hour, $minute, $second) = explode(':', $time);
        $totalSeconds = ($hour * 3600) + ($minute * 60) + $second;

        // Calculate the score
        $baseScore = 1000;
        $timeThreshold = 20;
        $penaltyPerSecond = 10;

        if ($totalSeconds > $timeThreshold) {
            $penalty = ($totalSeconds - $timeThreshold) * $penaltyPerSecond;
        } else {
            $penalty = 0;
        }

        $finalScore = max($baseScore - $penalty, 0); // Ensure score doesn't go negative

        $old_level = Level::where('level_number', $level)->first();
        $new_level = Level::where('level_number', $level + 1)->first();

        $old_level_id = $old_level->id;
        $new_level_id = $new_level ? $new_level->id : null;

        $score = new Score();
        $score->user_id = $user_id;
        $score->level_id = $old_level_id;
        $score->score = $finalScore;
        $score->save();

        $user = User::find($user_id);
        if ($new_level_id == $old_level_id + 1) {
            $user->level_id = $new_level_id;
            $user->save();
            return response()->json(['message' => 'Level updated successfully']);
        } else {
            return response()->json(['message' => 'You have completed the game']);
        }
    }
}
