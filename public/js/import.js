$(document).ready(function(){

    var currentUrl = window.location.href;

    if(currentUrl == 'http://engage.dev/contacts/import/main'){
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

        var success = 0;
        var failed = 0;

        $.each(contacts, function(i, contact){
            contact = JSON.stringify(contact);
            var dataObject = JSON.parse(contact);
            setTimeout(function(){
                $.ajax({
                    url: "http://engage.dev/contacts/postImport",
                    data: {
                        id:                 dataObject.id,
                        key:                dataObject.email_1+dataObject.organization,
                        number:             dataObject.number,
                        firstName:          dataObject.firstname,
                        surname:            dataObject.surname,
                        state_of_origin:    dataObject.state_of_origin,
                        sex:                dataObject.sex,
                        organization:       dataObject.organization,
                        function:           dataObject.function,
                        current_city:       dataObject.current_city,
                        current_state:      dataObject.current_state,
                        email_1:            dataObject.email_1,
                        email_2:            dataObject.email_2,
                        phone_1:            dataObject.telephone_1,
                        phone_2:            dataObject.telephone_2,
                        periodicity:        dataObject.periodicity,
                        media:              dataObject.media,
                        tags:               dataObject.tags
                    },
                    type: 'GET',
                    success: function (data) {
                        success++;
                        var j = Math.ceil((i+1) * (100/count));
                        $('#progress').attr('style', 'width: '+j+'%');
                        $('#progress-body').text(j+'% Complete');
                        $('#success').text(success+' successfully imported');
                        $('#failed').text(failed+' failed');
                        $('#total').text(i+1+' contact processed');
                        if(i == (count - 1)){
                            window.location.replace('http://engage.dev/contacts/import/review');
                        }
                    },
                    error: function (data) {
                        failed++;
                        var j = Math.ceil((i+1) * (100/count));
                        $('#progress').attr('style', 'width: '+j+'%');
                        $('#progress-body').text(j+'% Complete');
                        $('#success').text(success+' successfully imported');
                        $('#failed').text(failed+' failed');
                        $('#total').text(i+1+' processed');
                        if(i == (count - 1)){
                            window.location.replace('http://engage.dev/contacts/import/review');
                        }
                    }
                });
            },i * 300);
        });
    }
});