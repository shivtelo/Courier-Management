
function get_city_id(e)
{
    var city_name   = e.value;
    var field_id    = e.id;
    field_id        = field_id.slice(0, -1);

    $.ajax({
        type: "POST",
        url: "jxcommon.php",
        data: {city_name : city_name},
        success: function( data ) {
            $( "#"+field_id ).val(data);
        }
    });
}

function get_city(e)
{
    var state_id    = e.value;
    $.ajax({
        type: "POST",
        url: "jxcommon.php",
        data: {state_id : state_id},
        success: function( data ) {
//            alert(data);
            $( "#city" ).html(data);
        }
    });
}