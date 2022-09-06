@props(['categories','currentCategory'])
<div x-data="{show : false}" @click.away="show=false">
    <button @click = " show=true " class="px-8">{{ isset($currentCategory) ? $currentCategory->name : 'Category' }}</button>
    <div x-show="show">
        @foreach($categories as $category)                    
            <a class="block hover:bg-gray-500 hover:text-white {{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-gray-800 text-white' : '' }}" 
                href="/?category={{$category->slug}}&{{ http_build_query(request()->except('cateogory')) }}">{{$category->name}}</a>
        @endforeach
    </div>

<!-- <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22">
    <g fill="none" fill-rule="evenodd">
        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
        </path>
        <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
    </g>
</svg> -->
</div>