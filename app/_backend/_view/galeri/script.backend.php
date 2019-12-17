Galeri = {
    init: function(){
        path_url = "<?= $path_url; ?>";
        project = App.initProject($("#project"));
        project.list.action.find(".filter-options").on("change", function(event){
            event.preventDefault();
            project.list.action.find("#page").val(1);
            Galeri.showList();
        });
        $(document).on("click", ".btn-load", function(event){
            event.preventDefault();
            Galeri.showList();
        });
        $("body").on("click", ".btn-form", function(event){
            event.preventDefault();
            Galeri.showForm(this.id);
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
                    Galeri.delete(id);
                }, 1000);
            });
        });
        
        Galeri.showList();
    },
    showList: function(){
        let loader = App.createLoader(project.id, "Sedang memuat data...");
        project.id.find(".form_area").hide();
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
                        }, 1000);
                    },
                    onPagging: function(page){
                        project.list.action.find("#page").val(page);
                        Galeri.showList();
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
    showForm: function(id){
        let loader = App.createLoader(project.id, "Sedang memuat data...");
        App.sendData({
            url: `${path_url}/form`,
            data: {id: id},
            onSuccess: function(response){
                loader.hide();
                let data = response.data;
                let form = data.form;
                App.formModal({
                    title: data.title,
                    class: "",
                    form: project.form.formElement,
                    element: {
                        id_gallery: App.createForm.inputKey("id_gallery", form.id_gallery),
                        album_id: App.createForm.selectOption("album_id", data.album_choice, form.album_id).attr({"class": "form-control show-tick", "required": true}),
                        gallery_name: App.createForm.inputText("gallery_name", form.gallery_name).attr({"class": "form-control", "required": true}),
                        gallery_image: App.createForm.uploadImage("image", data.link_gallery_image, data.mimes_image, data.desc_image_upload),
                        gallery_desc: App.createForm.textArea("gallery_desc", form.gallery_desc).attr("rows", 3),
                    },
                    onShow: function(modal){
                        $.AdminBSB.input.activate();
                        $.AdminBSB.select.activate();
                    },
                    onClose: function(modal){
                        // 
                    },
                    onSubmit: function(modal){
                        let loader = App.createLoader(modal.dialog, "Sedang menyimpan data...");
                        setTimeout(function () {
                            Galeri.save(modal, loader);
                        }, 1000);
                    }
                });                
            },
            onError: function(error){
                loader.hide();
                let message = error.message;
                swal({ title: message.title, text: message.text, type: message.type });
            }
        })
    },
    save: function(modal, loader){
        App.sendDataMultipart({
            url: `${path_url}/save`,
            data: modal.form[0],
            onProgress: function(percent){
                console.log(percent);
            },
            onSuccess: function(response){
                loader.hide();
                modal.action.modal("hide");
                let message = response.message;
                swal({ title: message.title, text: message.text, type: message.type, allowEscapeKey: false }, function(){
                    Galeri.showList();
                });
            },
            onError: function(error){
                loader.hide();
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
                    Galeri.showList();
                });
            },
            onError: function(error){
                let message = error.message;
                swal({ title: message.title, text: message.text, type: message.type });
            }
        })
    }
}

Galeri.init(); 