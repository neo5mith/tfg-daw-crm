/* global $*/


//When window loaded, execute that function
window.onload = getBasicData();


//Get all the Orders, and put them into a table
function getBasicData(){
    console.log("Entrem a getBasicData");
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/orders',
        type: 'GET',
        success: function(result){
            console.log("Dins de getBasicData, success");
            
            var items = [];
            
            items.push('<table class="table table-bordered"><tr><th class="text-center">Order Id</th><th class="text-center">Buy Date</th><th class="text-center">Total Price</th><th class="text-center">Status</th><th class="text-center">Details</th><th class="text-center">Update Status</th></tr>');
            
            $.each(result, function(key, value){
                items.push('<tr>'); 
                items.push('<td class="text-center">'+value.id+'</td>');
                items.push('<td class="text-center">'+value.buyDate+'</td>');
                items.push('<td class="text-center">'+value.totalPrice+'</td>');
                items.push('<td class="text-center">'+value.status+'</td>');
                items.push('<td class="text-center"><a type="button" class="btn btn-primary" data-detail-client="'+value.id+'">View Details</a></td>');
                items.push('<td class="text-center"><a type="button" class="btn btn-primary" data-update-client="'+value.id+'">Update Status</a></td>');
                items.push('</tr>');
            });
            
            items.push('</table>');
            
            $('#ordersTable').html(items.join(''));
            
        },
        error: function(xhr, ajaxOptions, thrownError){
            console.log("getBasicData, error");
            // console.log(xhr.status);
            // console.log(thrownError);
            var items = [];
            items.push('<h2 class="text-center">There is no data from the DataBase.</h2>');
            $('#ordersTable').html(items.join(''));
        }
    });
}


// Check all Fields for ADD are completed (in progress______________________________)
function checkAllFieldsInserted(){
    createOrder();
    // console.log($("#AddModal:input").val());
    // var empty = "";
    // if ($("#AddModal :input") !== "" && $("#AddModal :input").val() === 0){
    //     createClient();
    // } else {
    //     $.notify("You must complete all fields to Add the Client!","warn");
    // }
}


// Create an Order
function createOrder(){
    
    var products = [];
    
    var totalPrice = 0;
    
    $('tr').each(function() {
      
        $(this).find('td:first').each (function() {
            var value = $(this).html();
            console.log(value);
            products.push(value);
        });
        
        // Agafar el td numero 6 per anar calculant el preuTotal
        $(this).find('td:nth-child(6)').each (function () {
            var linePrice = parseFloat($(this).html());
            totalPrice = linePrice + totalPrice;
        });
    
    });
    
    console.log("Dni: "+$('#dni').val());
    
    var dni = $('#dni').val();
    
    var item = {
        "dni": dni,
        "totalPrice" : totalPrice,
        "products" : products
    };
    
    // I need to send: $totalPrice, $clientDni, $products
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/order',
        type: 'POST',
        data: item,
        success: function(result){
            var clean = "";
            //$('#dni').val(clean);
            $('#name').val(clean);
            $('#surname').val(clean);
            $('#address').val(clean);
            $('#city').val(clean);
            $('#country').val(clean);
            $('#phone').val(clean);
            $('#mail').val(clean);
            $.notify("Order added", "success");
            getBasicData();
            $('#CreateOrder').modal('hide');
        },
        error : function(){
            $.notify("Sorry, but something went wrong. Please try again.", "error");
        }
    });
}

//Clean modal form if Cancel is clicked
function cleanModalInputs(){
    var clean = "";
    $('*').val(clean);
    $("#clientInfo").remove();
    $(".prodTable").remove();
    $( '<div id="clientInfo"></div>' ).insertAfter( "#buttonLoadDniData" );
    $('.formDniLoad').show();
}


//Autocomplete for Dni input
$(document).ready(function () {
    var options = { url: "/clientsdni",
        getValue: "dni",
        list: {
            match: { enabled: true  }
        },
    //     template: {
    // 		type: "description",
    // 		fields: {
    // 			description: "surname"
    // 		}
	   // },
        theme: "square" };
    $("#dni").easyAutocomplete(options);
});


