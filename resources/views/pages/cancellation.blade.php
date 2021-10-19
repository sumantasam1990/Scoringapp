@include('layouts.header', ['title' => $title])

<div class="container mt-6">
    <div class="row">
        <div class="col-12">
            <h1 class="display-4 fw-bold">Cancellation Policy</h1>

            <h4 class="mt-4 mb-4">Last updated: October 16, 2021</h4>

            <p class="fs-4 mt-4">
                We want satisfied customers. That's why we send invoices when your account is due for renewal, depending on which of the 3 pricing plans you chose.

            </p>

            <p class="fs-4 mt-2">
                Our legal responsibility is to account owners, which means we cannot cancel an account at the request of anyone else. If for whatever reason you no longer know who the account owner is, <a class="text-decoration-underline text-dark" href="">contact us</a>. We will gladly reach out to any current account owners at the email addresses we have on file.
            </p>

            <h4 class="mt-4 fw-bold fs-3">
                What happens when you cancel?
            </h4>
            <p class="fs-4 mt-4">
                You won’t be able to access your account once you cancel, so make sure you download everything you want to keep beforehand.

                We’ll permanently delete your account data within 30 days from our servers and logs, and within 60 days from our backups. Retrieving data for a single account from a backup isn’t possible, so if you change your mind you’ll need to do it within the first 30 days. Data can’t be recovered once it has been permanently deleted.

                We won’t bill you again once you cancel. We don’t automatically prorate any unused time you may have left but if you haven’t used your account in months or just started a new billing cycle, contact us for a fair refund. We’ll treat you right.

                ​
            </p>

            <h4 class="mt-4 fs-3 fw-bold">
                Scorng-initiated cancellations
            </h4>
            <p class="mt-4 fs-4">
                We will cancel accounts if a user has not paid for a plan in the following situations:
            <ul class="fs-4">
                <li>For trial accounts: 24 hours after free 7-day trial ends.</li>
                <li>For renewal accounts: 7 days after the last day of your previous billing period.</li>
            </ul>

            <span class="fs-4">We also retain the right to suspend or terminate accounts for any reason at any time, as outlined in our Terms of Service.</span>

            </p>




        </div>
    </div>
</div>






@include('layouts.footer')
