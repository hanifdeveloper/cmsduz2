Login = {
    init: function(){
        $("#sign_in").validate({
            highlight: function (input) {
                $(input).parents(".form-line").addClass("error");
            },
            unhighlight: function (input) {
                $(input).parents(".form-line").removeClass("error");
            },
            errorPlacement: function (error, element) {
                $(element).parents(".input-group").append(error);
            },
            submitHandler: function(form) {
                Login.validate($(form).serialize());
                return false;
            }
        });
    },
    validate: function(data){
        let loader = App.createLoader($(".sign_in"), "Check User ...");
        let showMessage = function(message){
            $(".response-message").html(`<div class="alert alert-${message.type}"><strong>${message.title}</strong> ${message.text}</div>`);
        };
        
        App.sendData({
            url: "<?= $path_url.'/validate'; ?>",
            data: data,
            onSuccess: function(response){
                setTimeout(function(){
                    loader.hide();
                    let message = response.message;
                    showMessage(message);
                    window.location.reload();
                }, 1000);
            },
            onError: function(error){
                setTimeout(function(){
                    loader.hide();
                    let message = error.message;
                    showMessage(message);
                }, 1000);
            }
        });
    }
}

Login.init(); 