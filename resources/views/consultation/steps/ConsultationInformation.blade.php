<div>
    <div class="form-group">
        <label for="exampleInputPassword1">Drug Name</label>
        <input wire:model="state.breast_feeding_month" type="text" class="form-control" id="exampleInputPassword1">
        @if ($errors->has('state.breast_feeding_month'))
            <div id="name-error" class="error text-danger pl-3" for="state.breast_feeding_month" style="display: block;">
                <strong>{{ $errors->first('state.breast_feeding_month') }}</strong>
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
