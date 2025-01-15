<?php

namespace App\Livewire;
use BigBlueButton\BigBlueButton;
use BigBlueButton\Parameters\CreateMeetingParameters;
use Livewire\Component;

class BTest extends Component
{
    // public function mount(){
    //     $this->test();
    // }

    public function test() {
        try {
            $bbb = new BigBlueButton();
            

            $meetingParams = new CreateMeetingParameters();
            $meetingParams->setMeetingName('Test Meeting');
            $meetingParams->setMeetingId('test-meeting-' . time());

            
            
            $response = $bbb->createMeeting($meetingParams);
            dd($response);
            
            if ($response->getReturnCode() === 'SUCCESS') {
                return [
                    'success' => true,
                    'message' => 'Meeting created successfully',
                    'meetingID' => $meetingParams->getMeetingId(),
                   
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Meeting creation failed'
                ];
            }
            
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ];
        }

    }
    
    public function render()
    {
        return view('livewire.b-test');
    }
}
