<?php
namespace App\Livewire;

use App\Models\Quiz;
use App\Models\SpellingPuzzle;
use App\Models\Story;
use App\Models\User;
use App\Models\WordPuzzle;
use App\Service\ChartHelper;
use Illuminate\Support\Carbon;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $blogDate = 25, $userDate = 25, $postDate = 25;

    public function getDate($date)
    {
        $dateRanges = [
            5   => Carbon::yesterday(),
            10  => Carbon::today(),
            25  => Carbon::now()->subDays(7),
            50  => Carbon::now()->subDays(30),
            100 => Carbon::now()->subDays(90),
        ];
        // dd('call');

        return $dateRanges[$date] ?? Carbon::today();
    }

    public function updateUserChart()
    {
        $data = ChartHelper::getUserChartData($this->getDate($this->userDate));
        $this->dispatch('updateUserChart', $data);
    }

    public function updatePostChart()
    {
        $data = ChartHelper::getTopicChartData($this->getDate($this->postDate));
        $this->dispatch('updatePostChart', $data);
    }

    public function updateBlogChart()
    {
        $data = ChartHelper::getBlogChartData($this->getDate($this->blogDate));
        $this->dispatch('updateBlogChart', $data);
    }
    public function render()
    {
        $admin    = User::where('type', 2)->count();
        $parent   = User::where('type', 0)->count();
        $student  = User::where('type', 1)->count();
        $quiz     = Quiz::count();
        $story    = Story::count();
        $word     = WordPuzzle::count();
        $spelling = SpellingPuzzle::count();
        $users    = ChartHelper::getUserChartData($this->getDate($this->userDate));

        $data = [
            'admin'    => $admin,
            'parent'   => $parent,
            'student'  => $student,
            'quiz'     => $quiz,
            'word'     => $word,
            'spelling' => $spelling,
            'story'    => $story,
            'users'    => $users,
        ];

        return view('livewire.admin-dashboard', $data);
    }
}
