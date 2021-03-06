<!-- FOOTER -->
</section>
<footer>
  <section id="main-footer" class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div>
            <h4>Manga Man</h4>
            <p>Copyright &copy; 2018</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/checkout.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
paypal.Button.render({

  env: 'sandbox', // sandbox | production

  // PayPal Client IDs - replace with your own
  // Create a PayPal app: https://developer.paypal.com/developer/applications/create
  client: {
    sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
    production: '<insert production client id>'
  },

  // Show the buyer a 'Pay Now' button in the checkout flow
  commit: true,

  // payment() is called when the button is clicked
  payment: function(data, actions) {

    // Make a call to the REST api to create the payment
    return actions.payment.create({
      payment: {
        transactions: [
          {
            amount: { total: '0.01', currency: 'USD' }
          }
        ]
      }
    });
  },

  // onAuthorize() is called when the buyer approves the payment
  onAuthorize: function(data, actions) {

    // Make a call to the REST api to execute the payment
    return actions.payment.execute().then(function() {
      window.alert('Payment Complete!');
    });
  }

}, '#paypal-button-container');

</script>
</body>
</html>
