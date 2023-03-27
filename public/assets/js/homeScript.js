
$(document).ready(() => {

  $("#imagePreview").css("display", "none");

  $("#create-post-media").change(function () {
    const file = this.files[0];
    if (file) {
      let reader = new FileReader();
      reader.onload = function (event) {
        $("#imagePreview")
          .attr("src", event.target.result);
        $("#imagePreview").css("display", "block");
      };
      reader.readAsDataURL(file);
    }
  });
});

