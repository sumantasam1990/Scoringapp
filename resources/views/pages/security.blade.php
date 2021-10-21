@include('layouts.header', ['title' => $title])

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="display-4 fw-bold">Security Overview</h1>

            <h4 class="mt-4 fw-bold fs-3">
                We protect your data.
            </h4>
            <p class="fs-4 mt-4">
                All data are written to multiple disks instantly, backed up daily, and stored in multiple locations. Files that our customers upload are stored on servers that use modern techniques to remove bottlenecks and points of failure.

                ​

            </p>

            <h4 class="mt-4 fs-3 fw-bold">
                Your data are sent using HTTPS.
            </h4>
            <p class="mt-4 fs-4">
                Whenever your data are in transit between you and us, everything is encrypted, and sent using HTTPS. Within our firewalled private networks, data may be transferred unencrypted.

                Any files which you upload to us are stored and are encrypted at rest. Our application databases are generally not encrypted at rest — the information you add to the applications is active in our databases and subject to the same protection and monitoring as the rest of our systems. Our database backups are encrypted using GPG.

                ​

                ​

            </p>

            <h4 class="fs-3 fw-bold mt-4">
                Full redundancy for all major systems.
            </h4>
            <p class="mt-4 fs-4">
                Our servers — from power supplies to the internet connection to the air purifying systems — operate at full redundancy. Our systems are engineered to stay up even if multiple servers fail.
            </p>

            <h4 class="fs-3 fw-bold mt-4">
                Sophisticated physical security.
            </h4>
            <p class="mt-4 fs-4">
                Our state-of-the-art servers are protected by biometric locks and round-the-clock interior and exterior surveillance monitoring. Only authorized personnel have access to the data center. 24/7/365 onsite staff provides additional protection against unauthorized entry and security breaches.
            </p>

            <h4 class="fs-3 fw-bold mt-4">
                Regularly-updated infrastructure.
            </h4>
            <p class="mt-4 fs-4">
                Our software infrastructure is updated regularly with the latest security patches. Our products run on a dedicated network which is locked down with firewalls and carefully monitored. While perfect security is a moving target, we work with security researchers to keep up with the state-of-the-art in web security.

                ​

                ​
            </p>

            <h4 class="fs-3 fw-bold mt-4">
                We protect your billing information.
            </h4>
            <p class="mt-4 fs-4">
                All credit card transactions are processed using secure encryption—the same level of encryption used by leading banks. Card information is transmitted, stored, and processed securely on a <a class="text-decoration-underline text-dark" href="https://en.wikipedia.org/wiki/Payment_Card_Industry_Data_Security_Standard">PCI-Compliant network</a>.
            </p>

            <h4 class="fs-3 fw-bold mt-4">
                Constant monitoring
            </h4>
            <p class="mt-4 fs-4">
                We have a team dedicated to maintaining your account’s security on our systems and monitoring tools we’ve set up to alert us to any nefarious activity against our domains. To date, we’ve never had a data breach.<br>

                We also audit internal data access. If a Scorng employee wrongly accesses customer data, they will face penalties ranging from termination to prosecution. Again, to our knowledge, this hasn’t happened.<br>

                We have processes and defenses in place to keep our streak of 0 data breaches going. But in the unfortunate circumstances someone malicious does successfully mount an attack, we will immediately notify all affected customers.
            </p>

            <h4 class="fs-3 fw-bold mt-4">
                Have a concern? Need to report an incident?
            </h4>
            <p class="mt-4 fs-4">Have you noticed abuse, misuse, an exploit, or experienced an incident with your account? Please visit our security response page for details on how to securely submit a report.</p>




        </div>
    </div>
</div>






@include('layouts.footer')