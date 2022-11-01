<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <div class="row mb-3">
                    <label for="complexity" class="col-2 col-form-label">Complexity</label>
                    <div class="col-10">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="complexityRadio" value="1">
                            <label class="form-check-label">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="complexityRadio" value="2">
                            <label class="form-check-label">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="complexityRadio" value="3">
                            <label class="form-check-label">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="complexityRadio" value="4">
                            <label class="form-check-label">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="complexityRadio" value="5">
                            <label class="form-check-label">5</label>
                        </div>

                        @error('complexityRadio')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="creativity" class="col-2 col-form-label">Creativity</label>
                    <div class="col-10">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="creativityRadio" value="1">
                            <label class="form-check-label">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="creativityRadio" value="2">
                            <label class="form-check-label">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="creativityRadio" value="3">
                            <label class="form-check-label">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="creativityRadio" value="4">
                            <label class="form-check-label">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="creativityRadio" value="5">
                            <label class="form-check-label">5</label>
                        </div>

                        @error('creativityRadio')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="innovativeness" class="col-2 col-form-label">Innovativeness</label>
                    <div class="col-10">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="innovativenessRadio" value="1">
                            <label class="form-check-label">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="innovativenessRadio" value="2">
                            <label class="form-check-label">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="innovativenessRadio" value="3">
                            <label class="form-check-label">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="innovativenessRadio" value="4">
                            <label class="form-check-label">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="innovativenessRadio" value="5">
                            <label class="form-check-label">5</label>
                        </div>

                        @error('innovativenessRadio')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="review" class="col-2 col-form-label">Review</label>
                    <div class="col-10">
                        <input id="review" name="review" class="form-control" type="text"
                               value=""/>

                        @error('review')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send') }}
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
