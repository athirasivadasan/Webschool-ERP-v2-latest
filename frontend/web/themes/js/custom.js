/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */
$(document).ready(function (e) {
  
    $(".navigation-accordion a")
    .each(function() {
        var link = $(this);

        var item = link.parent("li");
        

            if (link.attr('href') === location.href) {  
                
                link.addClass("active").parents("li").addClass("active").parents("li").children("a").addClass("active");
                link.parent("li").parent("ul").parent("li").children("a").trigger( "click" );        
                return false;
            }
        
    });   
});

