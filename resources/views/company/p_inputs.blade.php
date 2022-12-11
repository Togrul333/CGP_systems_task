<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-edit mr-2"></i> информация о компании
        </h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="required">Названия</label>
                        <input type="text"
                            class="form-control" name="name" id="name" placeholder="Названия" autofocus
                            value="{{ $company ? $company->name : old('name') }}">
                        <span class="form-validation" style='color:red;'>
                            @if ($errors->has('name'))
                            <span class="error">{{ $errors->first('name') }}</span>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Адрес</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="address" value="{{ $company ? $company->address : old('address') }}">
                        <span class="form-validation" style='color:red;'>
                            @if ($errors->has('address'))
                                <span class="error">{{ $errors->first('address') }}</span>
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
