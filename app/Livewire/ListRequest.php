<?php
namespace App\Livewire;
use App\Models\TenancyRequest;
use App\Models\Tenant;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Mail\TestEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

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
        $password = bin2hex(random_bytes(8 / 2));
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

                User::create([
                    'name' => $tenantRequest->name, 
                    'email' => $tenantRequest->email, 
                    'password' => bcrypt($password), 
                    'tenant_id' => $tenant->id
                ]);

                $appUrl = parse_url(config('app.url'), PHP_URL_HOST); 

                session(['SESSION_DOMAIN' => "{$domain}.{$appUrl}"]);

                $tenant->domains()->create([
                    'domain' => "{$domain}.{$appUrl}", 
                ]);
                
                $this->credentialsMail($id,$domain,$appUrl,$password);

                $this->dispatch('showNotification', 'Tenant and Credentials have been successfully created!','success');  

        } catch (\Exception $e) {
            $this->dispatch('showNotification', 'This tenant already exists!','error');        

            Log::error('Tenant creation failed:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
 
    public function credentialsMail($id, $domain, $appUrl, $password)
    {
        $tenantRequest = TenancyRequest::find($id);

        Mail::to($tenantRequest->email)->send(new TestEmail(
            $tenantRequest->name,                     // Tenant's name
            "{$domain}.{$appUrl}/login",              // Login URL
            $tenantRequest->email,                    // Tenant's email
            $password                                  // Tenant's password
        ));
    }


   
    public function render()
    {
        return view('livewire.list-request');
    }
}