<?php
require_once('config.inc.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="mm">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us - Café 418</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php include "navbar.php" ?>

    <section class="contact-section">
        <h2 class="title">Contact Us</h2>

        <div class="contact-container">
            <div class="contact-left">
                <div class="contact-info">
                    <h3>Get In Touch</h3>
                    <p>We’d love to hear from you ☕</p>
                    <p><strong>Email:</strong> cafe418@gmail.com</p>
                    <p><strong>X:</strong> @Cafe_418</p>
                    <p><strong>Instagram:</strong> @Cafe_418</p>
                    <p><strong>Phone:</strong> +966 512345678</p>
                    <p><strong>Our Location:</strong></p>
                    <div class="map-container">
                        <iframe title="Cafe 418 Location"
                            src="https://www.google.com/maps?q=%D9%82%D8%B3%D9%85%20%D8%A7%D9%84%D8%B7%D8%A7%D9%84%D8%A8%D8%A7%D8%AA%2C%20%D9%85%D8%A8%D9%86%D9%89%20650%2C%20%D9%83%D9%84%D9%8A%D8%A9%20%D8%B9%D9%84%D9%80%D9%88%D9%85%20%D8%A7%D9%84%D8%AD%D8%A7%D8%B3%D8%A8%20%D9%88%D8%AA%D9%82%D9%86%D9%8A%D8%A9%20%D8%A7%D9%84%D9%85%D8%B9%D9%84%D9%88%D9%85%D8%A7%D8%AA%2C%207550%20%D8%B7%D8%B1%D9%8A%D9%82%20%D8%A7%D9%84%D9%85%D9%84%D9%83%20%D9%81%D9%8A%D8%B5%D9%84%2C%20%D8%A7%D9%84%D8%B5%D9%81%D8%A7%2C%20%D8%A7%D9%84%D8%AF%D9%85%D8%A7%D9%85%2034221&output=embed"
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>

            <form id="contactForm" class="contact-form" style="display: flex; flex-direction: column; gap: 15px;" novalidate>
                <div style="width: 100%;">
                    <input type="text" id="userName" placeholder="Your Name" style="width: 100%; box-sizing: border-box; display: block;">
                    <span id="nameError" style="color: red; display: block; font-size: 13px; margin-top: 5px;"></span>
                </div>
                
                <div style="width: 100%;">
                    <input type="email" id="userEmail" placeholder="Your Email" style="width: 100%; box-sizing: border-box; display: block;">
                    <span id="emailError" style="color: red; display: block; font-size: 13px; margin-top: 5px;"></span>
                </div>

                <div style="width: 100%;">
                    <textarea id="userMessage" placeholder="Your Message" rows="5" style="width: 100%; box-sizing: border-box; display: block;"></textarea>
                    <span id="messageError" style="color: red; display: block; font-size: 13px; margin-top: 5px;"></span>
                </div>

                <button type="submit" style="width: 100%; cursor: pointer; padding: 10px;">Send Message</button>
            </form>
        </div>
    </section>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form values
            const name = document.getElementById('userName').value.trim();
            const email = document.getElementById('userEmail').value.trim();
            const message = document.getElementById('userMessage').value.trim();

            // Get error spans
            const nameError = document.getElementById('nameError');
            const emailError = document.getElementById('emailError');
            const messageError = document.getElementById('messageError');

            // Reset error messages
            nameError.textContent = "";
            emailError.textContent = "";
            messageError.textContent = "";

            let isValid = true;

            // Name Validation
            const namePattern = /^[a-zA-Z\s]+$/;
            if (name === "") {
                nameError.textContent = "Please enter your name";
                isValid = false;
            } else if (name.length <= 3) {
                nameError.textContent = "Name must be more than 3 characters";
                isValid = false;
            } else if (!namePattern.test(name)) {
                nameError.textContent = "Name must not contain numbers";
                isValid = false;
            }

            // Email Detailed Validation
            const emailParts = email.split('@');
            const beforeAt = emailParts[0] || "";
            const allowedProviders = ['gmail', 'outlook', 'yahoo', 'hotmail', 'icloud'];

            if (email === "") {
                emailError.textContent = "Please enter your email";
                isValid = false;
            } 
            // Check for @ symbol and domain part
            else if (!email.includes('@') || emailParts.length < 2) {
                emailError.textContent = "Email must contain '@' and a valid domain";
                isValid = false;
            }
            // Check if email starts with a number
            else if (/^\d/.test(email)) {
                emailError.textContent = "Email must not start with a number";
                isValid = false;
            }
            // Check minimum length before @
            else if (beforeAt.length < 5) {
                emailError.textContent = "The part before '@' must be at least 5 characters";
                isValid = false;
            }
            // Check for valid provider and .com ending
            else {
                const domainPart = emailParts[1];
                const isProviderValid = allowedProviders.some(p => domainPart.startsWith(p + ".com"));
                
                if (!isProviderValid) {
                    emailError.textContent = "Use a valid provider (gmail, outlook, yahoo, etc.) ending with .com";
                    isValid = false;
                }
            }

            // Message Validation
            if (message === "") {
                messageError.textContent = "Please enter your message";
                isValid = false;
            } else if (message.length < 5) {
                messageError.textContent = "Message must be at least 5 characters";
                isValid = false;
            }

            // Final check
            if (isValid) {
                alert("Message sent successfully!");
                this.reset();
            }
        });
    </script>
</body>
</html>