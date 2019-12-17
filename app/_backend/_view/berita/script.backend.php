Berita = {
    init: function(){
        path_url = "<?= $path_url; ?>";
        project = App.initProject($("#project"));
        project.list.action.find(".filter-options").on("change", function(event){
            event.preventDefault();
            project.list.action.find("#page").val(1);
            Berita.showList();
        });
        project.editor.action.on("submit", function(event){
            event.preventDefault();
            swal({
                title: "Simpan Data",
                text: "Yakin untuk menyimpan data",
                type: "info",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Tidak",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                allowEscapeKey: false,
            }, function () {
                setTimeout(function () {
                    Berita.save(project.editor.action[0]);
                }, 1000);
            });
        });
        $(document).on("click", ".btn-load, .btn-close", function(event){
            event.preventDefault();
            Berita.showList();
        });
        $(document).on("click", ".btn-form", function(event){
            event.preventDefault();
            Berita.showEditor(this.id);
        });
        $(document).on("click", ".btn-delete", function(event){
            event.preventDefault();
            let id = this.id;
            let message = $(this).data("message");
            swal({
                title: "Konfirmasi Hapus",
                text: message,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Hapus",
                cancelButtonText: "Tidak",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                allowEscapeKey: false,
            }, function () {
                setTimeout(function () {
                    Berita.delete(id);
                }, 500);
            });
        });
        
        Berita.showList();
    },
    showList: function(){
        let loader = App.createLoader(project.id, "Sedang memuat data...");
        project.id.find(".editor_area").hide();
        project.id.find(".list_area").show();
        App.sendData({
            url: `${path_url}/list`,
            data: project.list.action.serialize(),
            onSuccess: function(response){
                // console.log(response);
                App.createList({
                    template: project.list,
                    loader: loader,
                    data: response.data,
                    onShow: function(loader){
                        project.id.find("#page_title").html(response.data.title+"<small>"+response.data.label+"</small>");
                        project.id.find("#page_query").html((response.data.query != "") ? "<code>"+response.data.query+"</code>" : "");

                        //Tooltip
                        $("[data-toggle='tooltip']").tooltip({
                            container: "body"
                        });

                        // Light Gallery
                        $("#list_content").lightGallery({
                            thumbnail: true,
                            selector: "a.image_list"
                        });

                        setTimeout(function(){
                            loader.hide();
                        }, 500);
                    },
                    onPagging: function(page){
                        project.list.action.find("#page").val(page);
                        Berita.showList();
                    }
                });
            },
            onError: function(error){
                // console.log(error);
                loader.hide();
                let message = error.message;
                project.list.content.hide();
                project.list.empty.show();
                project.list.empty.find("#err_status").text(message.title);
                project.list.empty.find("#err_message").text(message.text);
                project.id.find("#page_title").text(message.type);
            }
        });
    },
    showEditor: function(id){
        let loader = App.createLoader(project.id, "Sedang memuat data...");
        App.sendData({
            url: `${path_url}/form`,
            data: {id: id},
            onSuccess: function(response){
                loader.hide();
                project.id.find(".list_area").hide();
                project.id.find(".editor_area").show();
                project.id.find("#page_title").html(response.data.title);
                project.editor.content.html(project.editor.formElement);
                let data = response.data;
                let form = data.form;
                let object = {
                    id_news: App.createForm.inputKey("id_news", form.id_news),
                    category_id: App.createForm.selectOption("category_id", data.category_choice, form.category_id).attr({"class": "form-control show-tick", "required": true}),
                    headline: App.createForm.selectOption("headline", data.headline_choice, form.headline).attr({"class": "form-control show-tick", "required": true}),
                    news_publish: App.createForm.selectOption("news_publish", data.publish_choice, form.news_publish).attr({"class": "form-control show-tick", "required": true}),
                    news_title: App.createForm.inputText("news_title", form.news_title).attr({"class": "form-control", "required": true}),
                    news_tag: App.createForm.inputText("news_tag", form.news_tag).attr({"class": "form-control", "data-role":"tags-input"}),
                    news_date: App.createForm.inputText("news_date", form.news_date).attr({"class": "form-control", "data-role":"mask-date", "placeholder": form.news_date}),
                    news_image: App.createForm.uploadImage("image", data.link_news_image, data.mimes_image, data.desc_upload_image),
                    news_content: App.createForm.textArea("news_content", form.news_content).attr("rows", 3),
                }
                
                $.each(object, function(key, val){ 
                    project.editor.content.find("span[data-form-object='"+key+"']").replaceWith(val); 
                });
                project.editor.content.find("[data-role='tags-input']").tagsinput();
                project.editor.content.find("[data-role='mask-date']")
                .inputmask('yyyy-mm-dd', { placeholder: '____-__-__' })
                .bootstrapMaterialDatePicker({
                    format: 'YYYY-MM-DD',
                    clearButton: true,
                    weekStart: 1,
                    time: false
                });
                CKEDITOR.replace("news_content",{
                    height : 400,
                    shiftEnterMode : CKEDITOR.ENTER_P,
                });
                CKEDITOR.on('instanceReady', function (ev){
                    ev.editor.on("change", function(){
                        $('#news_content').val(ev.editor.getData());
                    });
                });
                $.AdminBSB.input.activate();
                $.AdminBSB.select.activate();
            },
            onError: function(error){
                loader.hide();
                let message = error.message;
                swal({ title: message.title, text: message.text, type: message.type });
            }
        })
    },
    save: function(data){
        App.sendDataMultipart({
            url: `${path_url}/save`,
            data: data,
            onProgress: function(percent){
                console.log(percent);
            },
            onSuccess: function(response){
                let message = response.message;
                swal({ title: message.title, text: message.text, type: message.type, allowEscapeKey: false }, function(){
                    Berita.showList();
                });
            },
            onError: function(error){
                let message = error.message;
                swal({ title: message.title, text: message.text, type: message.type });
            }
        })
    },
    delete: function(id){
        App.sendData({
            url: `${path_url}/delete`,
            data: {id: id},
            onSuccess: function(response){
                let message = response.message;
                swal({ title: message.title, text: message.text, type: message.type, allowEscapeKey: false }, function(){
                    Berita.showList();
                });
            },
            onError: function(error){
                let message = error.message;
                swal({ title: message.title, text: message.text, type: message.type });
            }
        })
    }
}

Berita.init(); 