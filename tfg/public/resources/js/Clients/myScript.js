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
            items.push('<table class="table table-bordered"><tr><th class="text-center">DNI</th><th class="text-center">Name</th><th class="text-center">Surname</th><th class="text-center">Details</th><th class="text-center">Update Details</th><th class="text-center">Delete</th></tr>');
            $.each(result, function(key, value){
                items.push('<tr>'); 
                items.push('<td class="text-center">'+value.dni+'</td>');
                items.push('<td class="text-center">'+value.name+'</td>');
                items.push('<td class="text-center">'+value.surname+'</td>');
                items.push('<td class="text-center"><a type="button" class="btn btn-primary" data-detail-client="'+value.id+'">View Details</a></td>');
                items.push('<td class="text-center"><a type="button" class="btn btn-primary" data-update-client="'+value.id+'">Update Details</a></td>');
                items.push('<td class="text-center"><a type="button" class="btn btn-danger" data-delete-client="'+value.id+'">Delete Client</a></td>');
                items.push('</tr>');
            });
            items.push('</table>');
            $('#clientsTable').html(items.join(''));
        },
        error: function(){
            var items = [];
            items.push('<h2 class="text-center">There is no data from the DataBase.</h2>');
            $('#clientsTable').html(items.join(''));
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


// Check all Fields for ADD are completed (in progress______________________________)
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
$(document).on("click", "[data-delete-client]", function(evt) {
    
    evt.preventDefault();
  
    // 1. retrieve client ID
    var id = $(this).data("delete-client");
  
    $('#delYes').data('deleteSure-client',id);
  
    $('#DelModal').modal('show');

});


$(document).on("click", "[data-deleteSure-client]", function(evt) {
    var id = $(this).data("deleteSure-client");
    
    deleteClient(id);
});


// Delete Client
function deleteClient(sid){
    $.ajax({
    url: 'https://tfg-sergi-daw-neosmith.c9users.io/client/'+sid,
    type: 'DELETE',
    success: function(result){
        $('#DelModal').modal('hide');
        $.notify("Client Deleted","warn");
        getBasicData();
    },
    error: function(){
        $.notify("Sorry, but something went wrong. Please try again.", "error");
    }
    });
}

//When update buton clicked, take the id of the client and show modal of update, call the func to get details
$(document).on("click", "[data-update-client]", function(evt) {
    evt.preventDefault();

    var id = $(this).data("update-client");
    $('#UpdateModal').modal('show');

    getClientDetailsEdit(id);
});

// Get Details of the Client and insert them into the modal of update client
function getClientDetailsEdit(sid){

    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/clientDet/'+sid,
        type: 'GET',
        success: function(result){
            $("#uid").val(result.id);
            $("#udni").val(result.dni);
            $("#uname").val(result.name);
            $("#usurname").val(result.surname);
            $("#uaddress").val(result.address);
            $("#ucity").val(result.city);
            $("#ucountry").val(result.country);
            $("#uphone").val(result.phone);
            $("#umail").val(result.mail);
        },
        error: function(){

        }
    });
}


// Once updates are done and nothing is left behind, update client (PROGRES *******************************)
function checkAllFieldsInsertedUpd(){
    updateClient();
    // console.log($("#UpdateModal:input").val());
    // var empty = "";
    // if ($("#UpdateModal :input") !== "" && $("#UpdateModal :input").val() === 0){
    //     updateClient();
    // } else {
    //     $.notify("You must complete all fields to Update the Client!","warn");
    // }
}


// Update Client
function updateClient(){
    var item = {
        "id": $('#uid').val(),
        "dni": $('#udni').val(), 
        "name": $('#uname').val(), 
        "surname": $('#usurname').val(), 
        "address": $('#uaddress').val(),
        "city": $('#ucity').val(), 
        "country": $('#ucountry').val(),
        "phone": $('#uphone').val(), 
        "mail": $('#umail').val()
    };
    
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/clientUpdate',
        type: 'PUT',
        data: item,
        success: function(result){
            $('#UpdateModal').modal('hide');
            getBasicData();
            $.notify("Client Updated", "success");
        },
        error : function(){
            $.notify("Sorry, but something went wrong. Please try again.", "error");
        }
    });
}


//When detail is click take the id from it's called, show the modal, and call the method to fill the info
$(document).on("click", "[data-detail-client]", function(evt) {
    evt.preventDefault();

    var id = $(this).data("detail-client");
    
    $('#InfoModal').modal('show');

    getClientDetails(id);
});

// Get Details of the Client and insert them into the modal of info client
function getClientDetails(sid){

    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/clientDet/'+sid,
        type: 'GET',
        success: function(result){
            $("#iid").val(result.id);
            $("#idni").val(result.dni);
            $("#iname").val(result.name);
            $("#isurname").val(result.surname);
            $("#iaddress").val(result.address);
            $("#icity").val(result.city);
            $("#icountry").val(result.country);
            $("#iphone").val(result.phone);
            $("#imail").val(result.mail);
        },
        error: function(){
            
        }
    });
}


//Autocomplete Country Input with a JSON
$(document).ready(function () {
    var options = { url: "/resources/js/Clients/countries.js",
        getValue: "name",
        list: {
            match: { enabled: true  }
        },
        theme: "square" };
    $("#country").easyAutocomplete(options);
    $("#ucountry").easyAutocomplete(options);
});