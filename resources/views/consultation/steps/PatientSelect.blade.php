<div>
    <div class="form-group">
        <label for="exampleInputPassword1">Drug Name</label>
        <input wire:model="state.patient_complaint" type="text" class="form-control" id="exampleInputPassword1">
        @if ($errors->has('state.patient_complaint'))
            <div id="name-error" class="error text-danger pl-3" for="state.patient_complaint" style="display: block;">
                <strong>{{ $errors->first('state.patient_complaint') }}</strong>
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
