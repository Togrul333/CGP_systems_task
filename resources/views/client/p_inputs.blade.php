<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-edit mr-2"></i>Информация о клиенте
        </h3>
    </div>
    <div class="card-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="required">Имя</label>
                        <input type="text"
                            class="form-control" name="name" id="name" placeholder="Имя" autofocus
                            value="{{ $client ? $client->name : old('name') }}">
                        <span class="form-validation" style='color:red;'>
                            <span id='name_error_message' class="error"></span>
                        </span>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Адрес</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Адрес" value="{{ $client ? $client->address : old('address') }}">
                        <span class="form-validation" style='color:red;'>
                            <span id='address_error_message' class="error"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Номер</label>
                        <input type="number" class="form-control" name="number" id="number" placeholder="Номер" value="{{ $client ? $client->number : old('number') }}">
                        <span class="form-validation" style='color:red;'>
                            <span id='number_error_message' class="error"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
