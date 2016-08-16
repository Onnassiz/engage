$('document').ready(function(){
    var orgFilter = [];
    var functionFilter = [];

    if(orgFilter.length == 0){
        $('#orgFilterStatus').text("No filters selected");
    }

    if(functionFilter.length == 0){
        $('#functionFilterStatus').text("No filters selected");
    }

    $('#orgF').click(function(){
        var organization = $('#organization');

        if(organization.val() == 'Select Organization'){
            $('#orgErrorMessage').html("You have not selected any organization");
            $('#orgError').modal({
                show: true
            });
        }
        else{
            $('#orgFilterStatus').remove();
            if(jQuery.inArray(organization.val(), orgFilter) == -1){
                orgFilter.push(organization.val());
                $('#orgListing').append("<li>"+organization.val()+"</li>");
            }
            else{
                $('#orgErrorMessage').html("You have already added "+ "<b>"+organization.val()+"</b>");
                $('#orgError').modal({
                    show: true
                });
            }
        }
    });
    $('#addFunction').click(function(){
        var func = $('#function');

        if(func.val() == 'Select Function/Rank/Title'){
            $('#orgErrorMessage').html("You have not selected any function");
            $('#orgError').modal({
                show: true
            });
        }
        else{
            $('#functionFilterStatus').remove();
            if(jQuery.inArray(func.val(), functionFilter) == -1){
                functionFilter.push(func.val());
                $('#functionListing').append("<li>"+func.val()+"</li>");
            }
            else{
                $('#orgErrorMessage').html("You have already added "+ "<b>"+func.val()+"</b>");
                $('#orgError').modal({
                    show: true
                });
            }
        }
    });

    $('#submitFilter').click(function(){
        if(orgFilter.length == 0 && functionFilter.length == 0){
            $('#orgErrorMessage').html("No filters supplied. Click the "+"<b>"+"Proceed"+"</b>"+ " if you want to send to all the members in your list");
            $('#orgError').modal({
                show: true
            });
        }
        else{
            $.ajax({
                url: "http://engage.dev/publications/postFilters",
                data: {
                    organizations: orgFilter,
                    functions: functionFilter
                },
                type: 'GET',
                success: function (data) {
                    window.location.reload();
                },
                error: function (data) {

                }
            });
        }
    });
});