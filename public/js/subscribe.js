$(document).ready(function() {
    $(".custom-errors").hide();

    $(".submit-btn").click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        $(".submit-btn").html("Sending..");
        $.ajax({
            url: "/subscribe",
            method: "post",
            data: $("#book-ticket").serialize(),
            success: function(response) {
                if (response.status) {
                    $("#res_message").html(response.msg);
                    $("#msg_div").removeClass("alert-danger");
                    $("#msg_div").addClass("alert-success");
                    $("#msg_div").show();
                    $("#res_message").show();
                    $(`.${response.type}-span`).html(response.remain);
                }

                document.getElementById("book-ticket").reset();
                setTimeout(function() {
                    $("#res_message").hide();
                    $("#msg_div").hide();
                    $(".submit-btn").html("Book Now!");
                }, 5000);
            },
            error: function(response) {
                $("#res_message").html(response.responseJSON.msg);
                $("#msg_div").removeClass("alert-success");
                $("#msg_div").addClass("alert-danger");
                $("#msg_div").show();
                $("#res_message").show();

                $.each(response.responseJSON.errors, function(index, value) {
                    $(`.${index}-error`).html(value);
                    $(`.${index}-error`).show();
                });

                // document.getElementById("book-ticket").reset();
                setTimeout(function() {
                    $("#res_message").fadeOut();
                    $("#msg_div").fadeOut();
                    $(".custom-errors").fadeOut();
                    $(".submit-btn").html("Book Now!");
                }, 3000);
            }
        });
    });
});
