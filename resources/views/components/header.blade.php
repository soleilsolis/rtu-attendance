<header class="ui secondary fitted menu">
    <div class="fitted item landscape:hidden mr-5">
        <svg class="w-8 h-8" viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false" class="style-scope yt-icon" style="pointer-events: none; display: block; width: 100%; height: 100%;"><g class="style-scope yt-icon"><path d="M21,6H3V5h18V6z M21,11H3v1h18V11z M21,17H3v1h18V17z" class="style-scope yt-icon"></path></g></svg>
    </div>

    <div class="fitted item ">
        <div class="font-bold text-5xl portrait:text-3xl">@yield('title')</div>
    </div>

    <div class="right menu">

        @if (\Illuminate\Support\Facades\Auth::user()->type === 'patient')
            <div class="item text-black cursor-pointer" data-tooltip="New Appointment" data-position="bottom center" >
                <i onclick="$('#new-appointment').modal('show')" class="large plus icon" ></i>
            </div>
        @endif

   
    </div>
</header>

