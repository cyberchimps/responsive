jQuery(document).ready(function ($) {
  $("body").on("click", ".responsive-custom-upload-media-btn", function (e) {
    e.preventDefault();

    var id = $(this).attr("id"),
      btn = $(this),
      img_element = $(`.${id}_img`),
      custom_uploader = wp
      .media({
        title: "Insert Image",
        library: {
          type: "image"
        },
        button: {
          text: "Use this image"
        },
        multiple: false
      })
      .on("select", function () {
        var attachment = custom_uploader
          .state()
          .get("selection")
          .first()
          .toJSON();

        img_element
          .attr("src", attachment.url)
          .css("display", "block");

        btn.text("Remove Image")
          .removeAttr("role")
          .attr({
            href: "#",
            class: "responsive-image-remove"
          })
          .css("margin", "0");

        btn.next().val(attachment.url).trigger("change");
      })
      .open();
  });

  $("body").on("click", ".responsive-image-remove", function (e) {
    e.preventDefault();

    var id = $(this).attr("id"),
      btn = $(this),
      img_element = $(`.${id}_img`);

    img_element.attr("src", "").css("display", "none");

    btn.text("Choose Image")
      .removeAttr("href")
      .attr({
        role: "button",
        class: "button button-primary responsive-custom-upload-media-btn"
      })
      .css({
        marginTop: "7px",
        marginLeft: "5px"
      });
      
    btn.next().val("").change().trigger("change");
  });
});