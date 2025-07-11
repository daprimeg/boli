<button id="stripe-checkout-button" class="btn btn-primary">Pay with Stripe</button>

<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stripe = Stripe('{{ config('services.stripe.publishable') }}');
        const checkoutButton = document.getElementById('stripe-checkout-button');

        if (checkoutButton) {
            checkoutButton.addEventListener('click', function() {
                fetch('/stripe/create-checkout-session', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        plan_id: '{{ $plan->plan_id }}', // Pass the plan ID
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.url) {
                        window.location.href = data.url;
                        // Redirect to Stripe Checkout
                    } else if (data.error) {
                        console.error('Stripe Checkout Error:', data.error);
                        // Display the error to the user
                    }
                });
            });
        }
    });
</script>