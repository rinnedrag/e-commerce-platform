<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Accept a card payment</title>
    <meta name="description" content="A demo of a card payment on Stripe" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/css/home/main_page/fontawesome-all.min.css">
    <link rel="stylesheet" href="/css/payment_client.css" />
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<div class="container" style="margin-top: 200px">
    <div class="row">
        <!-- Display a payment form -->
        <input type="text" id="email" placeholder="Email адрес" />
        <div id="total" class="col-12" style="margin-bottom: 10px">
            <span>Сумма к оплате: </span><a>{{$order->total}} <i class="fas fa-ruble-sign"></i></a>
        </div>

        <form id="payment-form" class="col-12">
            <div id="card-element"><!--Stripe.js injects the Card Element--></div>
            <button id="submit">
                <div class="spinner hidden" id="spinner"></div>
                <span id="button-text">Оплатить</span>
            </button>
            <p id="card-errors" role="alert"></p>
            <p class="result-message hidden">
                Оплата прошла успешно.
                <a href="" target="_blank">Stripe dashboard.</a>
            </p>
        </form>
    </div>
</div>
<script src="/js/home/main_page/jquery-3.2.1.min.js"></script>
<script type="text/javascript" defer>
    // A reference to Stripe.js initialized with your real test publishable API key.
    let stripe = Stripe("pk_test_k7QFVsfe3tXrg3VNhu4Dla6900kppUHCSa");
    // The items the customer wants to buy
    let purchase = {
        items: [{ id: {{$order->id}} }]
    };
    let url = '';
    // Disable the button until we have Stripe set up on the page
    document.querySelector("button").disabled = true;
    fetch(url+"/pay", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(purchase)
    })
        .then(function(result) {
            return result.json();
        })
        .then(function(data) {
            let elements = stripe.elements();
            let style = {
                base: {
                    color: "#32325d",
                    fontFamily: 'Arial, sans-serif',
                    fontSmoothing: "antialiased",
                    fontSize: "16px",
                    "::placeholder": {
                        color: "#32325d"
                    }
                },
                invalid: {
                    fontFamily: 'Arial, sans-serif',
                    color: "#fa755a",
                    iconColor: "#fa755a"
                }
            };

            let card = elements.create("card", { style: style, hidePostalCode: true});
            // Stripe injects an iframe into the DOM
            card.mount("#card-element");
            card.on("change", function (event) {
                // Disable the Pay button if there are no card details in the Element
                document.querySelector("button").disabled = event.empty;
                document.querySelector("#card-errors").textContent = event.error ? event.error.message : "";
            });

            let form = document.getElementById("payment-form");
            form.addEventListener("submit", function(event) {
                event.preventDefault();
                // Complete payment when the submit button is clicked
                payWithCard(stripe, card, data.clientSecret);

            });

        });

    // Calls stripe.confirmCardPayment
    // If the card requires authentication Stripe shows a pop-up modal to
    // prompt the user to enter authentication details without leaving your page.
    let payWithCard = function(stripe, card, clientSecret) {
        loading(true);
        stripe
            .confirmCardPayment(clientSecret, {
                receipt_email: document.getElementById('email').value,
                payment_method: {
                    card: card
                }
            })
            .then(function(result) {
                if (result.error) {
                    // Show error to your customer
                    showError(result.error.message);
                } else {
                    // The payment succeeded!
                    fetch(url+"/orders/pay/{{$order->id}}", {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({stripe_payment_id: result.paymentIntent.id})
                    })
                        .then(function(result) {
                            return result.json();
                        })
                        .then(function () {
                            orderComplete(result.paymentIntent.id);
                            window.location = url + '/catalog'
                        })


                }
            });
    };

    /* ------- UI helpers ------- */

    // Shows a success message when the payment is complete

    let orderComplete = function(paymentIntentId) {
        loading(false);
        document
            .querySelector(".result-message a")
            .setAttribute(
                "href",
                "https://dashboard.stripe.com/test/payments/" + paymentIntentId
            );
        document.querySelector(".result-message").classList.remove("hidden");
        document.querySelector("button").disabled = true;
    };

    // Show the customer the error from Stripe if their card fails to charge
    let showError = function(errorMsgText) {
        loading(false);
        let errorMsg = document.querySelector("#card-errors");
        errorMsg.textContent = errorMsgText;
        setTimeout(function() {
            errorMsg.textContent = "";
        }, 4000);

    };

    // Show a spinner on payment submission
    let loading = function(isLoading) {
        if (isLoading) {
            // Disable the button and show a spinner
            document.querySelector("button").disabled = true;
            document.querySelector("#spinner").classList.remove("hidden");
            document.querySelector("#button-text").classList.add("hidden");
        } else {
            document.querySelector("button").disabled = false;
            document.querySelector("#spinner").classList.add("hidden");
            document.querySelector("#button-text").classList.remove("hidden");
        }

    };

</script>
</body>
</html>
