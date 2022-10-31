<div class="row mb-3">
    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
               name="name" value="{{isset($user)?$user->name:''}}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="surname" class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

    <div class="col-md-6">
        <input id="surname" type="text"
               class="form-control @error('surname') is-invalid @enderror" name="surname"
               value="{{isset($user)?$user->surname:''}}" required autocomplete="surname">

        @error('surname')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="bDay" class="col-md-4 col-form-label text-md-end">{{ __('Birthday') }}</label>

    <div class="col-md-6">
        <input id="bday" type="date" class="form-control @error('bday') is-invalid @enderror"
               name="bday" value="{{isset($user)?$user->bday:''}}" required autocomplete="bday">

        @error('bday')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div {{(Auth::user() && (((isset($user) && $user->hasRole('expert')) || (Auth::user()->hasRole('admin'))))) ? "" : "hidden"}}>
    <div class="row mb-3">
        <label for="nationality"
               class="col-md-4 col-form-label text-md-end">{{ __('Nationality') }}</label>

        <div class="col-md-6">
            <input id="nationality" type="text"
                   class="form-control @error('nationality') is-invalid @enderror"
                   name="nationality" value="{{isset($user)?$user->nationality:''}}" required
                   autocomplete="nationality">

            @error('nationality')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

        <div class="col-md-6">
            <input id="phone" type="text"
                   class="form-control @error('phone') is-invalid @enderror" name="phone"
                   value="{{isset($user)?$user->phone:''}}" required autocomplete="phone">

            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="category"
               class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

        <div class="col-md-6">
            <select id="category" name="category"
                    class="form-select" {{Auth::user()->hasPermission('change_category_expert')?'':'disabled'}}>
                @foreach($categories as $key=>$cat)
                    <option value="{{$key}}" @if(isset($user))
                        {{$key==$user->category ? 'selected' : ''}}
                        @else
                        {{$key==0 ? 'selected':''}}
                        @endif
                        {{$key==null ? 'disabled selected':''}}>
                        {{$cat}}
                    </option>
                @endforeach
            </select>
            @error('category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="row mb-3">
    <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

    <div class="col-md-6">

        <select id="gender" name="gender" class="form-select">
            <option disabled>Choose gender...</option>
            <option value="male" {{isset($user) && $user->gender=='male'?'selected':''}}>Male</option>
            <option value="female" {{isset($user) && $user->gender=='female'?'selected':''}}>Female</option>
            <option value="other" {{isset($user) && $user->gender=='other'?'selected':''}}>Other</option>
        </select>

        @error('gender')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="email"
           class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
               name="email" value="{{isset($user)?$user->email:''}}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Save') }}
        </button>
    </div>
</div>
