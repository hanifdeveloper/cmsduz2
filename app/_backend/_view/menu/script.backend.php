Kategori = {
    init: function(){
        path_url = "<?= $path_url; ?>";
        project = App.initProject($("#project"));
        project.list.action.find(".filter-options").on("change", function(event){
            event.preventDefault();
            project.list.action.find("#page").val(1);
            Kategori.showList();
        });
        $(document).on("click", ".btn-load, .btn-close", function(event){
            event.preventDefault();
            Kategori.showList();
        });
        $(document).on("click", ".btn-form", function(event){
            event.preventDefault();
            Kategori.showForm(this.id);
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
                    Kategori.delete(id);
                }, 1000);
            });
        });
        
        Kategori.showList();
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

                        setTimeout(function(){
                            loader.hide();
                        }, 500);
                    },
                    onPagging: function(page){
                        project.list.action.find("#page").val(page);
                        Kategori.showList();
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
                swal({
                    title: data.title,
                    // text: "Nama Kategori",
                    type: "input",
                    showCancelButton: true,
                    confirmButtonText: "Simpan",
                    cancelButtonText: "Tidak",
                    closeOnConfirm: false,
                    animation: "slide-from-top",
                    inputPlaceholder: "Nama Kategori",
                    showLoaderOnConfirm: true,
                    allowEscapeKey: false,
                    inputValue: form.category_name
                }, function (inputValue) {
                    if (inputValue === false) return false;
                    if (inputValue === "") {
                        swal.showInputError("Data tidak boleh kosong"); return false
                    }
                    setTimeout(function () {
                        form.category_name = inputValue;
                        Kategori.save(form);
                    }, 1000);
                });
            },
            onError: function(error){
                loader.hide();
                let message = error.message;
                swal({ title: message.title, text: message.text, type: message.type });
            }
        })
    },
    save: function(data){
        App.sendData({
            url: `${path_url}/save`,
            data: data,
            onSuccess: function(response){
                let message = response.message;
                swal({ title: message.title, text: message.text, type: message.type, allowEscapeKey: false }, function(){
                    Kategori.showList();
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
                    Kategori.showList();
                });
            },
            onError: function(error){
                let message = error.message;
                swal({ title: message.title, text: message.text, type: message.type });
            }
        })
    }
}

Kategori.init(); 