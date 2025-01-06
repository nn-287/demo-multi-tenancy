<?php
namespace App\Livewire;
use App\Models\TenancyRequest;
use App\Models\Tenant;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ListRequest extends Component
{
    public $toggle;
    public $tenancyRequests = [];
    protected $listeners = ['tenantRequestAction' => 'handleTenantRequest'];    

    public function mount($toggle)
    {
        $this->toggle = $toggle;
        $this->listRequests();  
    }

    public function listRequests()
    {
        if ($this->toggle) {
            $this->tenancyRequests = TenancyRequest::all(); 
        }
    }

    public function handleTenantRequest($id)
    {
        $tenantRequest = TenancyRequest::find($id);
        $domain = $tenantRequest->slug;

        try {
                $tenant = Tenant::create([
                    'id' => $domain,
                    'data' => [
                        'created_at' => now(),
                        'updated_at' => now(),
                        'tenancy_db_name'=> 'tenant_' . $domain,
                    ],
                ]);
                $appUrl = parse_url(config('app.url'), PHP_URL_HOST); 
                $dbName = env('DB_DATABASE');

                $tenant->domains()->create([
                    'domain' => "{$domain}.{$dbName}.{$appUrl}", 
                ]);

                $this->dispatch('showNotification', 'Tenant and its related data has been successfully created!','success');  

        } catch (\Exception $e) {
            $this->dispatch('showNotification', 'This tenant already exists!','error');        

            Log::error('Tenant creation failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
   
    public function render()
    {
        return view('livewire.list-request');
    }
}