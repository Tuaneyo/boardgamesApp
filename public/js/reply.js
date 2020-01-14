$( document ).ready(function() {
    $(".replyToggle").click(function(){
        $(this).toggleText("<small><i class=\"fas fa-times\"></i>hide</small>", '<small><i class="fas fa-reply-all"></i>reply</small>');
        var index =$(".replyToggle").index($(this));
        $(".formReply:eq("+ index +")").toggle(function() {
            $('.showpanel').slideToggle('slow')
        });
    });



    $('.replySubmit').click(function(e){
        e.preventDefault();
        var index =$(".replySubmit").index($(this));
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var data = {
            _token: CSRF_TOKEN,
            gameid: $('.gameid:eq('+index+')').val(),
            comment_id: $('.commentid:eq('+index+')').val(),
            comment: $('.comment:eq('+index+')').val(),
        };
        //""http://127.0.0.1:8000/reply/store
        $.ajax({
            type: "post",
            url: "https://adsd.clow.nl/~s1131670/P2_Laravel_Opdracht/reply/store",
            data: data,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (data) {
                var pData = JSON.parse(data);
                createReplyBox(index, pData);
            }, error: function (xhr, textStatus, errorThrown) {
                console.log('failed');
            }
        })
    });

    function createReplyBox(i, data)
    {

        // $("<div>").html("Your comment is with ajax saved. Because of the deadline i couln't create a real time form here. Solly When you refresh the page" +
        //     "you can see the reply").insertBefore($( ".reply-wrap:eq("+i+")" ));

        $( ".reply-wrap:eq("+i+")" ).append(
            $("<div>").attr("class", "row comment-wrap my-4")
                .append($("<div>").attr("class", "col-2")
                    .append($("<div>").attr("class", "comment-img")
                        .append($("<img>").attr({src: "https://adsd.clow.nl/~s1131670/P2_Laravel_Opdracht/img/pictures/avatar2.png", class: "img-fluid" , width: "100%", height: "100%" })
                        )
                    ))
                .append($("<div>").attr("class", "col-10")
                    .append($("<div>").attr("class", "comment-body w-100")
                        .append($("<div>").attr("class", "card text-left ownCard bg-transparent p-0 w-100 position-relative comment-card")
                            .append($("<div>").attr("class", "card-header bg-white p-3").html(data.username))
                            .append($("<div>").attr("class", "card-body p-3").html(data.body))
                            .append($("<div>").attr("class", "card-footer p-3 d-flex justify-content-between bg-white no-border font-roboto")
                                .append($("<small>")
                                    .append("<i>").attr("class", "fas fa-calendar-alt text-black-50 font-roboto").html('just now')
                                )
                            )
                        )
                    )
                )
        )
    }
});


jQuery.fn.extend({
    toggleText: function (a, b){
        var that = this;
        if (that.html() != a && that.html() != b){
            that.html(a);
        }
        else
        if (that.html() == a){
            that.html(b);
        }
        else
        if (that.html() == b){
            that.html(a);
        }
        return this;
    }
});


