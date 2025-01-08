<div>
    <div class="breadcrumbs text-sm">
        @php
            $path = explode('/', Request::path());
            $breadcrumb = [];
            $currentPath = '';

            foreach ($path as $segment) {
                $currentPath .= '/' . $segment;
                $breadcrumb[] = [
                    'label' => ucfirst($segment),
                    'url' => url($currentPath),
                ];
            }
        @endphp
    
        <ul>
            
            @foreach ($breadcrumb as $crumb)
                <li>
                    <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
