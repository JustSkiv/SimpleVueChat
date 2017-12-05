const logout = () => {
    let formData = new FormData();
    formData.append('name', this.name);

    // this.$http.post('/index.php?main/signOut', formData).then(response => {
    //     window.location.replace("/");
    // });

    $.ajax({
        type: 'POST',
        url: '/index.php?main/signOut',
        // data: data,
        success: function () {
            window.location.replace("/");
        },
        // dataType: dataType
    });
};