const locationCheckout = window.location.pathname === '/checkout'

if (locationCheckout) {

    // Getting the total
    const host = window.location.host;
    let total
    $.ajax({
        type: "GET",
        url: `http://${host}/gettotal/`,
    
        dataType: "json",
        success: function (response) {
          total = parseFloat(response);
          console.log(total);
        }
    })
    
    // Render the PayPal button into #paypal-button-container
    
    paypal.Buttons({
    
        // Set up the transaction
        
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total
                    }
                }]
            });
        },
    
        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
<<<<<<< HEAD
                
                // Show a success message to the buyer
=======

                $.ajax({
                    type: "GET",
                    url: `http://${host}/orders/`,
                
                    dataType: "json",
                    success: function (response) {
                      if (response) {
                          // Show a success message to the buyer
>>>>>>> c82ff8deea59469c0ee5f4bdd53ef8fa3f1ec23f
                Swal.fire(
                    'Thank you!',
                    'Your order has been sent! You will be redirected!',
                    'success'
                  )
<<<<<<< HEAD
                  
                  
                  setTimeout(() => {
                      window.location.replace(`http://${host}/remove-cart/`);
                  }, 2500)
=======
                  setTimeout(() => {
                      window.location.replace(`http://${host}/remove-cart/`);
                  }, 2500)
                      }
                    }
                })
>>>>>>> c82ff8deea59469c0ee5f4bdd53ef8fa3f1ec23f

            });
        }
    
    
    }).render('#paypal-button-container');
}
