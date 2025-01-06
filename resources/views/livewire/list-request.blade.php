<div>
    <head>
        <style>
            .dropdown-menu a {
                padding: 10px 15px;
                display: block;
                color: #333;
                text-decoration: none;
            }

            .dropdown-menu a:hover {
                background-color: #f1f1f1;
            }
        </style>
    </head>
    {{-- <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Tenancy Requests</h1>
        <a class="btn btn-primary">Create Tenancy Request</a>
    </div> --}}
    <div class="mt-4">
        <div class="overflow-x-auto">
            <div class="overflow-x-auto">
                <table class="table">
                  <!-- head -->
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Description</th>
                      <th>Email</th>
                      <th>Slug</th>
                      <th>Actions</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($tenancyRequests as $tenancyRequest)
                            <tr>
                                <td>{{ $tenancyRequest->id }}</td>
                                <td>{{ $tenancyRequest->name }}</td>
                                <td>{{ $tenancyRequest->phone_number }}</td>
                                <td>{{ $tenancyRequest->description }}</td>
                                <td>{{ $tenancyRequest->email }}</td>
                                <td>{{ $tenancyRequest->slug }}</td>
                                <td>
                                    <div class="dropdown dropdown-end">
                                        <div tabindex="0" role="button" class="btn m-1">&#x2022;&#x2022;&#x2022;</div>
                                        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                            <li>
                                                <button wire:click="handleTenantRequest({{ $tenancyRequest->id }})" class="block w-full px-4 py-2 text-white bg-green-500 hover:bg-green-600 rounded-md">
                                                    Accept
                                                </button>
                                            </li>
                                            <li>
                                                <button wire:click="handleTenantRequest({{ $tenancyRequest->id }})" class="block w-full px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-md">
                                                    Reject
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>