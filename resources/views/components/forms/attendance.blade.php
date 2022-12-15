<form id="attendance-form" class="ui large form submit-form" 
    data-method="POST" 
    data-action="/attendances" 
    data-callback="reload"
>
    @csrf
    <button class="ui blue button float-right" type="submit">Yes</button>

</form>