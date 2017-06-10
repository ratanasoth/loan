/**
 * Created by Vongkol on 4/1/2017.
 */
$(document).ready(function () {
    getDistrict();
    // filter district on province change
    $("#province").change(function () {
      getDistrict();
    });
    // before submit the form
    $("#frm").submit(function (event) {
        event.preventDefault();
        var pname = $("select#province :selected").text();
        var dname = $("select#district :selected").text();
        $("#province_name").val(pname);
        $("#district_name").val(dname);
        frm.submit();
    });
});
// function to get district
function getDistrict()
{
    // get district
    $.ajax({
        type: "GET",
        url: burl + "/district/get/" + $("#province").val(),
        success: function (data) {
            var opts = "";
            for(var i=0; i<data.length; i++)
            {
                opts +="<option value='" + data[i].id + "'>" + data[i].name + "</option>";
            }
            $("#district").html(opts);
        }
    });
}