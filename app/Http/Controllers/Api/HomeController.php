<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizLeaderboard;
use App\Models\QuizQuestion;
use App\Models\Story;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function getQuiz()
    {
        $quiz = Quiz::where('status',1)->get();

        $data = [
            'quiz' => $quiz
        ];

        return $this->success($data);
    }

    public function getQuizQuestions($slug)
    {
        $quiz = Quiz::where('status',1)->where('slug',$slug)->first();
        if(!$quiz)
        {
            return $this->error('not found');
        }
        $questions = QuizQuestion::where('quiz_id',$quiz->id)->with('options')->get();
        $data = [
            'quiz' => $quiz,
            'questions' => $questions
        ];

        return $this->success($data);
    }

    public function setLeaderboard(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'correctAnswer' => 'required|integer',
            'wrongAnswer' => 'required|integer',
            'quizId' => 'required|integer'
        ]);

        if($validator->fails())
        {
            return $this->validationError($validator->errors()->first());
        }

        $user = Auth::user();
        $leaderboard = QuizLeaderboard::where('user_id',$user->id)->where('quiz_id',$request->quizId)->first();
        if($leaderboard)
        {
            $leaderboard->wrongAnswer = $request->wrongAnswer;
            $leaderboard->correctAnswer = $request->correctAnswer;
            $leaderboard->save();
            return $this->success(null,'success');
        }
        $leaderboard = new QuizLeaderboard();
        $leaderboard->wrongAnswer = $request->wrongAnswer;
        $leaderboard->correctAnswer = $request->correctAnswer;
        $leaderboard->user_id = $user->id;
        $leaderboard->quiz_id = $request->quizId;
        $leaderboard->save();

        return $this->success(null,'success');
    }

    public function getLaderbaord()
    {
        $today = Carbon::today();

        $todayLeaderboard = DB::table('quiz_leaderboards')
            ->join('users', 'quiz_leaderboards.user_id', '=', 'users.id')
            ->select(
                'users.id as user_id',
            'users.name',
            'users.email',
            'users.image',
            DB::raw('SUM(correctAnswer) as total_correct'))
            ->whereDate('quiz_leaderboards.updated_at', $today)
            ->groupBy('users.id', 'users.name', 'users.email','users.image')
            ->orderByDesc('total_correct')
            ->get();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $monthlyLeaderboard = DB::table('quiz_leaderboards')
        ->join('users', 'quiz_leaderboards.user_id', '=', 'users.id')
            ->select('users.id as user_id',
            'users.name',
            'users.email',
            'users.image', DB::raw('SUM(correctAnswer) as total_correct'))
            ->whereBetween('quiz_leaderboards.updated_at', [$startOfMonth, $endOfMonth])
            ->groupBy('users.id', 'users.name', 'users.email','users.image')
            ->orderByDesc('total_correct')
            ->get();
        $globalLeaderboard = DB::table('quiz_leaderboards')
        ->join('users', 'quiz_leaderboards.user_id', '=', 'users.id')
        ->select('users.id as user_id',
            'users.name',
            'users.email',
            'users.image', DB::raw('SUM(correctAnswer) as total_correct'))
        ->groupBy('users.id', 'users.name', 'users.email','users.image')
        ->orderByDesc('total_correct')
        ->get();

        $data = [
            'globalLeaderboard' => $globalLeaderboard,
            'monthlyLeaderboard' => $monthlyLeaderboard,
            'todayLeaderboard' => $todayLeaderboard
        ];

        return $this->success($data);
    }

    public function getStory()
    {
        $story = Story::where('status',1)->with('contents')->get();

        $data = [
            'story' => $story
        ];

        return $this->success($data);
    }
}