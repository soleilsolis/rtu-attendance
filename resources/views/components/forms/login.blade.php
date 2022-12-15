<form class="ui large form submit-form mt-12"
    data-method="POST"
    data-action="/login"
    data-api="no"
    data-callback="reload"
    >
    @csrf
    <x-field id="email" name="email" type="text" label="Email" placeholder="Email"></x-field>
    <x-field id="password" name="password" type="password" label="Password" placeholder="Password" ></x-field>

    <div class="mt-20">
    <button class="ui fluid large blue button" type="submit">Sign In</button>
</div>    
</form>
