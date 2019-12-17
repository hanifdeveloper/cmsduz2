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
    load: function(params){

    },

}