App = {
    init: function(){
        // Active Menu
        let menu = document.querySelectorAll("div.menu a");
        menu.forEach(element => {
            if(element.href == window.location.toString()){
                let parent = element.parentElement;
                parent.classList = "active";
                // Check Sub Menu
                if(parent.parentElement.className == "ml-menu") 
                parent.parentElement.parentElement.classList = "active";
            }
        });
    },
    initProject: function(project){
        let result = {
            id: project,
            list: {
                id: project.find("#data_list"),
                action: project.find("#data_list #form_list"),
                empty: project.find("#data_list #list_empty"),
                content: project.find("#data_list #list_content"),
                contentDetail: project.find("#data_list .list-content-detail"),
                contentDetailRow: project.find("#data_list .list-content-rows").clone(),
                contentPagging: project.find("#data_list #list_paging ul.pagination"),
                contentPaggingItem: project.find("#data_list #list_paging ul.pagination .page-item").clone(),
            },
            form: {
                id: project.find("#data_form"),
                action: project.find("#data_form #form_input"),
                content: project.find("#data_form #form_content"),
                formElement: project.find("#data_form #form_content").clone().html(),
                formAction: project.find("#data_form #form_action").clone().html(),
            },
            editor: {
                id: project.find("#data_editor"),
                action: project.find("#data_editor #form_editor"),
                content: project.find("#data_editor #editor_content"),
                formElement: project.find("#data_editor #editor_content").clone().html(),
                formAction: project.find("#data_editor #editor_action").clone().html(),
            },
        }

        result.list.contentDetail.html("");
        result.list.contentPagging.html("");
        
        return result;
    },
    createCookie: function(cname, cvalue){
        var d = new Date();
        d.setTime(d.getTime() + cookie_expr);
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    },
    removeCookie: function(cname){
        var d = new Date();
        d.setTime(d.getTime() - cookie_expr);
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=;" + expires + ";path=/";
    },
    imagePreview: function(obj){
        if(obj.files && obj.files[0]){
            // Check Image
            // return file && file['type'].split('/')[0] === 'image';
            var reader = new FileReader();
            var preview = $(obj).siblings(".image-preview");
            reader.onload = function(e){
                preview.html('<img src="'+e.target.result+'" class="img-responsive thumbnail" alt="image" width="100%">');
            };
            reader.readAsDataURL(obj.files[0]);
        }
    },
    createList: function(params){
        let number = parseInt(params.data.number);
        let page = parseInt(params.data.page);
        let count = parseInt(params.data.count);
        let limit = parseInt(params.data.limit);

        let total_pages = Math.ceil(count / limit);
        let prev_number = (page > 1) ? page - 1 : 1;
        let next_number = (page < total_pages) ? page + 1 : total_pages;
        let page_number = params.template.contentPaggingItem.html();

        let btn_first = params.template.contentPaggingItem.clone().attr("number-page", 1).html(page_number.replace("{page}", "&laquo;"));
        let btn_last = params.template.contentPaggingItem.clone().attr("number-page", total_pages).html(page_number.replace("{page}", "&raquo;"));
        let btn_prev = params.template.contentPaggingItem.clone().attr("number-page", prev_number).html(page_number.replace("{page}", "&lsaquo;"));
        let btn_next = params.template.contentPaggingItem.clone().attr("number-page", next_number).html(page_number.replace("{page}", "&rsaquo;"));
        let btn_dots = params.template.contentPaggingItem.clone().addClass("disabled").html(page_number.replace("{page}", "..."));
        let btn_active = params.template.contentPaggingItem.clone().addClass("active").html(page_number.replace("{page}", page));

        params.template.contentDetail.html("");
        params.template.contentPagging.html("");

        if(count > 0){
            params.template.empty.hide();
            params.template.content.show();
            params.data.list.forEach(data => {
                let rows = params.template.contentDetailRow.clone();
                var result = rows.html().replace("{number}", number++);
                for(key in data){
                    let find = new RegExp("{"+key+"}", "g");
                    result = result.replace(find, data[key]);
                    rows.html(result);
                }
                params.template.contentDetail.append(rows);
            });
            
            // Create Paging
            if(total_pages > 1){
                if(page > 3){
                    params.template.contentPagging.append(btn_first);
                    params.template.contentPagging.append(btn_prev);
                    params.template.contentPagging.append(btn_dots);
                }

                for(i = (page - 2); i < page; i++){
                    if(i < 1) continue;
                    var pages = params.template.contentPaggingItem.clone().attr("number-page", i).html(page_number.replace("{page}", i));
                    params.template.contentPagging.append(pages);
                }

                params.template.contentPagging.append(btn_active);

                for(i = (page + 1); i < (page + 3); i++){
                    if(i > total_pages) break;
                    var pages = params.template.contentPaggingItem.clone().attr("number-page", i).html(page_number.replace("{page}", i));
                    params.template.contentPagging.append(pages);
                }

                if((page + 2) < total_pages) params.template.contentPagging.append(btn_dots);
                
                if(page < (total_pages - 2)){
                    params.template.contentPagging.append(btn_next);
                    params.template.contentPagging.append(btn_last);
                }
                
                // action page button
                params.template.contentPagging.find(".pagging[number-page!='']").on("click", function(event){
                    event.preventDefault();
                    var page = $(this).attr("number-page");
                    if(typeof params.onPagging === "function") params.onPagging(page);
                });

                params.template.contentPagging.parent().css({"border-top": "2px"});
                params.template.contentPagging.parent().css({"border-top-style": "solid"});
                params.template.contentPagging.parent().css({"border-top-color": "#ccc"});
            }
        }else{
            params.template.empty.show();
            params.template.content.hide();
        }

        if(typeof params.onShow === "function") params.onShow(params.loader);
    },
    createForm: {
        inputKey: function(id, value){
            return $("<input>").attr({type: "hidden", id: id, name: id, value: value});
        },
        inputText: function(id, value){
            return $("<input>").attr({type: "text", id: id, name: id, value: value, class: "form-control"});
        },
        inputPassword: function(id, value){
            return $("<input>").attr({type: "password", id: id, name: id, value: value, class: "form-control"});
        },
        textArea: function(id, value){
            return $("<textarea>").attr({id: id, name: id, class: "form-control"}).text(value);
        },
        selectOption: function(id, data, value){
            var select = $("<select>").attr({id: id, name: id, class: "form-control custom-select", style: "cursor: pointer;"});
            // var value = value.split(",");
            if(!$.isArray(value)) value = value.split(",");
            $.each(data, function(key, val){
                var option = $("<option>").attr({value: key, selected: ($.inArray(key, value) != -1)}).text(val.text)
                select.append(option);
            });
            return select;
        },
        radioButton: function(id, data, value){
            var group = $("<div>");
            $.each(data, function(key, val){
                var radio = $("<input>").attr({type: "radio", id: id, name: id, value: key, checked: (key == value)});
                var label = $("<label>").attr("style", "color: #000; cursor: pointer; margin: 10px;").append(radio).append(" "+val.text);
                group.append(label);
            });
            return group.children();
        },
        checkBox: function(id, data, value){
            var group = $("<div>");
            var value = value.split(",");
            $.each(data, function(key, val){
                var check = $("<input>").attr({type: "checkbox", id: id, name: id, value: val, checked: ($.inArray(val, value) != -1)});
                var label = $("<label>").attr("style", "color: #000; cursor: pointer; margin: 5px;").append(check).append(" "+val);
                group.append(label);
            });
            return group.children();
        },
        uploadImage: function(id, image, mimes, desc){
            var group = $("<div>");
            var preview = $("<div>").attr({class: "image-preview"}).html('<img src="'+image+'" class="img-responsive thumbnail" alt="image" width="100%">');
            var file = $("<input>").attr({type: "file", id: id, name: id, class: "file-image", style: "display: none;", accept: mimes});
            var button = $("<label>").attr({for: id, class: "btn btn-block btn-sm", style: "cursor: pointer; margin-top: 10px;"}).html("UPLOAD");
            var desc = $("<p>").attr({class: "help-block"}).html(desc);
            file.on("change", function(event){
                event.preventDefault();
                App.imagePreview(this);
            })
            group.append(preview).append(file).append(button).append(desc);
            return group.children();
        },
    },
    createLoader: function(obj, msg){
        let loader = {
            show: function(){
                obj.waitMe({
                    effect: "ios",
                    text: msg,
                    bg: "rgba(255,255,255,0.9)",
                    color: "#555"
                });
            },
            hide: function(){
                obj.waitMe("hide");
            }
        }
        loader.show();
        return loader;
    },
    formModal: function(params){
        let modal = {
            action: $("#modalDialog"),
            dialog: $("#modalDialog").find(".modal-dialog"),
            form: $("#modalDialog").find("#form_input_dialog"),
            header: $("#modalDialog").find(".modal-header"),
            body: $("#modalDialog").find(".modal-body"),
            footer: $("#modalDialog").find(".modal-footer"),
        }

        modal.dialog.removeClass("modal-lg").removeClass("modal-sm").addClass(params.class);
        modal.header.find(".modal-title").html(params.title);
        modal.body.html(params.form)
        $.each(params.element, function(key, val){ 
            modal.body.find("span[data-form-object='"+key+"']").replaceWith(val); 
        });
        
        modal.action.modal("show");
        modal.action.on("shown.bs.modal", function() {
            if(typeof params.onShow === "function") params.onShow(modal);
        });
        modal.action.on("hidden.bs.modal", function() {
            modal.action.off();
            if(typeof params.onClose === "function") params.onClose(modal);
        });
        modal.form.off();
        modal.form.on("submit", function(event){
            event.preventDefault();
            if(typeof params.onSubmit === "function") params.onSubmit(modal);
        });
    },
    sendData: function(params){
        // var token = (params.token == undefined) ? app_token : params.token;
        $.ajax({
            url: params.url,
            type: "POST",
            data: params.data,
            // headers: {"Token": token},
            dataType: "json",
            async: false,
            success: params.onSuccess,
            error: function (e) {
                // console.log(e);
                if(e.status !== 200){
                    if(typeof params.onError === "function") params.onError(e.responseJSON);
                }
            }
        });
    },
    sendDataMultipart: function(params){
        // var token = (params.token == undefined) ? app_token : params.token;
        $.ajax({
            url: params.url,
            type: "POST",
            enctype: "multipart/form-data",
            data: new FormData(params.data),
            // headers: {"Token": token},
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            datatype: "json",
            xhr: function () {
                var jxhr = null;
                if(window.ActiveXObject) 
                    jxhr = new window.ActiveXObject( "Microsoft.XMLHTTP" );
                else
                    jxhr = new window.XMLHttpRequest();

                if(jxhr.upload) {
                    jxhr.upload.addEventListener("progress", function (evt) {
                        if(evt.lengthComputable) {
                            let percent = Math.round((evt.loaded / evt.total) * 100);
                            if(typeof params.onProgress === "function") params.onProgress(percent);
                        }
                    }, false);
                }
                return jxhr;
            },
            success: params.onSuccess,
            error: function (e) {
                // console.log(e);
                if(e.status !== 200){
                    if(typeof params.onError === "function") params.onError(e.responseJSON);
                }
            }
        });
    },

}

App.init();