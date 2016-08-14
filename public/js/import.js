$(document).ready(function(){

    function getContacts(){
        var contacts;
        $.ajax({
            url: "http://engage.dev/contacts/getUploaded",
            data: {format: "json", sample: 'sample'},
            dataType: 'json',
            type: 'GET',
            async:false,
            success: function (data) {
                contacts = data;
            },
            error: function (request, status, error) {
                console.log(error);
            }
        });
        return contacts;
    }

    var contacts = getContacts();

    var count = contacts.length;

    $('#startImport').click(function(){
        $.each(contacts, function(i, contact){
            var success = 0;
            var failed = 0;
            setTimeout(function(){
                $.ajax({
                    url: "http://engage.dev/contacts/postImport",
                    data: {contact: contact},
                    type: 'GET',
                    success: function (data) {
                        //alert(data);
                        //$('#show').append(data);
                        var j = Math.ceil(i * (100/count));
                        $('#progress').attr('style', 'width: '+j+'%');
                        $('#progress-body').text(j+'% Complete');
                    },
                    error: function (request, status, error) {
                        console.log(error);
                    }
                });
            }, i * 400);
        });
    });
});