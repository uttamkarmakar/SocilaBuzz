$(document).ready(function () {
  var a = 10;
  $("#main-container").load("posts", { limit: 10 }, function (responseTxt, statusTxt, xhr) { });
  $(".button-container #div1").click(function () {
    $("#main-container").load("posts", { limit: a }, function (responseTxt, statusTxt, xhr) {
      a += 10;
    });
  });
  // $('.like-btn').on('click',function(){
  //   var post_id = $(this).data('data-id');
  //   $clicked_btn = $(this);

  //   if($clicked_btn.hasClass('fa-solid')) {
  //     action = 'like';
  //     alert(action);
  //   }

  //   else if($clicked_btn.hasClass('fa-regular')) {
  //     action = "unlike";
  //     alert(action);
  //   }

  //   $.ajax({
  //     url: '/posts',
  //     type: 'post',
  //     data : {
  //       'action':action,
  //       'post_id':post_id
  //     },

  //     success: function(data) {
  //       res = JSON.parse(data);
  //       if(action == "like") {
  //         $clicked_btn.removeClass('fa-regular');
  //         $clicked_btn.addClass('fa-solid');
  //       }
  //       else if(action == "unlike") {
  //         $clicked_btn.removeClass('fa-solid');
  //         $clicked_btn.addClass('fa-regular');
  //       }
  //     }
  //   })
  // })

});