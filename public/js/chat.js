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
new Vue({
    el: '#chat-main',

    methods: {
        send: function (event) {
            // `this` внутри методов указывает на экземпляр Vue
            alert('Привет, ' + this.name + '!');
            // `event` — нативное событие DOM
            // if (event) {
            //     alert(event.target.tagName)
            // }
        },
        update: function (event) {
            this.$http.post('/index.php?main/messages').then(response => {

                console.log(response.body);
                // this.messages = response.body;
                this.messages = response.body;

            }, response => {
                // error callback
            });
        }
    },

    beforeMount() {
        this.update()
    },

    data: {
        messages: []
    }
});

var demo = new Vue({
    el: '#demo',
    data: {
        message: 'Hello, Singree!'
    }
});