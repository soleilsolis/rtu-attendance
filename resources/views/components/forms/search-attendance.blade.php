@php
    use App\Models\Section;
@endphp

<form id="attendance-form" class="ui large form" method="GET" action="/attendance" >
    @csrf
    
    <x-field label="Select Class" type="dropdown" name="section_id" id="section_id" value="{{ $section_id }}">
        @foreach (Section::all() as $section)
            <option value="{{ $section->id }}">{{ $section->course->name }} - {{ $section->name }}</option>
        @endforeach
    </x-field>

    <x-field label="Date" type="date" name="created_at" id="created_at" value="{{ $date }}" />
       
    <button class="ui blue large button mt-5 print:hidden" type="submit">View</button>

</form>