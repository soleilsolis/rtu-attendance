@php
     use Illuminate\Support\Facades\Auth;
    
@endphp

<div class="ui large inverted bg-[#001122] visible borderless vertical sidebar menu pt-5 portrait:hidden print:hidden">
    <div class="item flex items-center mb-10 pl-5">
        <img src="{{ Vite::asset('resources/image/AJ2.png') }}" alt="logo" class="ui circular w-16 image inline">
        <span class="ml-6 text-4xl font-semibold">
            RTU
            <br>
            <span class="text-base font-normal">
                Computer Laboratory
            </span>
        </span>
    </div>

    <a href="/dashboard" class="item active m-3 ">
        <span class="text-2xl ">
            Dashboard
        </span>
    </a>


    <a href="/attendance" class="item m-3">
        <span class="text-2xl ">
            Attendance
        </span>
    </a>

    @if (Auth::user()->type === 'admin')
        <a href="/courses" class="item m-3">
            <span class="text-2xl ">
                Courses
            </span>
        </a>
    
        <a href="/sections" class="item m-3">
            <span class="text-2xl ">
                Sections/Classes
            </span>
        </a>
        <a href="/subjects" class="item m-3">
            <span class="text-2xl ">
                Subjects
            </span>
        </a>

        <a href="/instances" class="item m-3">
            <span class="text-2xl ">
                Instances
            </span>
        </a>

        <a href="/schedules" class="item m-3">
            <span class="text-2xl ">
                Schedules
            </span>
        </a>

       

        

        <a href="/users" class="item m-3">
            <span class="text-2xl ">
                Users
            </span>
        </a>
    @endif

    <div class="item mt-auto">

        <div class="flex items-center">
            <div class="mx-auto">
                <form class="inline mx-2" action="/logout" method="POST">
                    @csrf
                    <button class="ui large icon button" type="submit">
                        <i class="sign-out alternate icon"></i>
                    </button>
                </form>
        
                <form class="inline mx-2" action="/logout" method="POST">
                    @csrf
                    <button class="ui large icon button" type="submit">
                        <i class="cog icon"></i>
                    </button>
                </form>
            </div> 
        </div>
    </div>
</div>
