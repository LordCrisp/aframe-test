let cart = {
    // Doesn't even almost work ;(
    /*htmlCart: document.getElementById('cart');
    htmlCart.onclick.list;


    list: function() {

        // Set the data to send via Ajax
        let data = {};
        data.mode = "list";

        ajax.request('/incl/cart.php', "POST", data, function(abc) {
            new Toast(abc, {position: "left", timeout: 456879312312})
        });
    }*/

    // Ajax call PHP file to insert product into cart
    insert: function(form, event) {
        // Stops the form from redirecting to it's action
        event.preventDefault();
        // Set the data to send via Ajax
        let data = {};
        data.product_id = form.querySelector("input[name=product_id]").value;
        data.quantity = form.querySelector("input[name=quantity]").value;
        data.mode = "insert";

        ajax.request('/cart.php', "POST", data, function(abc) {
            new Toast(abc, {position: "left", timeout: 3500})
        });
    }
};