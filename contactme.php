<?php include('header.php'); ?>

<main>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2ff;
            /* Light blue-gray background */
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

        .faq details summary {
            font-weight: bold;
            padding: 10px;
            background: #e6e6ff;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 5px;
        }

        .contact-form label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .contact-form input,
        .contact-form textarea,
        .contact-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .contact-form button {
            background-color: #6c63ff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #5753d4;
        }
    </style>

    <header>
        <img src="pics/logo.png" alt="Company Logo">
        <h1>Help & Contact</h1>
    </header>

    <section>
        <h2>FAQs for Individuals</h2>
        <div class="faq">
            <details>
                <summary>How to manage my emails (alerts, newsletters)?</summary>
                <p>You can manage your email preferences in your account settings under "Notifications".</p>
            </details>
            <details>
                <summary>How to publish, edit, or delete an ad?</summary>
                <p>Go to your account dashboard and manage your ads in the "My Listings" section.</p>
            </details>
            <details>
                <summary>Where can I find a real estate professional for my property?</summary>
                <p>Visit our "Find an Agent" page to connect with trusted real estate professionals.</p>
            </details>
        </div>
    </section>

    <section>
        <h2>Contact Customer Service</h2>
        <p>For any inquiries regarding our website or application, please use the contact form below:</p>
        <form class="contact-form" action="/submit_form" method="POST">
            <label for="name">Name *</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <label for="email">Email Address *</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="subject">Subject *</label>
            <select id="subject" name="subject" required>
                <option value="">Select a subject</option>
                <option value="support">Support Request</option>
                <option value="general">General Inquiry</option>
                <option value="feedback">Feedback</option>
            </select>

            <label for="message">Your Message *</label>
            <textarea id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>

            <button type="submit">Send My Message</button>
        </form>
    </section>
</main>

<?php include('footer.php'); ?>