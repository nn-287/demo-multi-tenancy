<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use BigBlueButton\BigBlueButton;
use BigBlueButton\Parameters\CreateMeetingParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;
use Livewire\Component;

class Assingment extends Component
{
    public $currentTab = '';
    public $tabTitle = 'online';
    public $meetingName = '';
    public $meetingStatus = null;
    public $meetingActive = false;
    public $showMeeting = false;
    public $meetingUrl = '';
    public $participantCount = 0;
    public $meetingId;

    public function createMeeting() {
        
       
        $bbb = new BigBlueButton();
        
        $meetingParams = new CreateMeetingParameters();
        $meetingParams->setMeetingName($this->meetingName ?: 'Test Meeting');
        $meetingParams->setMeetingId('test-meeting-' . time());
        $this->meetingUrl = 'https://mock-meeting-url.com/join/' . $this->meetingId;
        
        
        $response = $bbb->createMeeting($meetingParams);
        
        if ($response->getReturnCode() === 'SUCCESS') {
            $this->meetingActive = true;
            $this->meetingStatus = 'Active';
            
            $this->dispatch('notify', [
                'message' => 'Meeting created successfully',
                'type' => 'success'
            ]);
        } else {

            $this->meetingActive = false;
            $this->meetingStatus = 'Failed';
            
            $this->dispatch('notify', [
                'message' => 'Failed to create meeting',
                'type' => 'error'
            ]);
        }
        

    }


    public function joinMeeting(){
        $authenticatedUser = Auth::user()->name.rand(1000,9999);
        $authenticatedUserId = Auth::user()->id;
        if(!$this->meetingActive){
            $this->dispatch('notify', ['message' => 'Meeting is not active','type' => 'error']);
            return;
        }



        $b = new BigBlueButton();
        $joinMeetingParam = new JoinMeetingParameters();
        $joinMeetingParam->setUsername($authenticatedUser);
        $joinMeetingParam->setUserId($authenticatedUserId);
        // $joinMeetingParam->setMeetingId($this->meetingId);
        $joinMeetingParam->setRole("VIEWER");

        $response = $b->JoinMeeting($joinMeetingParam);
        
        if ($response->getReturnCode() === 'SUCCESS') {
            $this->showMeeting = true;
            $this->meetingActive = true;
            $this->meetingStatus = 'In Progress';
            
            $this->dispatch('notify', ['message' => 'Meeting created successfully','type' => 'success']);
        } 
        else {

            $this->meetingActive = false;
            $this->meetingStatus = 'Failed';
            
            $this->dispatch('notify', ['message' => 'Failed to create meeting','type' => 'error']);
        }
    }


    public function handleTabSwitch($currentTab){
        $this->currentTab = $currentTab;
        if($currentTab == $this->tabTitle && Auth::user()){
            $this->index();
        }
    }
    
    public function render()
    {
        return view('livewire.assingment');
    }
}
