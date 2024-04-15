export default {
    init: function () {
        this.themeswitch = document.querySelector('.themeswitch');
        this.html = document.querySelector('html');

        if(!this.themeswitch || !this.html) return;

        this.load();

        this.themeswitch.addEventListener("click", (e) => {
            this.html.classList.toggle('dark');
            this.store();
        });
    },

    load: function () {
        this.html.classList = localStorage.getItem("htmlclass");
    },

    store: function () {
        localStorage.setItem("htmlclass", this.html.classList);
        let cookieVal = (this.html.classList.length > 0 && [...this.html.classList].includes('dark')) ? "dark" : "";
        //this.setCookie('htmlclass',cookieVal,7);
    },

    /*setCookie: function(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    },*/
}

