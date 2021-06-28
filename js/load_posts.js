jQuery("#hide_no_resulsts").hide();
jQuery(document, window).ready(function () {
    
    var page = 1;
    var many = 9;
    var excluded_ids = window.excluded_ids;
    var category_id = window.category_id;
    var no_more_posts = false;

    var getPosts = () => {
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
            action: 'load_posts_api',
            nonce: ajax_info.ajax_nonce
        }

        jQuery.ajax({
            url: ajax_info.ajax_url,
            type: 'POST',
            data: dataObj,
            success: (response ) => {

                response = JSON.parse(response);

                no_more_posts = response.no_more_items;
                
                if(!no_more_posts){
                    excluded_ids = response.excluded_ids;
                    
                    jQuery('#more_posts').append(response.more_posts);
                }else{
                    jQuery("#load_more_posts").hide();
                    jQuery("#hide_no_resulsts").show();
                }
                
                    

            },
            fail: (error) => {
                console.log(error);
            }

        });
        
    }
    
    jQuery("#load_more_posts").on( 'click', getPosts );

  });