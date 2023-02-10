/*JQuery('#inquiry_area').on("keyup keypress keydown paste",function(e) {
    alert("working");
    var tval = JQuery('#inquiry_area').val(),
        tlength = tval.length,
        set = 10,
        remain = parseInt(set - tlength);
    JQuery('#word_count').text(remain);
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
        $('#inquiry_area').val((tval).substring(0, tlength - 1));
        return false;
    }
})*/

/*jQuery("#inquiry_area").on('keyup', function (e) {
    //alert("keyup");
    var currText = jQuery(this).val();
    var count = jQuery(this).val().length;
    if (currText.length > 10) {
        var text = jQuery(this).text(count).css('color:red');
        jQuery(this).text(text.substr(0, 10));
        alert("You have reached the maximum length for this field");
        jQuery(".word_count span").text()
        jQuery("#send_mail").prop("disabled",true);
    }else{
        jQuery("#send_mail").prop("disabled",false);
    }
});*/

jQuery('#inquiry_area').keyup(function() {
    var $this, wordcount;
    $this = jQuery(this);
    wordcount = $this.val().length;//split(/\b[\s,\.-:;]*/).
    if (wordcount > 5) {
      jQuery("#send_mail").prop("disabled",true);
      jQuery(".show_message span").text("※The content exceeds 200 characters!").css('color:red');
      return false; //alert("You've reached the maximum allowed words.");
    } else {
        jQuery("#send_mail").prop("disabled",false);
        jQuery(".show_message span").text("").css('color:red');
      //return true; //jQuery(".show_message span").text(wordcount);
    }
  });

  