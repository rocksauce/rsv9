jQuery("#hide_no_resulsts").hide();
jQuery(document, window).ready(function () {

    $( ".et-l--footer ul li:nth-child(6)  > a" ).attr("href", "/blog");


    $('a:contains("Terms of Services")').filter(function(index)
    {
        return $(this).text() === "Terms of Services";
    }).attr("href", "/terms-of-service");


     $('a:contains("Privacy Policy")').filter(function(index)
    {
        return $(this).text() === "Privacy Policy";
    }).attr("href", "/privacy-policy-2");
    
    var page = 1;
    var many = 6;
    var excluded_ids = window.excluded_ids;
    var category_id = window.category_id;
    var no_more_posts = false;

    function getWork(){
        if(no_more_posts) return;
        
        page++;

        
        console.log(page);
        
        var dataObj = {
            data: {
                page: page,
                many: many,
                excluded_ids: excluded_ids,
                category_id:category_id
            },
            action: 'load_work_posts_api',
            nonce: ajax_info.ajax_nonce
        }

        jQuery.ajax({
            url: ajax_info.ajax_url,
            type: 'POST',
            data: dataObj,
            success: (response ) => {

                response = JSON.parse(response);

                no_more_posts = response.no_more_items;
                 
                if(response.more_posts){
                    excluded_ids = response.excluded_ids;
                    
                    jQuery('.rsv9_work_content').append(response.more_posts);
                }else{
                    jQuery("#load_more_work").hide();
                    jQuery("#hide_no_resulsts").show();
                }
                
                    

            },
            fail: (error) => {
                console.log(error);
            }

        });
        
    }
    
 
    jQuery("#load_more_work").on( 'click', getWork );

    
      //jQuery("#load_more_work").click();
      jQuery("#load_more_work").hide();

  });

