export default {
    init: function () {
        this.inputslug = document.querySelectorAll('input.inputslug');

        if(this.inputslug.length > 0) {
            this.inputslug.forEach(input => {

                const inputslugOrigin = input.parentNode.querySelector('input.inputslugorigin');
                if(inputslugOrigin) {
                    inputslugOrigin.addEventListener("change", (e) => {
                        if(input.value === "" || input.value === null) {
                            input.value = this.slugify(inputslugOrigin.value);
                        }
                    });
                }

                input.addEventListener("change", (e) => {
                    input.value = this.slugify(input.value);
                });
            });
        }
    },

    slugify: function (value, separator = "-") {
        return value
            .toString()
            .normalize('NFD')                   // split an accented letter in the base letter and the acent
            .replace(/[\u0300-\u036f]/g, '')   // remove all previously split accents
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9 ]/g, '')   // remove all chars not letters, numbers and spaces (to be replaced)
            .replace(/\s+/g, separator);
    }
}

