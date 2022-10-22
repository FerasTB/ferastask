<div class="content">
    <form class="content" wire:submit.prevent="save" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlSelect1">Patient Select</label>
            <select wire:model="consultation.patient_id" class="form-control selectpicker mb-6" data-style="btn btn-link"
                id="exampleFormControlSelect1">
                <option value="">-- select patient --</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}"> {{ $patient->name }}</option>
                @endforeach

            </select>
            <a href="/patient/create" class="m-2 b-2">Add New One</a>
        </div>
        @if ($test && $test->gender === App\Enums\Gender::Female)
            <div class="form-check form-switch m-32">
                <input wire:model="consultation.pregnant" class="form-check-input" type="checkbox"
                    id="flexSwitchCheckDefault" checked="false">
                <label class="form-check-label" for="flexSwitchCheckDefault">Pregnant</label>
            </div>
            @if ($consultation->pregnant)
                <div class="form-group">
                    <label>pregnant mounth</label>
                    <select wire:model="consultation.pregnant_month" class="form-control selectpicker mb-6"
                        data-style="btn btn-link">
                        <option value="">-- select mounth --</option>
                        <option value="1">mounth 1</option>
                        <option value="2">mounth 2</option>
                        <option value="3">mounth 3</option>
                        <option value="4">mounth 4</option>
                        <option value="5">mounth 5</option>
                        <option value="6">mounth 6</option>
                        <option value="7">mounth 7</option>
                        <option value="8">mounth 8</option>
                        <option value="9">mounth 9</option>
                    </select>
                </div>
            @endif
            <div class="form-check form-switch m-32">
                <input wire:model="consultation.breast_feeding" class="form-check-input" type="checkbox"
                    id="breast_feeding" checked="false">
                <label class="form-check-label" for="breast_feeding">breast feeding</label>
            </div>
            @if ($consultation->breast_feeding)
                <div class="form-group">
                    <label>breast feeding mounth</label>
                    <select wire:model="consultation.breast_feeding_month" class="form-control selectpicker mb-6"
                        data-style="btn btn-link">
                        <option value="">-- select mounth --</option>
                        <option value="1">mounth 1 - 2</option>
                        <option value="2">mounth 3 - 4</option>
                        <option value="3">mounth 5 - 6</option>
                        <option value="4">mounth 7 - 8</option>
                        <option value="5">mounth 9 - 10</option>
                    </select>
                </div>
            @endif
        @endif
        <div class="input-group input-group-outline my-3">
            <label for="upload">breast feeding mounth</label>
            <input id="upload" type="file" wire:model="photos" multiple>

            @error('photos.*')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-group input-group-outline my-3">
            <label class="form-label block" for="exampleInputPassword1">Discripe Your Problem</label>
            <input class="form-control" wire:model="consultation.patient_complaint" type="text"
                id="exampleInputPassword1">
            @if ($errors->has('consultation.patient_complaint'))
                <div id="name-error" class="error text-danger pl-3" for="consultation.patient_complaint"
                    style="display: block;">
                    <strong>{{ $errors->first('consultation.patient_complaint') }}</strong>
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
