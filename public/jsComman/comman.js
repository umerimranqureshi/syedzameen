//////----------------------- resource delete -----------------------///////
var deletee = function($route, $id) {
    $.ajax({
        url: $route + "/" + $id,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        method: "delete",
        success: function(res) {
            console.log(res);
        }
    });
};

function imgError(image) {
    image.onerror = "";
    image.src = "./profilepic.png";
    //console.log("image error");
    return true;
}

/////////------------------------Add post amenities validation----------------------------//

$(document).on("keydown", "#amenities", function() {
    $nameValue = $(this).val();
    //$regex = /^[A-Za-z-,]+$/;
    $regex = /^([a-zA-Z]+,?)+[a-zA-Z]*$/;

    if (!$nameValue.match($regex)) {
        $newVal = $nameValue.substr(0, $nameValue.length - 1);
        $(this).val($newVal);
    }
});

var AjaxCall = function($url) {
    let data;
    $.ajax({
        url: $url,
        async: false,
        success: function(res) {
            data = res;
        }
    });

    return data;
};
