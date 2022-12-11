function addToObject(obj, input) {
    let name = input.name;
    let value = input.value;
    let segments = name.split(':');
    if(segments.length == 3) {
        let arr_name = segments[0];
        let arr_index = segments[1];
        let name = segments[2];

        if(obj[arr_name] == undefined)
            obj[arr_name] = [];

        let arr = obj[arr_name];
        if(arr[arr_index] == undefined)
            arr.push({});

        let item = arr[arr_index];
        item[name] = value;
    } else {
        obj[name] = value;
    }
}

function collectFormdata(form) {
    let inputs = form.querySelectorAll('[name]');
    let data = {};
    for (let input of inputs) {
        addToObject(data, input);
    }

    return data;
}

function show_errors(response) {
    console.log(response['message']);
    let text = "<ul>";
    if(response.data) {
        for(let error of response.data)
            text += "<li>"+ error +"</li>";
    }
    else
        text += "<li>Əməliyyat zamanı xəta baş verdi - ["+ response['message'] +"]</li>";
    text += "</ul>";
    let error_html = "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-ban'></i> Alert!</h5>"+ text +"</div>";
    $('#interactive_zone').html(error_html);
}

function submitForm(form, callback, collector) {
    let collect_func = collector || collectFormdata;
    let url = form.action;
    let data = collect_func(form);
    callback = window[callback];

    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (response) {
            callback(response);
        },
        error: function(response) {
            let errors = response.responseJSON;
            show_errors(errors);
        }
    }).done(function() {
        console.log('DONE');
    });
}


function show_delete_confirmation_modal(form_id, callback) {
    const modal_content = "<div class='modal fade' id='delete-confirm-modal'><div class='modal-dialog'><div class='modal-content bg-danger'><div class='modal-header'><h4 class='modal-title'>Diqqət!</h4><button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div><div class='modal-body'><p>Silmə əməliyyatı yerinə yetirilir. Silinən məlumatın bərpası mümkün deyil</p><p>Məlumatı silmək istədiyinizdən əminsinizmi?</p></div><div class='modal-footer justify-content-between'><button type='button' class='btn btn-outline-light' data-dismiss='modal'>Bağla</button><button type='button' class='btn btn-outline-light' onclick='apply_remove(\""+ form_id +"\", \""+ callback +"\")'>Bəli, sil</button></div></div></div></div>";
    $('#modal-zone').html(modal_content);
    $('#delete-confirm-modal').modal('show');
}

function apply_remove(form_id, callback) {
    let form = document.forms[form_id];
    let mid = form.mid.value;
    let url = form.attributes['delete-url'].value;
    $.ajax({
        type: "POST",
        url: url,
        data: {'mid': mid},
        success: function (response) {
            callback = window[callback];
            callback(response);
        },
        error: function(response) {
            let errors = response.responseJSON;
            show_errors(errors);
        }
    }).done(function() {
        console.log('DONE');
    });
}

function remove(form_id, callback) {
    show_delete_confirmation_modal(form_id, callback);
}

function change_status(me, callback) {
    let url = me.dataset['url'];
    let mid = me.dataset['id'];
    $.ajax({
        type: "POST",
        url: url,
        data: {'id': mid},
        success: function (response) {
            callback = window[callback];
            callback(response);
        },
        error: function(response) {
            let errors = response.responseJSON;
            show_errors(errors);
        }
    }).done(function() {
        console.log('DONE');
    });
}

