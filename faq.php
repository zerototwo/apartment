<?php include('header.php'); ?>

<main>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2ff; /* Light blue-gray background */
        }
        header {
            display: flex;
            align-items: center;
            background: #f9f9ff;
            border-bottom: 2px solid #ddd;
            padding: 10px 20px;
        }
        header img {
            height: 60px;
            margin-right: 20px;
        }
        header h1 {
            margin: 0;
            font-size: 2em;
            color: #333;
        }
        main {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        section h2 {
            font-size: 1.6em;
            color: #333;
            margin-bottom: 15px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        .faq-section {
            margin-bottom: 20px;
        }
        .faq-section h3 {
            font-size: 1.4em;
            color: #333;
            margin-bottom: 10px;
        }
        .faq-section p {
            margin: 5px 0;
        }
        .faq-question {
            font-weight: bold;
            margin-bottom: 5px;
        }
    </style>

    <header>
        <img src="pics/logo.png" alt="Company Logo">
        <h1>Frequently Asked Questions</h1>
    </header>

    <div class="content-section">
        <h2>Frequently Asked Questions</h2>

        <div class="faq-section">
            <h3>1. Rental process</h3>
            <div class="faq-question">Q: How do I search for a listing?</div>
            <div class="faq-answer">A: You can search through our website or APP, using keywords (such as region, price, house type, etc.), and the system will recommend eligible listings for you.</div>
            <div class="faq-question">Q: Do I need to make an appointment to see a property?</div>
            <div class="faq-answer">A: Yes, in order to ensure your viewing experience, please make an appointment in advance through our platform or by contacting the host.</div>
            <div class="faq-question">Q: How do I book a space?</div>
            <div class="faq-answer">A: Once you've found a place you want, you can book offline by paying your reservation online or contacting your host.</div>
            <div class="faq-question">Q: What do I need to pay attention to when signing a contract?</div>
            <div class="faq-answer">A: Before signing the contract, please read the terms of the contract carefully and confirm the key information such as the lease term, rent, deposit, maintenance responsibilities and so on. If you have any questions, please consult our legal counsel or professional customer service.</div>
        </div>

        <div class="faq-section">
            <h3>2. The condition of the house</h3>
            <div class="faq-question">Q: Is the listing genuine?</div>
            <div class="faq-answer">A: We rigorously review our listings to ensure authenticity. However, it is advisable to double-check when you view the property.</div>
            <div class="faq-question">Q: Is the house fully equipped?</div>
            <div class="faq-answer">A: The amenities are listed in the listing details, so you can choose according to your needs. If you have special requests, please communicate with the host at the time of booking.</div>
            <div class="faq-question">Q: How hygienic and safe is the house?</div>
            <div class="faq-answer">A: We ask landlords to clean and maintain their homes regularly to ensure that the living environment is hygienic. At the same time, the property needs to meet local safety standards.</div>
        </div>

        <div class="faq-section">
            <h3>3. Lease Terms</h3>
            <div class="faq-question">Q: How is the rent and deposit paid?</div>
            <div class="faq-answer">A: Rent and deposit payments can be made online through our platform or offline in consultation with the landlord. The method and time of payment must be specified in the contract.</div>
            <div class="faq-question">Q: What is the lease term?</div>
            <div class="faq-answer">A: The lease term can be negotiated with the landlord according to your needs, and generally ranges from six months to one year.</div>
            <div class="faq-question">Q: What should I do if I quit early?</div>
            <div class="faq-answer">A: If you need to quit early, talk to your landlord in advance and negotiate a solution. Depending on the terms of the contract, you may be liable for liquidated damages.</div>
        </div>

        <div class="faq-section">
            <h3>4. Service Support</h3>
            <div class="faq-question">Q: What should I do if I have a problem with my home?</div>
            <div class="faq-answer">A: In case of damage to housing facilities and other problems, please report for repair through our platform or contact the landlord in time. We will urge the landlord to resolve the issue as soon as possible.</div>
            <div class="faq-question">Q: How do I contact customer service?</div>
            <div class="faq-answer">A: You can contact us through the online customer service function on our website or APP, telephone, email, etc. Our customer service team will be available around the clock.</div>
            <div class="faq-question">Q: How to file a complaint and defend your rights?</div>
            <div class="faq-answer">A: In the event of a landlord's breach of contract or service quality problems, you can complain and defend your rights through our complaint channels. We will investigate and deal with it in accordance with relevant regulations.</div>
        </div>
    </div>
</main>

<?php include('footer.php'); ?>