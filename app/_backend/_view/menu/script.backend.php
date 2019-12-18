Menu = {
    init: function(){
        path_url = "<?= $path_url; ?>";
        struktur_menu = $(".dd");
        project = App.initProject($("#project"));
        project.list.action.find(".filter-options").on("change", function(event){
            event.preventDefault();
            project.list.action.find("#page").val(1);
            Menu.showList();
        });
        $(document).on("click", ".btn-load, .btn-close", function(event){
            event.preventDefault();
            Menu.showList();
        });
        $(document).on("click", ".btn-form", function(event){
            event.preventDefault();
            Menu.showForm(this.id);
            // console.log(struktur_menu.nestable("serialize"));
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
                    Menu.delete(id);
                }, 1000);
            });
        });
        
        Menu.showList();
    },
    showList: function(){
        let loader = App.createLoader(project.id, "Sedang memuat data...");
        let showNestable = function(json){
            let list = $("<ol>").attr({"class": "dd-list"});
            $.each(json, function(key, val){
                let item = $("<li>").attr({"class": "dd-item", "data-id": val.id});
                let handle = $("<div>").attr({"class": "dd-handle"}).text("item "+val.id);
                item.append(handle);
                if(val.hasOwnProperty("children")){
                    item.append(showNestable(val.children));
                }
                list.append(item);
            });
            return list;
        };
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
                        
                        // struktur_menu.html(showNestable([{"id":1},{"id":2,"children":[{"id":3},{"id":4},{"id":5,"children":[{"id":6},{"id":7},{"id":8}]},{"id":9},{"id":10}]},{"id":11},{"id":12}]));
                        // struktur_menu.nestable();
                        // struktur_menu.off("change");
                        // struktur_menu.on("change", function () {
                        //     // var $this = $(this);
                        //     var serializedData = window.JSON.stringify($(this).nestable("serialize"));
                        //     console.log(serializedData);
                        // });

                        setTimeout(function(){
                            loader.hide();
                        }, 500);
                    },
                    onPagging: function(page){
                        project.list.action.find("#page").val(page);
                        Menu.showList();
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
                    class: "modal-sm",
                    form: project.form.formElement,
                    element: {
                        id_menu: App.createForm.inputKey("id_menu", form.id_menu),
                        menu_name: App.createForm.inputText("menu_name", form.menu_name).attr({"class": "form-control", "required": true}),
                        menu_link: App.createForm.inputText("menu_link", form.menu_link).attr({"class": "form-control", "required": false}),
                        menu_disable: App.createForm.selectOption("menu_disable", data.disable_choice, form.menu_disable).attr({"class": "form-control show-tick", "required": true}),
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
                            Menu.save(modal, loader);
                        }, 1000);
                    }
                })
            },
            onError: function(error){
                loader.hide();
                let message = error.message;
                swal({ title: message.title, text: message.text, type: message.type });
            }
        })
    },
    save: function(modal, loader){
        App.sendData({
            url: `${path_url}/save`,
            data: modal.form.serialize(),
            onSuccess: function(response){
                loader.hide();
                modal.action.modal("hide");
                let message = response.message;
                swal({ title: message.title, text: message.text, type: message.type, allowEscapeKey: false }, function(){
                    Menu.showList();
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
                    Menu.showList();
                });
            },
            onError: function(error){
                let message = error.message;
                swal({ title: message.title, text: message.text, type: message.type });
            }
        })
    }
}

Menu.init(); 