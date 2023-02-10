(function($){
    $("#main__carousel").owlCarousel({
        items: 1,
        loop: false,
        autoPlay: false,
        dots: false,
        nav: true,
        navText: ['<i class="uil uil-angle-left fs-50"></i>','<i class="uil uil-angle-right fs-50"></i>']
    });
    // $("#partners__flex").owlCarousel({
    //     items: 5,
    //     nav: false,
    //     margin: 15,
    //     loop: true,
    //     dots: false,
    //     responsive : {
    //         // breakpoint from 0 up
    //         0 : {
    //            items: 1
    //         },
    //         // breakpoint from 480 up
    //         480 : {
    //             items: 1
    //         },
    //         // breakpoint from 768 up
    //         768 : {
    //             items: 2
    //         },
    //         992 : {
    //             items: 4
    //         },
    //         1024 : {
    //             items: 5
    //         }
    //     }
    // });
    $("#best__deal__slider").owlCarousel({
        items: 4,
        loop: true,
        margin: 15,
        nav: true,
        dots:false,
        responsive : {
            // breakpoint from 0 up
            0 : {
               items: 1,
               nav: false,
            },
            // breakpoint from 480 up
            480 : {
                items: 1,
                nav: false,
            },
            // breakpoint from 768 up
            768 : {
                items: 2,
                nav: false,
            },
            992 : {
                items: 3,
                nav: true,
            },
            1024 : {
                items: 4,
                nav: true,
            }
        }
    });

    // reset compare system
    $('.compare_item_box').hide();
    $(document.body).on('click','.compare_item_box_close,.compare_modal_box .btn-close,.compare_modal_box .modal-footer button',function(){
        $('.compare_item_box').hide();
        $(".compare-table thead tr,.compare-table tbody tr").remove();
        $(".compare_item_list_ul li").remove();
        $('.cmp__btn').removeClass('btn__red text-white');
    });

    let all_btn = document.querySelectorAll(".cmp__btn");
    all_btn.forEach(function(btn) {
        btn.addEventListener("click", function() {
            // Get Data
            var type= btn.dataset.type,
            itemID = btn.dataset.item,
            imgSrc = btn.previousElementSibling.getAttribute('src');
            if ($('.compare_item_list_ul li').length <= 2){

                // Set value for compare card and loan
                document.querySelector('.compare_pop_btn').setAttribute('data-compare',type);
                if ($('#row-'+itemID).length == 0) {
                    $(this).addClass('btn__red text-white');
                    document.querySelector('.compare_item_list_ul').insertAdjacentHTML('afterbegin','<li id="item-'+itemID+'"><input type="hidden" class="rowItemID" id="row-'+itemID+'" value="'+itemID+'" name="items_id[]"><img src="'+imgSrc+'" alt="" class="item_img" width="150" height="100"></li>');
                }else{
                    $(this).removeClass('btn__red text-white');
                    document.querySelector('#item-'+itemID).remove();
                }
                
            }else {
                alert('You are not able to compare more then 4 items. :)');
            }

            if ($('.compare_item_list_ul li').length == 0) {
                $('.compare_item_box').hide();
            }else{
                $('.compare_item_box').show();
            }
                
            
        });
    });


    $(document).on('click','.compare_pop_btn',function(e){
        e.preventDefault();
        
        var that = $('.compare_pop_btn');
        var itemID = [], url,storage_url,compare;
        url = that.data('url');
        storage_url = that.data('storage');
        compare = that.data('compare');
        $('.compare_modal_box .modal-title span').text(compare);
        $('.rowItemID').each(function(){
            itemID.push(this.value); 
        });
        // return;
        $.ajax({
            type: "GET",
            url: url,
            data: {
                serviceItem: itemID,
                type: compare
            },
            dataType:"json",
            success: function(response){
                $.each(response.header,function(hkey,hvalue){
                    if(hvalue !== "image"){
                        $(".compare-table tbody").append('<tr class="'+hkey+'"><td class="title">'+hvalue+'</td></tr>');
                    }
                    if(hvalue == "image"){
                        $(".compare-table thead").append('<tr><th>Details</th></tr>');
                    }

                });

                $.each(response.data, function(key,value){
                    var td_class = "compare_item_"+key;
                    $.each(response.header,function(hkey,hvalue){
                        
                        if(hvalue == "image"){
                            $(".compare-table thead tr").append('<th><img src="'+storage_url+'/frontend/assets/img/'+compare+'/'+value[hkey]+'"></th>')   
                        }else{
                            
                            if(hkey == "eligibility" || hkey == "fees_charges" || hkey == "features"){
                                var el = JSON.parse(value[hkey]);
                                $(".compare-table tbody tr."+hkey).append('<td class="body '+td_class+'"><ul></ul></td>');
                                $.each(el,function(ekey,evalue){
                                    $(".compare-table tbody tr."+hkey+" td."+td_class+" ul").append('<li>'+evalue+'</li>');
                                });
                            }else {
                                $(".compare-table tbody tr."+hkey).append('<td>'+value[hkey]+'</td>');
                            }
                            
                        }
                    });
                });


            }
        });
        
    });

    
})(jQuery);