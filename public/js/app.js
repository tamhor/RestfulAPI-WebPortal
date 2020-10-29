$('#v-pills-tab a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
})

function insertid() {
    $('.modal').modal('show');
}

$('.modal').on('show.bs.modal', function (e) {
    $(e.relatedTarget)
    
    var url = $('#insertid').data('url')
    $('#inputid').on('keyup', function (e) {
        var id = $(this).val()
        var urlid = url +'/'+ id
        var result = $('#submit').attr('href', urlid)
        console.log(result)
    })
})