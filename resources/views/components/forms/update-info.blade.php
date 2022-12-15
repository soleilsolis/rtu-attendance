<form class="ui large form submit-form" 
    data-method="POST" 
    data-action="/user/update" 
    data-callback="reload"
>
    @csrf
    <x-field id="id" name="id" type="hidden" value=""></x-field>
    
    <x-field id="name" name="name" type="text" label="Username" >{{  $user->name  }}</x-field>
    <x-field id="email" name="email" type="email" label="Email" >{{ $user->email }}</x-field>
    <x-field id="password" name="password" type="password" label="Password" >{{ $user->password }}</x-field>

    <div class="equal width fields">
        <x-field id="first_name" name="first_name" type="text" label="First Name" >{{ $user->first_nam }}</x-field>
        <x-field id="last_name" name="last_name" type="text" label="Last Name" >{{  $user->last_name }}</x-field>

    </div>

    <x-field id="address" name="address" type="textarea" label="Address" >{{ $user->address }}</x-field>

    <x-field label="Select Class" type="dropdown" name="section_id" id="section_id">
        @foreach (Section::all() as $section)
            <option value="{{ $section->id }}">{{ $section->course->name }} - {{ $section->name }}</option>
        @endforeach
    </x-field>
    


    <button class="ui fluid big blue button mt-12" type="submit">Save</button>
</form>