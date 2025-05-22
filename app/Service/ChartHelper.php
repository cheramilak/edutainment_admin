<?php
namespace App\Service;

use App\Models\Quiz;
use App\Models\SpellingPuzzle;
use App\Models\Story;
use App\Models\User;
use App\Models\WordPuzzle;

class ChartHelper
{

    public static function getUserChartData($startDate)
    {
        return User::where('created_at', '>=', $startDate)
            ->selectRaw("DATE_FORMAT(created_at,'%b %d')  as date, COUNT(*) as count")
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(fn($user) => ['x' => $user->date, 'y' => $user->count])
            ->toArray();

    }

    public static function getQuizChartData($startDate)
    {
        return Quiz::where('created_at', '>=', $startDate)
            ->selectRaw("DATE_FORMAT(created_at,'%b %d')  as date, COUNT(*) as count")
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(fn($post) => ['x' => $post->date, 'y' => $post->count])
            ->toArray();
    }

    public static function getStoryChartData($startDate)
    {
        return Story::where('created_at', '>=', $startDate)
            ->selectRaw("DATE_FORMAT(created_at,'%b %d')  as date, COUNT(*) as count")
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(fn($blog) => ['x' => $blog->date, 'y' => $blog->count])
            ->toArray();
    }
    public static function getWordQuestionChartData($startDate)
    {
        return WordPuzzle::where('created_at', '>=', $startDate)
            ->selectRaw("DATE_FORMAT(created_at,'%b %d')  as date, COUNT(*) as count")
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(fn($blog) => ['x' => $blog->date, 'y' => $blog->count])
            ->toArray();
    }

    public static function getSpellingQuestionChartData($startDate)
    {
        return SpellingPuzzle::where('created_at', '>=', $startDate)
            ->selectRaw("DATE_FORMAT(created_at,'%b %d')  as date, COUNT(*) as count")
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(fn($blog) => ['x' => $blog->date, 'y' => $blog->count])
            ->toArray();
    }
}
