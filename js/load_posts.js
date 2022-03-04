

    document.addEventListener("DOMContentLoaded", function(event) { 
        var page = 1;
        var many = 9;
        var excluded_ids = window.excluded_ids;
        var category_id = window.category_id;
        var no_more_posts = false;
    
        var getPosts = () => {
            if(no_more_posts) return;
            
            page++;
    
            
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
                beforeSend:function(data){ // Are not working with dataType:'jsonp'
                    jQuery("#load_more_posts").hide();
                    jQuery("#load_more_post-gift").show();
                },
                success: (response ) => {
    
                    response = JSON.parse(response);
    
                    no_more_posts = response.no_more_items;
        
                    if(!no_more_posts){
                        excluded_ids = response.excluded_ids;
                        
                        jQuery('.rsv9_blog_content').append(response.more_posts);
                        jQuery("#load_more_post-gift").hide();
                        jQuery("#load_more_posts").show();
                    }else{
                        jQuery("#load_more_posts").hide();
                        jQuery("#hide_no_resulsts").show();
                        jQuery("#load_more_post-gift").hide();
                    }    
                },
                fail: (error) => {
                    console.log(error);
                }
    
            });
            
        }
        
        jQuery("#load_more_posts").on( 'click', getPosts );
    
      });
