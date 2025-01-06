<?php

namespace App\Livewire;
use App\Models\TenancyRequest;
use App\Models\Tenant;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
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
        // dd($id, "Tahya Masr");

        $tenantRequest = TenancyRequest::findOrFail($id);
        $subdomain = $tenantRequest->slug;

        try {
                $tenant = new Tenant();
                $tenant->id = $tenantRequest->slug;
                $tenant->slug = "Nanosa";
                $tenant->data = [
                    'tenancy_db_name' => 'tenant_' . $subdomain,
                ];
                $tenant->save();

               
                // Log::info('Tenant created successfully:', [
                //     'id' => $tenant->id,
                //     'data' => $tenant->data
                // ]);

            $tenantDBname = 'tenant_' . $subdomain;
        
            DB::statement("CREATE DATABASE `$tenantDBname`");

            DB::purge('tenant');
            config(['database.connections.tenant.database' => $tenantDBname]);
            DB::reconnect('tenant');

            Artisan::call('migrate', ['--database' => 'tenant']);

            return back()->withSuccess('Tenant approved and database created successfully.');
    
        } catch (\Exception $e) {
            Log::error('Tenant creation failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            session()->flash('error', 'Failed to create tenant: ' . $e->getMessage());
            return back();
        }
    }
   
    public function render()
    {
        return view('livewire.list-request');
    }
}
