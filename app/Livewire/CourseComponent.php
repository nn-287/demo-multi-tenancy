<?php

namespace App\Livewire;
use App\Models\Course;
use App\Models\CourseUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CourseComponent extends Component
{
    public $courses = [];
    public $toggle = false;
    public $selectedCourseId = null;
    public $showCourses;
    protected $listeners = ['courseList' => 'showCourseList'];
 
    public function mount($showCourses = false)
    {
        $this->showCourses = $showCourses;
        if ($this->showCourses && Auth::user()) {
            $this->list();
        }
    }
    
    public function showCourseList()
    {
        $this->selectedCourseId = null;
        $this->toggle = false;
    }

    public function toggleName($courseId)
    {
        $this->selectedCourseId = $courseId;
        $this->toggle = !$this->toggle;
    }

    public function list()
    {
        $userId = Auth::id();
        $courseUsers = CourseUser::where('user_id', $userId)->get();
        $this->courses = Course::whereIn('id', $courseUsers->pluck('course_id'))->get();
    }

    public function render()
    {
        return view('livewire.course-component');
    }
}
