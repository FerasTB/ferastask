<form class=" content" action="/{{ $consultation->id }}/prescription" method="POST">
    @csrf
    <div class="form-group">
        <label class="form-label" for="exampleInputPassword1">Advice</label>
        <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('advice') }}" name="advice">
        @if ($errors->has('advice'))
            <div id="name-error" class="error text-danger pl-3" for="advice" style="display: block;">
                <strong>{{ $errors->first('advice') }}</strong>
            </div>
        @endif
    </div>
    @foreach ($prescriptionDrug as $index => $prescription)
        <div class="form-group">
            <label class="form-label" for="prescriptionDrug[{{ $index }}][category]">Category Select</label>
            <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1"
                wire:model="prescriptionDrug.{{ $index }}.category"
                name="prescriptionDrug[{{ $index }}][category]">
                <option value="">chose the category of drug</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->categoryName }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label class="form-label" for="prescriptionDrug[{{ $index }}][drug]">Drug Select</label>
            <select class="form-control selectpicker" data-style="btn btn-link"
                wire:model="prescriptionDrug.{{ $index }}.drug"
                name="prescriptionDrug[{{ $index }}][drug]">
                @if ($prescriptionDrug[$index]['drugs'] == [''])
                    <option value="">chose the category first</option>
                @endif
                @if ($prescriptionDrug[$index]['drugs'] != [''])
                    @foreach ($prescriptionDrug[$index]['drugs'] as $drug)
                        <option value="{{ $drug['id'] }}"> {{ $drug['tradeName'] }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        {{-- @if ($prescriptionDrug . $index . drug) --}}
        <div class="form-group">
            <label class="form-label" for="prescriptionDrug[{{ $index }}][option]">option Select</label>
            <select class="form-control selectpicker" data-style="btn btn-link"
                wire:model="prescriptionDrug.{{ $index }}.option"
                name="prescriptionDrug[{{ $index }}][option]">
                @foreach ($options as $option)
                    <option value="{{ $option->id }}"> {{ $option->optionName }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="form-label" for="prescriptionDrug[{{ $index }}][duration]">Duration</label>
            <input type="text" class="form-control" wire:model="prescriptionDrug.{{ $index }}.duration"
                name="prescriptionDrug[{{ $index }}][duration]">
            @if ($errors->has('duration'))
                <div id="name-error" class="error text-danger pl-3" for="duration" style="display: block;">
                    <strong>{{ $errors->first('duration') }}</strong>
                </div>
            @endif
        </div>
        {{-- @endif --}}
    @endforeach

    <button wire:click.prevent="addDrug" class="btn btn-primary">Add anthor drug</button>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
