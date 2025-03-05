$(document).ready(function () {
    $.ajax({
        url: "fetch_personal_details_1.php",
        method: "GET",
        dataType: "json",
        success: function (data) {
            if (!data.error) {
                $("#profile-pic").attr("src", data.profile_pic);
                $("#name").text(data.name);
                $("#dob").text(data.dob);
                $("#mobile").text(data.mobile);
                $("#email").text(data.email);
                $("#fatherName").text(data.father_name);
                $("#fatherMobile").text(data.father_mobile);
                $("#address").text(data.address);
            } else {
                console.log("No data found.");
            }
        },
        error: function () {
            console.log("Error fetching data.");
        }
    });
});
