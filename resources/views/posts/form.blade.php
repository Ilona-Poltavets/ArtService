<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row mb-3">
                    <label for="title" class="col-2 col-form-label">Title</label>
                    <div class="col-10">
                        <input id="title" name="title" class="form-control" type="text"
                               value="{{isset($post)?$post->title:''}}"/>

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="category" class="col-2 col-form-label">Category</label>
                    <div class="col-10">
                        <select id="category" name="category" class="form-select">
                            @foreach($categories as $key=>$cat)
                                <option value="{{$key}}" @if(isset($post))
                                    {{$cat==$post->category ? 'selected' : ''}}
                                    @else
                                    {{$key==0 ? 'selected':''}}
                                    @endif
                                    {{$key==null ? 'disabled selected':''}}>
                                    {{$cat}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="row mb-3">
                    <label for="file" class="col-2 col-form-label">File</label>
                    <div class="col-10">
                        <input name="file" class="form-control" type="file"/>
                    </div>

                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add') }}
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
