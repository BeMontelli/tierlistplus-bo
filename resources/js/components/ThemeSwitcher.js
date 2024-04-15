export default {
    init: function () {
        this.themeswitch = document.querySelector('.themeswitch');
        this.html = document.querySelector('html');

        if(!this.themeswitch || !this.html) return;

        if (
            window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            && (!localStorage.getItem("htmlclass") || !localStorage.getItem("htmlclass").includes('force'))
        ) {
            this.store("","dark");
        }

        this.load();

        this.themeswitch.addEventListener("click", (e) => {
            this.html.classList.toggle('dark');
            this.store("force");
        });
    },

    load: function () {
        this.html.classList = localStorage.getItem("htmlclass");
    },

    store: function (force = "",type) {
        let cookieVal = (this.html.classList.length > 0 && [...this.html.classList].includes('dark')) ? "dark" : "light";
        if(type) {
            cookieVal = type;
        }
        localStorage.setItem("htmlclass", cookieVal+" "+force);
        this.setCookie('htmlclass',cookieVal+" "+force,7);
    },

    setCookie: function(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/;SameSite=Lax";
    }
}

