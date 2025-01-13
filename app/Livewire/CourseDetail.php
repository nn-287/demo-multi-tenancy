<?php

namespace App\Livewire;
use App\Models\Course;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class CourseDetail extends Component
{
    use WithFileUploads;

    public $courseId;
    protected $listeners = ['reloadComponent' => '$refresh'];
    public $course;
    public $video;
    public $videoUrl;
    public $showUploadModal = false;
    public $showInitialModal = false;

    public function mount($courseId)
    {
        $this->courseId = $courseId;
        $this->course = Course::find($courseId);

        $media = $this->course->getFirstMedia('videos');
        if ($media) {
            $this->videoUrl = asset('storage/' . $media->id . '/' . $media->file_name);
        }else {
            $this->showInitialModal = true; 
        }
    }


    public function openUploadModal()
    {
        $this->showInitialModal = false;
        $this->showUploadModal = true;
    }

    #[On('reloadComponent')] 
    public function saveAndCloseModal()
    {
        if ($this->video) {
            $this->saveVideo();
            $this->showUploadModal = false;
            $this->video = null;
            $this->mount($this->courseId);
        }
    }

    public function saveVideo()
    {
        $this->validate([
            'video' => 'required|file|mimes:mp4,mov,avi,wmv|max:10240',
        ]);
        

        $this->course->clearMediaCollection('videos');
        $this->course->addMedia($this->video->getRealPath())->toMediaCollection('videos');

        $this->videoUrl = $this->course->getFirstMediaUrl('videos');
        $this->dispatch('showNotification', 'Video file successfully uploaded!','success');  
    }


    public function BackToCourse(){
        $this->dispatch('courseList');

    }

    public function render()
    {
        return view('livewire.course-detail', ['video' => $this->course->getFirstMediaUrl('videos')]);
    }
}
