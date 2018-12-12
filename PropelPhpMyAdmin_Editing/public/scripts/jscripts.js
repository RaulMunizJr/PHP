
                        //Editing Steps Page

//editing the name of food
$('.recipe_name').click(function(){     //if title clicked
    
    
    text = $(this).text();                                  //set text
    box = $('<input>').attr('type','textbox').val(text);    //to be recieved

    box.blur(function(){                                    //trigger box
        id = box.parent().attr('id');                       //assign id
        newname = $(this).val();                            //save new text
        
        console.log("Id: " + id + " New Name: " + newname);

        $.ajax({url : baseurl + '/handlers/edit_recipe/' + id + '/' + newname,  //ajax handler
                dataType : "text"
            }).done(function(){
                $(this).parent().text(newname);
            })
    })

    $(this).text('')        //select    
    $(this).append(box)     //text
    box.select()            //box


})

//********************************************************************************************//

//editing steps
$(".step").click(function(){
    text = $(this).text()
    box = $('<input>').attr('type','textbox').val(text)

    box.blur(function(){
        id = box.parent().attr('id')
        newstep = $(this).val()
        console.log("Id: " + id + "New step: " + newstep);

        $.ajax({url : baseurl + '/handlers/edit_step/' + id + '/' + newstep,
                dataType : "text"})
        .done(
            $(this).parent().text(newstep)
        )

    })

    $(this).text('');
    $(this).append(box)
    box.select()

})

//********************************************************************************************//

//adding steps
$(".add_btn").click(function(){
    box = $('<input>').attr('type','textbox').val("")
    
    box.blur(function(){
        id = $(".recipe_name").attr('id');
        desc = $(this).val()

        $.ajax({url : baseurl + "/handlers/add/" + id + "/" + desc})
        .done(function(){
        
            $(this).parent().text(desc);
        })
    
    })
    
    $(this).text('+');
    $(".steps_list").append(box);
    box.select();
    // It adds a new step but you need to refresh the page
    // to see it 
})

//********************************************************************************************//

//being able to move steps around
$( ".step" ).draggable({
    grid: [ 50, 20 ]
  });

$( ".step" ).draggable( "option", "grid", [ 50, 20 ] );