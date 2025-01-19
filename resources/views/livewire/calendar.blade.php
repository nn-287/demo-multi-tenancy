<div>
    <x-layouts.app>

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
        <div class="mt-4">
            <div class="overflow-x-auto">
                <div class="overflow-x-auto">
                    <table class="table">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Event title</th>
                        <th>Start day</th>
                        <th>End day</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->start }}</td>
                                    <td>{{ $event->end }}</td>
                                    
                                </tr>
                            @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-layouts.app>
</div>