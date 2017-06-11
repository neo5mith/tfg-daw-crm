/*global $*/
/*global $notify*/


//When window loaded, execute that function
window.onload = getBasicData();


// Getting basic information from the project and put it into a table
function getBasicData(){
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/clients',
        type: 'GET',
        success: function(result){
            var items = [];
            items.push('<table class="table table-bordered"><tr><th class="text-center">Id</th><th class="text-center">DNI</th><th class="text-center">Name</th><th class="text-center">Surname</th><th class="text-center">Details</th><th class="text-center">Update Details</th><th class="text-center">Delete</th></tr>');
            $.each(result, function(key, value){
                items.push('<tr>'); 
                items.push('<td class="text-center"><a href="detail.php?id='+value.id+'">'+value.id+'</a></td>');
                items.push('<td class="text-center">'+value.dni+'</td>');
                items.push('<td class="text-center">'+value.name+'</td>');
                items.push('<td class="text-center">'+value.surname+'</td>');
                items.push('<td class="text-center"><a type="button" class="btn btn-primary" href="detail.php?id='+value.id+'">View details</a></td>');
                items.push('<td class="text-center"><a type="button" class="btn btn-primary" href="update.php?id='+value.id+'">Update details</a></td>');
                items.push('<td class="text-center"><a type="button" class="btn btn-danger" value=('+value.id+') onclick="sureAboutDelete()">Delete Client</a></td>');
                items.push('</tr>');
            });
            items.push('</table>');
            $('#tralari').html(items.join(''));
        },
        error: function(){
            var items = [];
            items.push('<h2 class="text-center">There is no data from the DataBase.</h2>');
            $('#tralari').html(items.join(''));
        }
    });
}

//Clean modal form if Cancel is clicked
function cleanModalInputs(){
    var clean = "";
    $('#dni').val(clean);
    $('#name').val(clean);
    $('#surname').val(clean);
    $('#address').val(clean);
    $('#city').val(clean);
    $('#country').val(clean);
    $('#phone').val(clean);
    $('#mail').val(clean);
}



// Check all Fields are completed (in progress)
function checkAllFieldsInserted(){
    createClient();
    // console.log($("#AddModal:input").val());
    // var empty = "";
    // if ($("#AddModal :input") !== "" && $("#AddModal :input").val() === 0){
    //     createClient();
    // } else {
    //     $.notify("You must complete all fields to Add the Client!","warn");
    // }
}


// Create Client, clean form, and hide modal
function createClient(){
    var item = {
        "dni": $('#dni').val(), 
        "name": $('#name').val(), 
        "surname": $('#surname').val(), 
        "address": $('#address').val(),
        "city": $('#city').val(), 
        "country": $('#country').val(),
        "phone": $('#phone').val(), 
        "mail": $('#mail').val()
    };
    
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/client',
        type: 'POST',
        data: item,
        success: function(result){
            getBasicData();
            var clean = "";
            $('#dni').val(clean);
            $('#name').val(clean);
            $('#surname').val(clean);
            $('#address').val(clean);
            $('#city').val(clean);
            $('#country').val(clean);
            $('#phone').val(clean);
            $('#mail').val(clean);
            $.notify("Client added", "success");
            $('#AddModal').modal('hide');
        },
        error : function(){
            $.notify("Sorry, but something went wrong. Please try again.", "error");
        }
    });
}


// Comprovation if user wants to delete Client
function sureAboutDelete(){
    console.log(this.value);
    
}

// Delete Client
function deleteClient(sid){
    
    $('#DelModal').modal('show');
    
    
    $.ajax({
    url: 'https://tfg-sergi-daw-neosmith.c9users.io/client/'+sid,
    type: 'DELETE',
    // async : false,
    // beforeSend: function(xhr, opts){
    //     if ($('#delYes').click()){
    //         return true;
    //         console.log("delYes click");
    //     } else {
    //         console.log("delYes else");
    //         xhr.abort();
    //         $('#DelModal').modal('hide');
    //     }
    // },
    success: function(result){
        $.notify("Client Deleted","warn");
        getBasicData();
        $('#DelModal').modal('hide');
    },
    error: function(){
        $.notify("Sorry, but something went wrong. Please try again.", "error");
    }
    });
    
    
}



// // Getting basic information from the project
// function getBasicData(){
//     $.ajax({
//         url: 'https://tfg-sergi-daw-neosmith.c9users.io/clients',
//         type: 'GET',
//         success: function(result){
//             var items = [];
//             items.push('<ul>');
//             $.each(result, function(key, value){
//                 items.push('<li><h4>'+value.id+'</h4></li>'); 
//                 items.push('<ul>');
//                 $.each(value, function(field, val){
//                     items.push('<li>'+field+':'+val+'</li>');    
//                 });
//                 items.push('</ul>');
//             });
//             items.push('</ul>');
//             $('#tralari').html(items.join(''));
//         }
//     });
// }


// //Show add form for client
// function showAddForm(){
//     if($('#formAdd').is(":visible")){
//         $('#formAdd').hide(1000);
//     }else{
//         $('#formAdd').show(1000);
//     }
// }

