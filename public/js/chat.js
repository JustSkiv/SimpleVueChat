Vue.component('chat-message', {
    props: ['name', 'text', 'image', 'time'],
    template: '<div class="media msg">\
        <a class="pull-left" href="#">\
        <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" :src="image"></a>\
        <div class="media-body">\
            <small class="pull-right time"><i class="fa fa-clock-o"></i> {{ time }}</small>\
            <h5 class="media-heading">{{ name }}</h5>\
            <small class="col-lg-10">{{ text }}</small>\
        </div>\
    </div>'
});

// создание корневого экземпляра
let chat = new Vue({
    el: '#chat-main',

    data: {
        messages: [],
        message: ''
    },

    methods: {
        send: function () {
            if(!this.message) {
                return false;
            }

            let formData = new FormData();
            formData.append('text', this.message);

            this.$http.post('/index.php?main/addAjax', formData).then(response => {
                this.message = '';

            }, response => {
                // error callback
            });
        },
        updateMessages: function (event) {
            this.$http.post('/index.php?main/getAjax').then(response => {
                this.messages = response.body;

            }, response => {
                // error callback
            });
        },
        add: function (newMessage) {
            this.messages.push({
                name: newMessage.name,
                text: newMessage.text,
                image: newMessage.image,
            });
            // this.$forceUpdate();
            // this.scrollToEnd();
        },
        scrollToEnd: function() {
            let container = this.$el.querySelector("#messages");
            container.scrollTop = container.scrollHeight;
        },
    },

    updated(){
        this.scrollToEnd();
    },

    beforeMount() {
        this.updateMessages()
    },
});

let demo = new Vue({
    el: '#demo',
    data: {
        message2: 'Hello, asd!'
    }
});