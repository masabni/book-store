@if(Session::has('flash_message_success'))
    <div data-notify="container" class="col-xs-11 col-sm-4 alert alert-success animated fadeIn" role="alert"
         data-notify-position="top-center"
         style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1033; top: 20px; left: 0px; right: 0px; animation-iteration-count: 1;">
        <span data-notify="icon" class="fa fa-check"></span>
        <span data-notify="title"></span>
        <span data-notify="message">
            {{ Session::get('flash_message_success') }}
            @php(Session::forget('flash_message_success'))
        </span>
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                data-notify="dismiss">&times;</button>
    </div>

@elseif(Session::has('flash_message_failed'))
    <div data-notify="container" class="col-xs-11 col-sm-4 alert alert-danger animated fadeIn" role="alert"
         data-notify-position="top-center"
         style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out; z-index: 1033; top: 20px; left: 0px; right: 0px; animation-iteration-count: 1;">
        <span data-notify="icon" class="fa fa-times"></span>
        <span data-notify="title"></span>
        <span data-notify="message">
            {{ Session::get('flash_message_failed') }}
            @php(Session::forget('flash_message_failed'))
        </span>
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                data-notify="dismiss">&times;</button>
    </div>
@endif