/* global $*/


//When window loaded, execute that function
window.onload = getLastClients();
window.onload = getLastProducts();
window.onload = getProductsWarnStock();


// Get 10 last Clients
function getLastClients(){
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/dashboard/lastClients',
        type: 'GET',
        success: function(result){
            var items = [];
            items.push('<table class="table table-bordered"><tr><th class="text-center">DNI</th><th class="text-center">Name</th><th class="text-center">Surname</th></tr>');
            $.each(result, function(key, value){
                items.push('<tr>'); 
                items.push('<td class="text-center">'+value.dni+'</td>');
                items.push('<td class="text-center">'+value.name+'</td>');
                items.push('<td class="text-center">'+value.surname+'</td>');
                items.push('</tr>');
            });
            items.push('</table>');
            $('#lastClients').html(items.join(''));
        },
        error: function(){
            var items = [];
            items.push('<h2 class="text-center">There are no clients yet or there is an error with the DB right now.</h2>');
            $('#lastClients').html(items.join(''));
        }
    });
}

// Get 10 last Products
function getLastProducts(){
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/dashboard/lastProducts',
        type: 'GET',
        success: function(result){
            var items = [];
            items.push('<table class="table table-bordered"><thead><tr><th class="text-center">Ref</th><th class="text-center">Brand</th><th class="text-center">Model</th><th class="text-center">Stock</th><th class="text-center">Price</th></tr></thead><tbody>');
            $.each(result, function(key, value){
                items.push('<tr>'); 
                items.push('<td class="text-center">'+value.ref+'</td>');
                items.push('<td class="text-center">'+value.brand+'</td>');
                items.push('<td class="text-center">'+value.model+'</td>');
                items.push('<td class="text-center">'+value.stock+'</td>');
                items.push('<td class="text-center">'+value.price+'</td>');
                items.push('</tr>');
            });
            items.push('</tbody></table>');
            $('#lastProducts').html(items.join(''));
        },
        error: function(){
            var items = [];
            items.push('<h2 class="text-center">There are no products yet or there is an error with the DB right now.</h2>');
            $('#lastProducts').html(items.join(''));
        }
    });
}

// Get 10 last Products
function getProductsWarnStock(){
    $.ajax({
        url: 'https://tfg-sergi-daw-neosmith.c9users.io/dashboard/StockWarning',
        type: 'GET',
        success: function(result){
            var items = [];
            items.push('<table class="table table-bordered"><tr><th class="text-center">Ref</th><th class="text-center">Brand</th><th class="text-center">Model</th><th class="text-center">Stock</th><th class="text-center">Price</th></tr>');
            $.each(result, function(key, value){
                items.push('<tr>'); 
                items.push('<td class="text-center">'+value.ref+'</td>');
                items.push('<td class="text-center">'+value.brand+'</td>');
                items.push('<td class="text-center">'+value.model+'</td>');
                items.push('<td class="text-center">'+value.stock+'</td>');
                items.push('<td class="text-center">'+value.price+'</td>');
                items.push('</tr>');
            });
            items.push('</table>');
            $('#stockWarning').html(items.join(''));
        },
        error: function(){
            var items = [];
            items.push('<h2 class="text-center">There are no Products under 50 units or there is an error with the DB right now.</h2>');
            $('#stockWarning').html(items.join(''));
        }
    });
}