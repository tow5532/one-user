@extends('layouts.sub')

@section('content')

    <section class="white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                <h4 class="mb-40">Contact the manager</h4>
              <div id="formmessage">Success/Error Message Goes Here</div>
               <form id="contactform" action="{{ route('help.insert') }}" method="POST" role="form" name="frm" class="form__auth">
                   {!! csrf_field() !!}

                   @if ($return = request('return'))
                       <input type="hidden" name="return" value="{{ $return }}">
                   @endif
                   @if(session('error'))
                       <h1>{{session('error')}}</h1>
                   @endif
                <div class="contact-form clearfix">
                   <div class="section-field">
                     <input id="name" type="text" placeholder="Name*" class="form-control" name="name" value="{{Auth::user()->username}}" disabled>
                 </div>
                    <div class="section-field" style="width: 65%;  margin-right: 0;">
                      <input type="text" placeholder="title*" class="form-control" name="title" maxlength="50">
                        {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
                  </div>
                     <div class="section-field textarea">
                       <textarea class="form-control input-message" placeholder="Comment*" rows="7" name="comment" ></textarea>
                         {!! $errors->first('comment', '<span class="text-danger">:message</span>') !!}
                     </div>
                    <div class="form-group" style="text-align: center">
                        {!! GoogleReCaptchaV3::renderField('signup_id', 'signup') !!}
                    </div>
                   <div class="section-field submit-button">
                       <a href="javascript:frm.submit();" class="button">
                           <span>Send Your Message</span>
                           <i class="fa fa-check"></i>
                       </a>
                   </div>
                  </div>
                  </form>
             </div>
            </div>
        </div>
    </section>
@stop
