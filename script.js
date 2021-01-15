$(function(){
    $("#search").on('keyup',function(){
        let val = $(this).val();
        let li = $("#list");
        let save_row = $("#save");
        $.ajax({
            url: "search.php",
            type: "post",
            data:{action:'search_user',search:val},
            dataType: "json",
            success:function(result){
            li.html('');
                if (result.length==0) {
                    li.html('');
                }
                li.html('');
                li.html(result);
                $('.s').on('click',function(){
                    let id = $(this).val();
                    let name = $(this).next().text();
                    let save = "<div class=' border m-3'>"
                            save += "<button type='button' class = 'btn text-capitalize close' > x </button>";
                            save += "<input type='hidden' name='us[]' value='"+id+"'>";
                            save += "<label class = 'form-check-label text-capitalize' style='margin-right: 10px;' >"+name+" </label>";
                    save += "</div>";
                    save_row.append(save);
                    $('.close').on('click',function(){
                        $(this).parent().remove();
                    })
                })
            }
        })
    })

})