// Load info of the Client DNI taken from autocomplete
function getClientDetails(){

    var dni = $("#dni").val();

    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/clientDetByDni/'+dni,
        type: 'GET',
        success: function(result){
            
            $( '<div class="form-group" id="clientInfo"></div>' ).insertAfter( "#buttonLoadDniData" );
            
            var items = [];
            items.push('<input type="text" value="'+result.id+'" hidden></input>');
            items.push('<label class="dniFunction">Name:</label></br><input class="form-control dniFunction"type="text" value="'+result.name+'" readonly></input></br>');
            items.push('<label class="dniFunction">Surname:</label></br><input class="form-control dniFunction" type="text" value="'+result.surname+'" readonly></input></br>');
            items.push('<label class="dniFunction">Address:</label></br><input class="form-control dniFunction" type="text" value="'+result.address+'" readonly></input></br>');
            items.push('<label class="dniFunction">City:</label></br><input class="form-control dniFunction" type="text" value="'+result.city+'" readonly></input></br>');
            items.push('<label class="dniFunction">Country:</label></br><input class="form-control dniFunction" type="text" value="'+result.country+'" readonly></input></br>');
            items.push('<label class="dniFunction">Phone:</label></br><input class="form-control dniFunction" type="text" value="'+result.phone+'" readonly></input></br>');
            items.push('<label class="dniFunction">Mail:</label></br><input class="form-control dniFunction" type="text" value="'+result.mail+'" readonly></input></br>');
            items.push('</div></br>');
            
            $('#clientInfo').html(items.join(''));
            $('.formDniLoad').hide();
            $.notify("Client information loaded", "success");
        }
        ,
        error: function(xhr,status,error) {
            console.log("Error at AJAX request");
            console.log("xhr: "+xhr);
            console.log("Status: "+status);
            console.log("Message: "+ error);
            $.notify("Load of Client Failed, please try again", "error");
        }
    });
}


//Autocomplete for Ref input
$(document).ready(function () {
    var options = { url: "/productsref",
        
        getValue: "ref",
        list: {
            match: { enabled: true  }
        },
        template: {
    		type: "description",
    		fields: {
    		    description: "brandModel"
    		}
    	},
	    theme: "square" };
    $("#ref").easyAutocomplete(options);
});


// Load info of the Product Ref taken from autocomplete and put it into the table of products
function getProductDetails(){

    var ref = $("#ref").val();
    var uni = $("#units").val();

    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/productDetByRef/'+ref,
        type: 'GET',
        success: function(result){
            
            var stock = result.stock;
            var price = parseFloat(result.price);
            var units = parseFloat(uni);
            
            // Check if the Product is already in the table
            // if (productAlreadyAtOrder(ref)){
                // Check if stock is not 0 or less
                if (stock <= 0){
                    $.notify("Sorry but this Product is currently out of Stock, ask for a reservation.",{autoHide:false}, "error");
                } else{
                    // Check if the units asked, can be supplied by the actual stock
                    if (stock - units < 0){
                        $.notify("Sorry but we just have "+stock+" units on Stock, not "+units+".",{autoHide:false}, "error");
                    } else {
                        var items = [];
                        items.push('<tr class="prodTable">'); 
                        items.push('<td class="text-center">'+result.id+'</td>');
                        items.push('<td class="text-center">'+result.brand+'</td>');
                        items.push('<td class="text-center">'+result.model+'</td>');
                        items.push('<td class="text-center">'+units+'</td>');
                        items.push('<td class="text-center">'+price+'</td>');
                        items.push('<td class="text-center">'+(price*units)+'</td>');
                        items.push('</tr>');
                        
                        $(items.join('')).insertAfter("#headerTableProducts");
                        
                        $.notify("Product added to the Order", "success");
                    }
                }
            // } else {
            //     $.notify("Sorry but you already have this Item into your Order.",{autoHide:false}, "error");
            // }
            
            $("#ref").val("");
            $("#units").val("1");
            
        }
        ,
        error: function(xhr,status,error) {
            console.log("Error at AJAX request");
            console.log("xhr: "+xhr);
            console.log("Status: "+status);
            console.log("Message: "+ error);
            $.notify("Load of Product Failed, please try again", "error");
        }
    });
}


// var arrIdProducts = [];

// // Function to check that an Order don't take 2 times the same product, it has to be put 
// function productAlreadyAtOrder($prodId){
//     console.log("Entra a productAlreadyAtOrder");
//     console.log("La id es: "+$prodId);
//     var id = $prodId;
//     $.each(arrIdProducts, function( index, value ) {
//         console.log("Entra al each");
//         console.log("Id: "+id);
//         console.log("value: "+value);
//         if (id === value){
//             return true;
//         } else {
//             arrIdProducts.push(id);
//             return false;
//         }
// });
// }