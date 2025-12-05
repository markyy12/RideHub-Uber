// Main JavaScript for RideHub Booking System
      document.addEventListener("DOMContentLoaded", function () {
        // Initialize variables
        let bookingData = {
          name: "",
          email: "",
          phone: "",
          service: "",
          pickup: "",
          drop: "",
          datetime: "",
          vehicle: "",
          passengers: 1,
          distance: 0,
          duration: 0,
          fare: 0,
          paymentMethod: "paystack",
        };

        // Get form elements
        const rideDetailsForm = document.getElementById("rideDetailsForm");
        const paymentSection = document.getElementById("paymentSection");
        const rideDetailsSection =
          document.getElementById("rideDetailsSection");
        const continueToPaymentBtn = document.getElementById(
          "continueToPaymentBtn"
        );
        const backToRideDetailsBtn = document.getElementById(
          "backToRideDetailsBtn"
        );
        const processPaymentBtn = document.getElementById("processPaymentBtn");
        const loadingSpinner = document.getElementById("loadingSpinner");
        const successMessage = document.getElementById("successMessage");

        // Payment method elements
        const paymentMethods = document.querySelectorAll(
          'input[name="paymentMethod"]'
        );
        const bankTransferDetails = document.getElementById(
          "bankTransferDetails"
        );
        const cashPaymentDetails =
          document.getElementById("cashPaymentDetails");
        const transferAmount = document.getElementById("transferAmount");
        const cashAmount = document.getElementById("cashAmount");

        // Summary elements
        const summaryPickup = document.getElementById("summaryPickup");
        const summaryDrop = document.getElementById("summaryDrop");
        const summaryDateTime = document.getElementById("summaryDateTime");
        const summaryVehicle = document.getElementById("summaryVehicle");
        const summaryPassengers = document.getElementById("summaryPassengers");
        const summaryDistance = document.getElementById("summaryDistance");
        const summaryBaseFare = document.getElementById("summaryBaseFare");
        const summaryTotalFare = document.getElementById("summaryTotalFare");

        // Progress steps
        const steps = document.querySelectorAll(".step");
        const progressBar = document.querySelector(
          ".progress-bar .progress-bar"
        );

        // Initialize steps
        updateProgress(1);

        // Continue to payment button click
        continueToPaymentBtn.addEventListener("click", function () {
          if (validateRideDetails()) {
            collectRideDetails();
            updateRideSummary();
            showPaymentSection();
            updateProgress(2);
          }
        });

        // Back to ride details button click
        backToRideDetailsBtn.addEventListener("click", function () {
          showRideDetailsSection();
          updateProgress(1);
        });

        // Process payment button click
        processPaymentBtn.addEventListener("click", function () {
          processPayment();
        });

        // Payment method change
        paymentMethods.forEach((method) => {
          method.addEventListener("change", function () {
            bookingData.paymentMethod = this.value;
            updatePaymentDetails();
          });
        });

        // Form validation
        function validateRideDetails() {
          const requiredFields = rideDetailsForm.querySelectorAll("[required]");
          let isValid = true;

          requiredFields.forEach((field) => {
            if (!field.value.trim()) {
              isValid = false;
              field.classList.add("is-invalid");
            } else {
              field.classList.remove("is-invalid");
            }
          });

          if (!isValid) {
            alert("Please fill in all required fields.");
          }

          return isValid;
        }

        // Collect ride details
        function collectRideDetails() {
          bookingData.name = document.getElementById("inputname4").value;
          bookingData.email = document.getElementById("inputEmail").value;
          bookingData.phone = document.getElementById("inputNumber").value;
          bookingData.service = document.getElementById("serviceSelect").value;
          bookingData.pickup = document.getElementById("pickupLocation").value;
          bookingData.drop = document.getElementById("dropLocation").value;
          bookingData.datetime = document.getElementById("inputDate").value;
          bookingData.vehicle = document.getElementById("vehicleType").value;
          bookingData.passengers = parseInt(
            document.getElementById("passengers").value
          );

          // Get fare from display
          const fareText = document.getElementById("fare").textContent;
          bookingData.fare = parseInt(
            fareText.replace("₦", "").replace(/,/g, "")
          );

          // Get distance from display
          const distanceText = document.getElementById("distance").textContent;
          bookingData.distance = parseFloat(distanceText.split(" ")[0]);
        }

        // Update ride summary
        function updateRideSummary() {
          summaryPickup.textContent = bookingData.pickup;
          summaryDrop.textContent = bookingData.drop;

          // Format date and time
          const date = new Date(bookingData.datetime);
          summaryDateTime.textContent = date.toLocaleString("en-NG", {
            weekday: "long",
            year: "numeric",
            month: "long",
            day: "numeric",
            hour: "2-digit",
            minute: "2-digit",
          });

          // Get vehicle label
          const vehicleSelect = document.getElementById("vehicleType");
          const selectedOption =
            vehicleSelect.options[vehicleSelect.selectedIndex];
          summaryVehicle.textContent = selectedOption.text.split("(")[0].trim();

          summaryPassengers.textContent = bookingData.passengers;
          summaryDistance.textContent =
            document.getElementById("distance").textContent;

          // Calculate and display fares
          const baseFare = bookingData.fare;
          const serviceFee = 500;
          const totalFare = baseFare + serviceFee;

          summaryBaseFare.textContent = `₦${baseFare.toLocaleString()}`;
          summaryTotalFare.textContent = `₦${totalFare.toLocaleString()}`;

          // Update payment amounts
          transferAmount.textContent = `₦${totalFare.toLocaleString()}`;
          cashAmount.textContent = `₦${totalFare.toLocaleString()}`;
        }

        // Update payment details based on selected method
        function updatePaymentDetails() {
          // Hide all payment details
          bankTransferDetails.style.display = "none";
          cashPaymentDetails.style.display = "none";

          // Show selected payment details
          if (bookingData.paymentMethod === "transfer") {
            bankTransferDetails.style.display = "block";
          } else if (bookingData.paymentMethod === "cash") {
            cashPaymentDetails.style.display = "block";
          }
        }

        // Show payment section
        function showPaymentSection() {
          rideDetailsSection.style.display = "none";
          paymentSection.style.display = "block";
          updatePaymentDetails();
        }

        // Show ride details section
        function showRideDetailsSection() {
          paymentSection.style.display = "none";
          rideDetailsSection.style.display = "block";
        }

        // Update progress steps
        function updateProgress(stepNumber) {
          steps.forEach((step, index) => {
            if (index < stepNumber) {
              step.classList.add("active");
            } else {
              step.classList.remove("active");
            }
          });

          // Update progress bar width
          const progressPercent = ((stepNumber - 1) / (steps.length - 1)) * 100;
          progressBar.style.width = `${progressPercent}%`;
        }

        // Process payment
        function processPayment() {
          // Validate payment method requirements
          if (bookingData.paymentMethod === "transfer") {
            const transferConfirmed =
              document.getElementById("transferConfirmed");
            if (!transferConfirmed.checked) {
              alert("Please confirm that you have made the transfer.");
              return;
            }
          } else if (bookingData.paymentMethod === "cash") {
            const cashConfirmed = document.getElementById("cashConfirmed");
            if (!cashConfirmed.checked) {
              alert("Please confirm that you understand you will pay in cash.");
              return;
            }
          }

          // Show loading spinner
          loadingSpinner.style.display = "block";
          processPaymentBtn.disabled = true;

          // Simulate processing delay
          setTimeout(() => {
            if (bookingData.paymentMethod === "paystack") {
              // Initialize Paystack payment
              initializePaystackPayment();
            } else {
              // For cash or transfer, simulate success
              completeBooking();
            }
          }, 2000);
        }

        // Initialize Paystack payment
        function initializePaystackPayment() {
          // Calculate total amount (in kobo)
          const baseFare = bookingData.fare;
          const serviceFee = 500;
          const totalAmount = (baseFare + serviceFee) * 100; // Convert to kobo

          // Generate booking ID
          const bookingId = `RH-${Date.now().toString().slice(-6)}`;

          // Paystack handler function
          const handler = PaystackPop.setup({
            key: "pk_test_YOUR_PAYSTACK_PUBLIC_KEY", // Replace with your Paystack public key
            email: bookingData.email,
            amount: totalAmount,
            currency: "NGN",
            ref: bookingId,
            callback: function (response) {
              // Payment successful
              loadingSpinner.style.display = "none";
              completeBooking(response.reference);
            },
            onClose: function () {
              // Payment closed
              loadingSpinner.style.display = "none";
              processPaymentBtn.disabled = false;
              alert("Payment was cancelled.");
            },
          });
          handler.openIframe();
        }

        // Complete booking process
        function completeBooking(paymentReference = null) {
          // Generate booking ID
          const bookingId =
            paymentReference || `CASH-${Date.now().toString().slice(-6)}`;

          // Hide payment section
          paymentSection.style.display = "none";

          // Hide loading spinner
          loadingSpinner.style.display = "none";

          // Update success message with booking ID
          document.getElementById("bookingId").textContent = bookingId;

          // Show success message
          successMessage.style.display = "block";

          // Update progress to final step
          updateProgress(3);

          // Send booking data to server (you would implement this)
          sendBookingToServer(bookingId, paymentReference);
        }

        // Send booking data to server
        function sendBookingToServer(bookingId, paymentReference) {
          const bookingDataToSend = {
            ...bookingData,
            bookingId: bookingId,
            paymentReference: paymentReference,
            paymentMethod: bookingData.paymentMethod,
            status:
              bookingData.paymentMethod === "paystack" ? "paid" : "pending",
            timestamp: new Date().toISOString(),
          };

          // Here you would send the data to your backend
          // Example using fetch API:
          /*
                fetch('/api/bookings', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(bookingDataToSend)
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Booking saved:', data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
                */

          // For demo, log to console
          console.log("Booking data:", bookingDataToSend);

          // Send email notification (you would implement this)
          sendConfirmationEmail(bookingDataToSend);
        }

        // Send confirmation email (simulated)
        function sendConfirmationEmail(bookingData) {
          // Here you would integrate with your email service
          // Example: SendGrid, Mailgun, or your own backend
          console.log("Sending confirmation email to:", bookingData.email);
        }

        // Initialize date picker with current date/time
        const dateInput = document.getElementById("inputDate");
        const now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        dateInput.min = now.toISOString().slice(0, 16);
        dateInput.value = now.toISOString().slice(0, 16);

        // Initialize Google Maps functionality
        // (You'll need to implement this based on your previous code)
        initBookingMap();
      });

      // Google Maps initialization for booking
      function initBookingMap() {
        // Your existing Google Maps code here
        // This should include:
        // 1. Map initialization
        // 2. Autocomplete setup
        // 3. Route calculation
        // 4. Fare calculation based on distance
      }
