@unless ($breadcrumbs->isEmpty())
    <div class="bg-primarycolor text-secondary-200 p-5 w-full rounded-md mb-6">
        <ol class="rounded flex flex-wrap text-white-800 gap-1 items-center">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($loop->first)
                    <a href="{{ $breadcrumb->url }}" class="hover:text-blue-600 hover:underline focus:text-blue-600 focus:underline flex">
                        <i class="ri-home-4-line text-lg inline-block"></i>
                    </a>
                    <span class="breadcrumb-divider">/</span>
                @elseif (!is_null($breadcrumb->url))
                    <a href="{{ $breadcrumb->url }}" class="hover:text-blue-600 hover:underline focus:text-blue-600 focus:underline"
                        title="{{ $breadcrumb->title }}">
                        {{ $breadcrumb->title }}
                    </a>
                    @if(!$loop->last)
                    <span class="breadcrumb-divider">/</span>
                    @endif
                @endif
            @endforeach
        </ol>
    </div>
@endunless
