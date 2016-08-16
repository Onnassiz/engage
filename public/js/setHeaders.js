$(document).ready(function(){
    var headings = [
        'First name',
        'Surname',
        'State of origin',
        'Sex',
        'Organization',
        'Function/Rank/Title',
        'Current city',
        'Current state',
        'First Email (Mandatory)',
        'Second Email (Optional)',
        'Phone 1',
        'Phone 2',
        'Periodicity',
        'Media',
        'Tags'
    ];


    $('.spinner .btn:first-of-type').on('click', function() {
        var value = $(this).parent().parent().find('input').val();

        var prev = headings.indexOf(value);
        prev = (prev == 0)?14:prev - 1;

        $(this).parent().parent().find('input').val(headings[prev]);
    });
    $('.spinner .btn:last-of-type').on('click', function() {
        var value = $(this).parent().parent().find('input').val();

        var next = headings.indexOf(value);
        next = (next == 14)?0:next + 1;

        $(this).parent().parent().find('input').val(headings[next]);
    });

    function hasDuplicates(array) {
        return (new Set(array)).size !== array.length;
    }

    $('#startImport').click(function(){

        var requestData = [
            headings.indexOf($('#0').val()),
            headings.indexOf($('#1').val()),
            headings.indexOf($('#2').val()),
            headings.indexOf($('#3').val()),
            headings.indexOf($('#4').val()),
            headings.indexOf($('#5').val()),
            headings.indexOf($('#6').val()),
            headings.indexOf($('#7').val()),
            headings.indexOf($('#8').val()),
            headings.indexOf($('#9').val()),
            headings.indexOf($('#10').val()),
            headings.indexOf($('#11').val()),
            headings.indexOf($('#12').val()),
            headings.indexOf($('#13').val()),
            headings.indexOf($('#14').val())
        ];

        if(hasDuplicates(requestData)){
            $('#duplicatesError').modal({
                show: true
            });
        }else{
            $.ajax({
                url: "http://engage.dev/contacts/setHeaders",
                data: {
                    0:      requestData[0],
                    1:      requestData[1],
                    2:      requestData[2],
                    3:      requestData[3],
                    4:      requestData[4],
                    5:      requestData[5],
                    6:      requestData[6],
                    7:      requestData[7],
                    8:      requestData[8],
                    9:      requestData[9],
                    10:     requestData[10],
                    11:     requestData[11],
                    12:     requestData[12],
                    13:     requestData[13],
                    14:     requestData[14]
                },
                type: 'GET',
                success: function (data) {
                    window.location.replace('http://engage.dev/contacts/import/main');
                },
                error: function (request, status, error) {
                    console.log(error);
                }
            });
        }
    });
});