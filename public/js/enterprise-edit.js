/**
 * Created by Vongkol on 4/1/2017.
 */
$(document).ready(function () {
    // filter district on province change
    $("#province").change(function () {
        getDistrict();
    });
    $("#district").change(function () {
        getCommune();
    });
    $("#commune").change(function () {
        getVillage();
    });

});
// function to get district
function getDistrict()
{
    // get district
    $.ajax({
        type: "GET",
        url: burl + "/company/getdistrict/" + $("#province").val(),
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].id + "'>" + data[i].name + "</option>";
            }
            $("#district").html(opts);
            setTimeout(getCommune, 300);
        }
    });
}
// function to get commune
function getCommune()
{
    $.ajax({
        type: "GET",
        url: burl + "/company/getcommune/" + $("#district").val(),
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].id + "'>" + data[i].name + "</option>";
            }
            $("#commune").html(opts);
            setTimeout(getVillage, 300);
        }
    });
}
// function to get village
function getVillage() {
    $.ajax({
        type: "GET",
        url: burl + "/company/getvillage/" + $("#commune").val(),
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].id + "'>" + data[i].name + "</option>";
            }
            $("#village").html(opts);
        }
    });
}
// function save
function update() {
    data = {
        id: $("#id").val(),
        code: $("#code").val(),
        name: $("#name").val(),
        other: $("#other").val(),
        allow_no: $("#allow_no").val(),
        allow_date: $("#allow_date").val(),
        province_id: $("#province").val(),
        province_name: $("#province :selected").text(),
        district_id: $("#district").val(),
        district_name: $("#district :selected").text(),
        commune_id: $("#commune").val(),
        commune_name: $("#commune :selected").text(),
        village_id: $("#village").val(),
        village_name: $("#village :selected").text(),
        isallowed: $("#isallowed").val()
    };
    var state = false;
    var o = confirm('តើអ្នកពិតជាចង់ផ្លាស់ប្តូរមែនទេ?');
    if(o)
    {
        if(data.name!="" && data.code!="")
        {
            state=true;
        }
        if(state)
        {
            $("#sms").html("សូមរងចាំ <img src='" + burl + "/img/ajax-loader.gif'>");
            $.ajax({
                data: data,
                url: burl + "/enterprise/update",
                type: 'POST',
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', $("input[name='_token']").val());
                },
                success: function(response){
                    $("#sms").html("<p class='text-success'>ទិន្នន័យត្រូវបានរក្សាទុកដោយជោគជ័យ</p>");
                    setTimeout(function () {
                        $("#sms").html("");
                        window.location.href = burl + "/enterprise";
                    }, 1000);
                },
                error: function (sms) {

                }
            });
        }
        else{
            alert('ពត៌មានមិនត្រូវទេ សូមបំពេញពត៌មានឱ្យបានត្រឹមត្រូវ!');
        }
    }
}