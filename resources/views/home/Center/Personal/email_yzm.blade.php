<div class="row">
        <div class="col-md-8">
            <input type="text" class="form-control {{$errors->has('captcha')?'parsley-error':''}}" name="captcha" placeholder="captcha">
        </div>
        <div class="col-md-4">
            <img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()">
        </div>
        @if($errors->has('captcha'))
            <div class="col-md-12">
                <p class="text-danger text-left"><strong>{{$errors->first('captcha')}}</strong></p>
            </div>
        @endif
    </div>
