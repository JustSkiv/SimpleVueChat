let modal = new Vue({
    el: '#myModal',
    methods: {
        signUp: function () {
            let formData = new FormData();
            formData.append('name', this.name);
            formData.append('password', this.password);

            this.$http.post('/index.php?main/signUp', formData).then(response => {
                console.log(response.body);

                if(response.body['id']) {
                    this.success = true;
                    console.log(response.body['id']);
                } else if(response.body['error']) {
                    this.error = response.body['error'];
                    console.log(response.body['error']);
                }
                // this.message = '';

            }, response => {
                // error callback
            });
        },
        signIn: function () {
            let formData = new FormData();
            formData.append('name', this.nameLogin);
            formData.append('password', this.passwordLogin);

            this.$http.post('/index.php?main/signIn', formData).then(response => {
                console.log(response.body);

                if(response.body['id']) {
                    this.success = true;
                    window.location.replace("/");
                } else if(response.body['error']) {
                    this.error = response.body['error'];
                    console.log(response.body['error']);
                }
                // this.message = '';

            }, response => {
                // error callback
            });
        },
    },
    data: {
        name: '',
        password: '',
        nameLogin: '',
        passwordLogin: '',
        error: '',
        success: false,
        errorMessage: '',
    }
});
